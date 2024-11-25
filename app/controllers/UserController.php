<?php

class UserController extends Controller
{
    /**
     * Renders a view to list all users on the admin side.
     * 
     * @return never This method does not return a value; it redirects or renders a view.
     */
    public function index(): never
    {
        $userModel = new User();
        $users = $userModel->getAll();
        foreach ($users as &$user) {
            $user['created_at'] = Helpers::convertFromUTC($user['created_at']);
            $user['updated_at'] = Helpers::convertFromUTC($user['updated_at']);
        }
        $this->view('admin', 'default', 'users', ['users' => $users]);
    }

    /**
     * Renders a view with a form for creating a new user.
     * 
     * @return never This method does not return a value; it renders the user creation form.
     */
    public function create(): never
    {
        $this->view('admin', 'default', 'user_form', ['name' => 'Add user']);
    }

    /**
     * Stores a new user in the database.
     * 
     * @return void This method does not return a value, but redirects or prints an error message.
     */
    public function store(): void
    {
        extract(Helpers::getPostData(['login', 'password', 'password_confirm']));

        if ($password !== $password_confirm) {
            echo 'Passwords do not match';
            return;
        }

        $data = [
            'login' => $login,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => Helpers::convertToUTC(date('Y-m-d H:i:s')),
            'updated_at' => Helpers::convertToUTC(date('Y-m-d H:i:s'))
        ];

        $userModel = new User();
        $success = $userModel->create($data);

        if ($success) {
            Router::redirect('admin/users');
        } else {
            echo 'User not created';
        }
    }


    /**
     * Renders a view with a form for updating an existing user.
     * 
     * @param array $params Parameters containing the user ID.
     * 
     * @return never This method does not return a value; it renders the user update form.
     */
    public function edit(array $params): never
    {
        $userModel = new User();
        $user = $userModel->getById($params['id']);
        $this->view('admin', 'default', 'user_form', ['user' => $user, 'name' => 'Edit user']);
    }

    /**
     * Updates an existing user's data in the database.
     * 
     * @return void This method does not return a value, but redirects or prints an error message.
     */
    public function update(): void
    {
        extract(Helpers::getPostData(['userId', 'login', 'password', 'passwordConfirm', 'oldPassword']));

        $userModel = new User();

        $existingUser = $userModel->getById($userId);
        if (!$existingUser) {
            echo 'User not found';
            exit();
        }

        if ($password) {
            if ($password !== $passwordConfirm) {
                echo 'Passwords do not match';
                exit();
            }

            if (!password_verify($oldPassword, $existingUser['password'])) {
                echo 'Old password is incorrect';
                exit();
            }

            $newPassword = password_hash($password, PASSWORD_DEFAULT);
        }

        $data = [
            'login' => $login ?? $existingUser['login'],
            'password' => $newPassword ?? $existingUser['password'],
            'updated_at' => Helpers::convertToUTC(date('Y-m-d H:i:s')),
        ];

        $success = $userModel->update($userId, $data);

        if ($success) {
            Router::redirect('admin/users');
        } else {
            echo 'User not updated';
        }
    }


    /**
     * Deletes a user from the database.
     * 
     * @param array $params Parameters containing the user ID.
     * 
     * @return void This method does not return a value, but redirects or prints an error message.
     */
    public function delete(array $params): void
    {
        $userModel = new User();
        $existingUser = $userModel->getById($params['id']);
        if (!$existingUser) {
            echo 'User not found';
            exit();
        }

        $success = $userModel->delete($existingUser['id']);
        if ($success) {
            Router::redirect('admin/users');
        } else {
            echo 'User not delete';
        }
    }
}
