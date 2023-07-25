<?php
require_once '../controller/AuthController.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Ma barre de navigation</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="card-1">
    <h1>ACTUALITES POLYTECHNICIENNES</h1>
</div>
<div class="card">
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?categorie=3">Sport</a></li>
            <li><a href="index.php?categorie=6">Santé</a></li>
            <li><a href="index.php?categorie=3">Éducation</a></li>
            <li><a href="index.php?categorie=4">Politique</a></li>
            <li><a href="ajouter_article.php">AddArticle</a></li>
            <?php
            if(isset($_SESSION['user'])){
            
                       echo' <li><a href="../logout.php">logout</a></li>';
            }else{
                       echo' <li><a href="AuthVue.php">Login</a></li>';
            }
               
            ?>

        </ul>
    </nav>
</div>

<h2>Les dernières actualités</h2>

<?php
require_once '../controller/controller.php';
//require_once '../modele/supprimer_article.php';


$controller = new ArticleController();
$articles = $controller->getArticles();

if (!empty($articles)) {
    foreach ($articles as $article) {
        echo '<div class="article">';
        echo 'Titre : ' . $article->getTitre() . '<br>';
        echo 'Contenu : ' . $article->getContenu() . '<br>';
        echo '<form method="get" action="modifier_article.php">';
        echo '<input type="hidden" name="article_id" value="' . $article->getId() . '">';
        echo '<input type="submit" value="Modifier">';
        echo '</form>';
        echo '<form method="post" action="../modele/supprimer_article.php">';
        echo '<input type="hidden" name="article_id" value="' . $article->getId() . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form>';
        /*echo '<form method="post" action="modifier_article.php">';
        echo '<input type="hidden" name="article_id" value="' . $article->getId() . '">';
        echo '<input type="submit" value="Modifier">';
        echo '</form>';
        */
        echo '<br>';
        echo '</div>';
    }
} else {
    echo 'Aucun article trouvé.';
}
?>
</body>
</html>
