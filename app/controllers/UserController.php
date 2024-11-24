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
        $data = [
            'login' => $_POST['login'] ?? null,
            'password' => $_POST['password'] ?? null
        ];

        if ($data['password'] !== $_POST['password_confirm']) {
            echo 'Passwords do not match';
            return;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $userModel = new User();
        $success = $userModel->create($data);

        if ($success) {
            header('Location: ' . BASE_URL . 'admin/users');
            exit();
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
        $userId = $_POST['userId'];
        $userModel = new User();

        $existingUser = $userModel->getById($userId);
        if (!$existingUser) {
            echo 'User not found';
            exit();
        }

        $data = [
            'login' => $_POST['login'] ?? $existingUser['login'],
        ];

        $newPassword = $_POST['password'] ?? null;
        $confirmPassword = $_POST['passwordConfirm'] ?? null;
        if ($newPassword) {
            if ($newPassword !== $confirmPassword) {
                echo 'Passwords do not match';
                exit();
            }

            $oldPassword = $_POST['oldPassword'] ?? '';
            if (!password_verify($oldPassword, $existingUser['password'])) {
                echo 'Old password is incorrect';
                exit();
            }

            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $success = $userModel->update($userId, $data);

        if ($success) {
            header('Location: ' . BASE_URL . 'admin/users');
            exit();
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
            header('Location: ' . BASE_URL . 'admin/users');
            exit();
        } else {
            echo 'User not delete';
        }
    }
}
