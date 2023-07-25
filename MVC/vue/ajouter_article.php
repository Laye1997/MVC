
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            //ouverture de la session
	        session_start();
            if(isset($_SESSION['user'])){
                        
            echo' <li><a href="../logout.php">logout</a></li>';
            }else{
             echo' <li><a href="AuthVue.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<h2>Ajouter un nouvel article</h2>

<div class="card-3">
    
    <form action="ajouter_article.php" method="POST">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="contenu">Contenu :</label>
        <textarea id="contenu" name="contenu" required></textarea><br>

        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" required>
            <option value="3">Sport</option>
            <option value="6">Santé</option>
            <option value="3">Éducation</option>
            <option value="4">Politique</option>
        </select><br>

        <input type="submit" value="Ajouter">
    </form>
</div>
</body>
</html>

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

    // Récupérer les données du formulaire si le formulaire est soumis
if (isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['categorie'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $categorie = $_POST['categorie'];
    //header("Location: actualite.php");

    // ...
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}


    // Préparer et exécuter la requête d'insertion
    $sql = "INSERT INTO Article (titre, contenu, categorie) VALUES (:titre, :contenu, :categorie)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':contenu', $contenu);
    $stmt->bindParam(':categorie', $categorie);
    $stmt->execute();

    //header("Location: index.php");
    echo "L'article a été ajouté avec succès.";

} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
