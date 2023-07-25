<?php
	//ouverture de la session
	session_start();
 
	//redirection vers home page si on se connecte
	if(isset($_SESSION['user'])){
        header("Location: ../vue/index.php");
	}
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription & Connexion</title>
    <link rel="stylesheet" type="text/css" href="../css1/style.css">
</head>
<body>
    <div class="formcon">
        <div class="form-text">Connexion</div>
        <div class="form-saisie">
            <form method="post" action="../controller/AuthController.php">
                <span>Login :</span>
                <input type="email" name="pseudo" placeholder=""/>
                <span>Mot de Passe :</span>
                <input type="password" name="mdp" placeholder=""/>
                <input type="submit" name="envoyer" value="Connexion" class="btncon">
                Vous n'avez pas inscrire ?<a href="InscriptionVue.php">
                Inscrivez-vous</a>
                <?php
        
		    	if(isset($_SESSION['message'])){
		    		?>
					        <?php echo $_SESSION['message']; ?>
		    		<?php
 
		    		unset($_SESSION['message']);
		    	}
		    ?>
            </form>
            
        </div>
      
    </div>
 
</body>
</html>