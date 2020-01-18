<?php
class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $servername = 'localhost';
        private $user = 'root';
        private $pass = 'jimmykevin';
        function __construct() {
            try {
              $this->db = new PDO("mysql:host=$this->servername;dbname=my_eportfolio",$this->user,$this->pass);
            } catch (\Exception $e) {
              die("Erreur de connexion à la base de données:".$e->getMessage());  // Vérifie si la base de données est bien accessible
            }
        }
}
