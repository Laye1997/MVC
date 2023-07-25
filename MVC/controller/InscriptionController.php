<?php

require_once '../modele/InscriptionModel.php';

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $model = new InscriptionModel("localhost", "root", "", "dit2");
    $inserted = $model->insertEtudiant($prenom, $nom, $pseudo, $mdp);
    $model->closeConnection();

    if ($inserted) {
        header("Location: ../vue/AuthVue.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
?>