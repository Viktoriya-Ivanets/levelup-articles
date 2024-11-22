<?php

class AuthController extends Controller
{
    /**
     * Render login page
     * @return never
     */
    public function login(): never
    {
        $this->view('admin', 'login');
    }

    /**
     * Render dashboard welcome page
     * @return never
     */
    public function welcome(): never
    {
        $this->view('admin', 'default', 'welcome');
    }
}
