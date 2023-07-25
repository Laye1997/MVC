<?php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mglsi_news";

class ArticleModel
{
    private $pdo;

    public function __construct()
    {
        global $servername, $username, $password, $dbname;
        try {
            // Connexion à la base de données avec PDO
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            die();
        }
    }

    public function getAllArticles()
    {
        $articles = [];

        try {
            $sql = "SELECT * FROM Article";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            //Traitement des résultats
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $article = new Article($row["id"], $row["titre"], $row["contenu"]);
                    $articles[] = $article;
                }
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des articles : " . $e->getMessage();
        }

        return $articles;
    }

    public function getArticlesByCategory($categorie)
    {
        $articles = [];

        try {
            $sql = "SELECT * FROM Article WHERE categorie = :categorie";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':categorie', $categorie);
            $stmt->execute();

            //Traitement des résultats
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $article = new Article($row["id"], $row["titre"], $row["contenu"]);
                    $articles[] = $article;
                }
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des articles par catégorie : " . $e->getMessage();
        }

        return $articles;
    }
}

