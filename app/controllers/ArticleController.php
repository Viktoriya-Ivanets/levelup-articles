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
            $article['created_at'] = Helpers::convertFromUTC($article['created_at']);
            $article['updated_at'] = Helpers::convertFromUTC($article['updated_at']);
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
            $article['created_at'] = Helpers::convertFromUTC($article['created_at']);
            $article['updated_at'] = Helpers::convertFromUTC($article['updated_at']);
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
        $articleById['created_at'] = Helpers::convertFromUTC($articleById['created_at']);
        $articleById['updated_at'] = Helpers::convertFromUTC($articleById['updated_at']);
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
        extract(Helpers::getPostData(['title', 'content', 'userId']));
        $errors = Validators::validateArticleStoreInput($userId, $title, $content);

        if ($errors) {
            $this->view(
                'admin',
                'default',
                'article_form',
                [
                    'name' => 'Add article',
                    'userId' => $userId,
                    'errors' => $errors,
                    'oldInput' => ['title' => $title, 'content' => $content]
                ]
            );
        }

        $data = [
            'title' => $title,
            'content' => $content,
            'user_id' => $userId,
            'created_at' => Helpers::convertToUTC(date('Y-m-d H:i:s')),
            'updated_at' => Helpers::convertToUTC(date('Y-m-d H:i:s')),
        ];

        $articleModel = new Article();

        if (!$articleModel->create($data)) {
            throw new DatabaseException("Article not created", 200, null, 'Something went wrong during article creating, try again later');
        }

        Router::redirect('admin/articles');
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
        extract(Helpers::getPostData(['id', 'title', 'content']));
        $errors = Validators::validateArticleUpdateInput($id, $title, $content);

        if ($errors) {
            $this->view(
                'admin',
                'default',
                'article_form',
                [
                    'name' => 'Add article',
                    'errors' => $errors,
                    'article' => ['id' => $id, 'title' => $title, 'content' => $content]
                ]
            );
        }

        $articleModel = new Article();
        $existingArticle = $articleModel->getById($id);

        $data = [
            'title' => $title ?? $existingArticle['title'],
            'content' => $content ?? $existingArticle['content'],
            'updated_at' => Helpers::convertToUTC(date('Y-m-d H:i:s')),
        ];

        if (!$articleModel->update($id, $data)) {
            throw new DatabaseException("Article not update", 200, null, 'Something went wrong during article updating, try again later');
        }

        Router::redirect('admin/articles');
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
            Router::redirect('admin/articles');
        } else {
            echo 'Article not delete';
        }
    }
}
