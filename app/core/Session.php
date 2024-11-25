<?php

class Session
{
    /**
     * Starts a new session or resumes an existing session.
     *
     * @return void
     */
    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Sets a session variable.
     *
     * @param string $key The key for the session variable.
     * @param mixed $value The value to be stored in the session.
     * @return void
     */
    public static function set(string $key, ?string $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Retrieves a session variable.
     *
     * @param string $key The key of the session variable to retrieve.
     * @return mixed|null The value of the session variable, or null if not set.
     */
    public static function get(string $key): string|null
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * Removes a session variable.
     *
     * @param string $key The key of the session variable to remove.
     * @return void
     */
    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Destroys the current session and all session data.
     *
     * @return void
     */
    public static function destroy(): void
    {
        session_destroy();
    }

    /**
     * Generate unique identificatore for authenticated user
     * @return string
     */
    public static function generateToken()
    {
        return substr(bin2hex(random_bytes(128)), 0, 128);
    }

    /**
     * Check whether the token in is valid (not expired)
     * @param string $token
     * @return bool
     */
    public static function isValidSessionToken(string $token): bool
    {
        $result = Database::executeQuery(
            'SELECT * FROM sessions WHERE session_token = ? AND expires_at > NOW()',
            's',
            [$token]
        );
        return $result && $result->num_rows > 0;
    }

    /**
     * Delete token from DB due to logout or expiring
     * @param string $token
     * @return void
     */
    public static function deleteSessionToken(string $token): void
    {
        Database::executeQuery(
            'DELETE FROM sessions WHERE session_token = ?',
            's',
            [$token]
        );
    }

    /**
     * Store token to DB due to successful auth
     * @param int $userId
     * @param string $token
     * @return void
     */
    public static function storeSessionToken(int $userId, string $token): void
    {
        Database::executeQuery(
            'INSERT INTO sessions (user_id, session_token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 DAY))',
            'is',
            [$userId, $token]
        );
    }
}
