<?php

class Controller
{
    /**
     * Renders views with specified data
     * @param string $view
     * @param string $layout
     * @param mixed $page
     * @param array $data
     * @return never
     */
    protected function view(string $view, string $layout, ?string $page = null, array $data = []): never
    {
        extract($data);
        require_once VIEWS . "{$view}/layouts/{$layout}.php";
        exit();
    }
}
