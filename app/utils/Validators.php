<?php

class Validators
{
    /**
     * Validates the input data for storing an article.
     *
     * @param int $id User ID
     * @param string $title Title of the article
     * @param string $content Content of the article
     * @return array|null List of error messages if validation fails, null if validation passes
     * @throws DatabaseException If the user does not exist
     */
    public static function validateArticleStoreInput($id, $title, $content): array|null
    {
        $errors = [];
        if (!strlen($title) || !strlen($content)) {
            $errors[] = 'Title or content cannot be empty';
        }
        $userModel = new User();
        if (!$userModel->getById($id)) {
            throw new DatabaseException("User doesn't exist", 100, null, 'For some reason, your account not found, please login again');
        }
        return $errors ?? null;
    }

    /**
     * Validates the input data for updating an article.
     *
     * @param int $id Article ID
     * @param string $title Title of the article
     * @param string $content Content of the article
     * @return array|null List of error messages if validation fails, null if validation passes
     * @throws DatabaseException If the article does not exist
     */
    public static function validateArticleUpdateInput($id, $title, $content): array|null
    {
        $errors = [];
        if (!strlen($title) || !strlen($content)) {
            $errors[] = 'Title or content cannot be empty';
        }
        $articleModel = new Article();
        if (!$articleModel->getById($id)) {
            throw new DatabaseException("Article doesn't exist", 100, null, 'No such article');
        }
        return $errors ?? null;
    }
}
