<?php

class ArticleController extends Controller
{
    /**
     * Renders a view to list all articles on the client side.
     * 
     * @return never This method does not return a value; it renders the article list view.
     */
    public function clientIndex(): never
    {
        $articleModel = new Article();
        $articles = $articleModel->getAll();

        foreach ($articles as &$article) {
            $article['user'] = $articleModel->getUserLoginByArticleId($article['id']);
        }
        unset($article);
        $this->view('client', 'default', 'index', ['articles' => $articles]);
    }

    /**
     * Renders a view to list all articles on the admin side.
     * 
     * @return never This method does not return a value; it renders the article list view.
     */
    public function adminIndex(): never
    {
        $articleModel = new Article();
        $articles = $articleModel->getAll();

        foreach ($articles as &$article) {
            $article['user'] = $articleModel->getUserLoginByArticleId($article['id']);
        }
        unset($article);
        $this->view('admin', 'default', 'articles', ['articles' => $articles]);
    }

    /**
     * Renders a view to show the specified article on the client side.
     * 
     * @param array $params Parameters containing the article ID.
     * 
     * @return never This method does not return a value; it renders the article view.
     */
    public function show(array $params): never
    {
        $articleModel = new Article();
        $articleById = $articleModel->getById($params['id']);
        $articleById['user'] = $articleModel->getUserLoginByArticleId($params['id']);
        $this->view('client', 'default', 'article', ['article' => $articleById]);
    }

    /**
     * Renders a view with a form for creating a new article.
     * 
     * @return never This method does not return a value; it renders the article creation form.
     */
    public function create(): never
    {
        $userModel = new User();
        $user = $userModel->findUserByLogin(Session::get('user'));
        $this->view('admin', 'default', 'article_form', ['name' => 'Add article', 'userId' => $user['id']]);
    }

    /**
     * Stores a new article in the database.
     * 
     * @return void This method does not return a value, but redirects or prints an error message.
     */
    public function store(): void
    {
        $data = [
            'title' => $_POST['title'] ?? null,
            'content' => $_POST['content'] ?? null,
            'user_id' => $_POST['userId'] ?? null
        ];

        $articleModel = new Article();
        $success = $articleModel->create($data);

        if ($success) {
            header('Location: ' . BASE_URL . 'admin/articles');
            exit();
        } else {
            echo 'Article not created';
        }
    }

    /**
     * Renders a view with a form for updating an existing article.
     * 
     * @param array $params Parameters containing the article ID.
     * 
     * @return never This method does not return a value; it renders the article update form.
     */
    public function edit(array $params): never
    {
        $articleModel = new Article();
        $articleById = $articleModel->getById($params['id']);
        $this->view('admin', 'default', 'article_form', ['article' => $articleById, 'name' => 'Edit article']);
    }

    /**
     * Updates an existing article in the database.
     * 
     * @return void This method does not return a value, but redirects or prints an error message.
     */
    public function update(): void
    {
        $id = $_POST['id'];
        $articleModel = new Article();

        $existingArticle = $articleModel->getById($id);
        if (!$existingArticle) {
            echo 'Article not found';
            exit();
        }

        $data = [
            'title' => $_POST['title'] ?? $existingArticle['title'],
            'content' => $_POST['content'] ?? $existingArticle['content'],
        ];

        $success = $articleModel->update($id, $data);

        if ($success) {
            header('Location: ' . BASE_URL . 'admin/articles');
            exit();
        } else {
            echo 'Article not updated';
        }
    }

    /**
     * Deletes an article from the database.
     * 
     * @param array $params Parameters containing the article ID.
     * 
     * @return void This method does not return a value, but redirects or prints an error message.
     */
    public function delete(array $params): void
    {
        $articleModel = new Article();
        $existingArticle = $articleModel->getById($params['id']);
        if (!$existingArticle) {
            echo 'Article not found';
            exit();
        }

        $success = $articleModel->delete($existingArticle['id']);
        if ($success) {
            header('Location: ' . BASE_URL . 'admin/articles');
            exit();
        } else {
            echo 'Article not delete';
        }
    }
}
