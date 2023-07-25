<?php

require_once '../modele/model.php';
require_once '../modele/article.php';


class ArticleController
{
    private $model;

    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    public function getArticles()
    {
        if (isset($_GET['categorie'])) {
            $categorie = $_GET['categorie'];
            return $this->model->getArticlesByCategory($categorie);
        } else {
            return $this->model->getAllArticles();
        }
    }
}
