<?php

class AuthModel {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Erreur de connexion à la base de données: " . $this->conn->connect_error);
        }
    }

    public function checkCredentials($pseudo, $mdp) {
        $pseudo = $this->conn->real_escape_string($pseudo);
        $mdp = $this->conn->real_escape_string($mdp);

        $sql = "SELECT * FROM etudiant WHERE pseudo='$pseudo' AND mdp='$mdp'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return true; // Utilisateur trouvé, connexion réussie
        } else {
            return false; // Utilisateur non trouvé, connexion échouée
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
