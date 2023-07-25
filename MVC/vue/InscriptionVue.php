<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription </title>
    <link rel="stylesheet" type="text/css" href="../css1/style.css">
</head>
<body>
    <div class="formins">
        <div class="form-text">Inscription</div>
            <div class="form-saisie">
                <form method="post" action="../controller/InscriptionController.php">
                    <span>Prenom</span>
                    <input type="text" name="prenom" placeholder=""/>
                    <span>Nom</span>
                    <input type="text" name="nom" placeholder=""/>
                    <span>Login</span>
                    <input type="email" name="pseudo" placeholder=""/>
                    <span>Mot de Passe</span>
                    <input type="password" name="mdp" placeholder=""/>
                    <!--<span>Date de naissance</span>
                    <input type="date" name="dat" placeholder=""/>-->
                    <input type="submit" name="envoyer" value="s'inscrire" class="btnins" >
                    Vous êtes inscrit ? <a href="AuthVue.php">Connectez-vous</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    require_once '../controller/InscriptionController.php';
?>