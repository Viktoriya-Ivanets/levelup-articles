<?php

class App
{
    /**
     * Initialize the app and check whether the user is authenticated
     * @return void
     */
    public function run()
    {
        Session::start();
        $router = new Router();

        if (str_contains($_SERVER['REQUEST_URI'], 'admin')) {
            $token = Session::get('token');
            if (!$token || !Session::isValidSessionToken($token)) {
                Router::redirect('login');
            }
        }

        $router->dispatch($_SERVER['REQUEST_URI']);
    }
}
