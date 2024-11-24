<?php

class Article extends Model
{
    public function __construct()
    {
        parent::__construct('articles');
    }

    /**
     * Retrieves the login of the user who authored the article.
     * 
     * @param int $articleId The ID of the article.
     * 
     * @return string|null The login of the user, or null if not found.
     */
    public function getUserLoginByArticleId(int $articleId): ?string
    {
        $query = "
            SELECT u.login 
            FROM articles a
            JOIN users u ON a.user_id = u.id
            WHERE a.id = ?
        ";
        $result = $this->fetchOne($query, 'i', [$articleId]);
        return $result['login'] ?? null;
    }
}
