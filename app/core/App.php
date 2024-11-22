<?php

class App
{
    /**
     * Init app
     * @return void
     */
    public function run()
    {
        $router = new Router();
        $router->dispatch($_SERVER['REQUEST_URI']);
    }
}
