<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mglsi_news";

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'ID de l'article à modifier a été envoyé
    if (isset($_GET['article_id'])) {
        $articleId = $_GET['article_id'];

        // Récupérer les informations de l'article à partir de la base de données
        $sql = "SELECT * FROM Article WHERE id = :articleId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':articleId', $articleId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $article = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si le formulaire de modification a été soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données soumises
                $newTitre = $_POST['titre'];
                $newContenu = $_POST['contenu'];

                // Mettre à jour l'article dans la base de données
                $updateSql = "UPDATE Article SET titre = :titre, contenu = :contenu WHERE id = :articleId";
                $updateStmt = $pdo->prepare($updateSql);
                $updateStmt->bindParam(':titre', $newTitre);
                $updateStmt->bindParam(':contenu', $newContenu);
                $updateStmt->bindParam(':articleId', $articleId);
                $updateStmt->execute();

                // Rediriger vers la page actualite.php après la modification
                header("Location: index.php");
                exit(); // Terminer l'exécution du script pour éviter toute exécution supplémentaire
            }

            // Afficher le formulaire de modification de l'article avec les informations pré-remplies
            //echo '<form method="post" action="modifier_article.php">';
            echo '<form method="post" action="modifier_article.php?article_id=' . $article["id"] . '">';
            echo '<input type="hidden" name="article_id" value="' . $article["id"] . '">';
            echo 'Titre : <input type="text" name="titre" value="' . $article["titre"] . '"><br>';
            echo 'Contenu : <textarea name="contenu">' . $article["contenu"] . '</textarea><br>';
            echo '<input type="submit" value="Modifier">';
            echo '</form>';
            // Lien de retour vers la page index.php
            echo '<a href="index.php">Retour</a>';
        } else {
            echo "Article non trouvé.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermeture de la connexion
$pdo = null;
?>
