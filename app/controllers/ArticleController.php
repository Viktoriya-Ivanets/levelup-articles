<?php


class ArticleController extends Controller
{
    /**
     * Render view to list all articles on client side
     * @return never
     */
    public function clientIndex(): never
    {
        $this->view('client', 'default', 'index');
    }

    /**
     * Render view to list all articles on admin side
     * @return never
     */
    public function adminIndex(): never
    {
        $this->view('admin', 'default', 'articles');
    }

    /**
     * Render view to show specified article on client side
     * @param array $params
     * @return never
     */
    public function show(array $params): never
    {
        //TODO Get data from DB
        $this->view('client', 'default', 'article', ['id' => $params['id']]);
    }

    /**
     * Render view with form for article creation
     * @return never
     */
    public function create(): never
    {
        $this->view('admin', 'default', 'article_form', ['name' => 'Add article']);
    }

    /**
     * Render view with form for article updation
     * @param array $params
     * @return never
     */
    public function edit(array $params): never
    {
        //TODO Get data from DB
        $this->view('admin', 'default', 'article_form', ['id' => $params['id'], 'name' => 'Edit article']);
    }
}
