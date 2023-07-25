<?php

class InscriptionModel {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Erreur de connexion à la base de données: " . $this->conn->connect_error);
        }
    }

    public function insertEtudiant($prenom, $nom, $pseudo, $mdp) {
        $prenom = $this->conn->real_escape_string($prenom);
        $nom = $this->conn->real_escape_string($nom);
        $pseudo = $this->conn->real_escape_string($pseudo);
        $mdp = $this->conn->real_escape_string($mdp);

        $sql = "INSERT INTO etudiant (prenom, nom, pseudo, mdp) VALUES ('$prenom', '$nom', '$pseudo', '$mdp')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>