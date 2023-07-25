<?php

//ouverture de la session
session_start();
require_once '../modele/AuthModel.php';

if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $model = new AuthModel("localhost", "root", "", "dit2");
    $authenticated = $model->checkCredentials($pseudo, $mdp);
    $model->closeConnection();

    if ($authenticated) {
        $_SESSION['user'] = $authenticated;
        header("Location: ../vue/index.php");
        exit();
    } else {
        $_SESSION['message'] ='Pseudo ou mot de passe incorrect.';
	     header('location: ../vue/AuthVue.php');
    }
}
?>