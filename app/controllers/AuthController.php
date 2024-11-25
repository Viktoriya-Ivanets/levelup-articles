<?php

class AuthController extends Controller
{
    /**
     * Render login page or process auth request
     * @return never
     */
    public function login(): never
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findUserByLogin($login);

            if ($user && password_verify($password, $user['password'])) {

                $token = Session::generateToken();
                Session::storeSessionToken($user['id'], $token);
                Session::set('token', $token);
                Session::set('user', $login);
                Router::redirect('admin');
            } else {
                $error = 'Incorrect login or password.';
                $this->view('admin', 'login', null, ['error' => $error]);
            }
        } else {
            $this->view('admin', 'login');
        }
    }

    /**
     * Render dashboard welcome page
     * @return never
     */
    public function welcome(): never
    {
        $this->view('admin', 'default', 'welcome');
    }

    /**
     * Logout user from system
     * @return never
     */
    public function logout(): never
    {
        $token = Session::get('token');
        if ($token) {
            Session::deleteSessionToken($token);
        }

        Session::destroy();
        Router::redirect('login');
    }
}
