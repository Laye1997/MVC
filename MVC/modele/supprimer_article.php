<?php
//require_once '../vue/index.php';
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mglsi_news";

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'ID de l'article à supprimer a été envoyé
    if (isset($_POST['article_id'])) {
        $articleId = $_POST['article_id'];

        // Requête de suppression de l'article
        $sql = "DELETE FROM Article WHERE id = :articleId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':articleId', $articleId);
        $stmt->execute();

        // Rediriger vers la page d'origine après la suppression
        header("Location: ../vue/index.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermeture de la connexion
$pdo = null;
?>
