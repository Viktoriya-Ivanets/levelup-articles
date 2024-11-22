<?php

class UserController extends Controller
{
    /**
     * Render view to list all users on admin side
     * @return never
     */
    public function index(): never
    {
        $this->view('admin', 'default', 'users');
    }

    /**
     * Render view with form for user creation
     * @return never
     */
    public function create(): never
    {
        $this->view('admin', 'default', 'user_form', ['name' => 'Add user']);
    }

    /**
     * Render view with form for user updation
     * @param array $params
     * @return never
     */
    public function edit(array $params): never
    {
        //TODO Get data from DB
        $this->view('admin', 'default', 'user_form', ['id' => $params['id'], 'name' => 'Edit user']);
    }
}
