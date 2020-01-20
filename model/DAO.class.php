<?php
class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $servername = 'localhost';
        private $user = 'root';
        private $pass = 'jimmykevin';

        /**
         * Constructeur de la classe, fais le lien avec la bd
         * si elle n'existe pas arrète le processus et affiche l'erreur
         *
         * @param void
         * @return DAO
         */
        function __construct() {
            try {
              $this->db = new PDO("mysql:host=$this->servername;dbname=my_eportfolio",$this->user,$this->pass);
            } catch (\Exception $e) {
              die("Erreur de connexion à la base de données:".$e->getMessage());  // Vérifie si la base de données est bien accessible
            }
        }

        /**
         * Retourne toutes les Experiences professionnels stockée dans la base de données
         *
         * @param void
         * @return array
         */
        public function getExperiencePro() {
          $sql = "SELECT e.idExp,e.type,e.nom, e.departement, p.typeContrat, p.DateDebut, p.DateFin
                  FROM Experience e, Exp_professionnel p
                  where e.idExp=p.idExp and e.type='pro'
                  ORDER BY datefin DESC";
          $req = $this->db->query($sql);
          if (!$req) {
            die("Erreur dans la requete : ".$sql);
          }
          $res = $req->fetchAll();
          return $res;
        }

        /**
         * Retourne les details d'une experience définie par son idExp et son type
         *
         * @param idExp,type
         * @return DAO
         */
        public function getDetailsExperience($idExp, $type) {
          //Retourne le nom exacte de la table en fonction du type passé
            $tableType;
            switch ($type) {
              case 'pro':
                $tableType = "Exp_professionnel";
                break;
              case 'info':
                $tableType = "Exp_informatique";
                break;
            }
            $sql = "";
            if ($tableType=="formation"){
              $sql = "SELECT *
                      From Experience
                      where idExp=?";
            }
            else {
              $sql = "SELECT e.*,t.*
                      From Experience e, $tableType t
                      where t.idExp=e.idExp and e.idExp= ? ";
            }
            $reqPrepare = $this->db->prepare($sql);
            if (!$reqPrepare){
              die("Erreur dans la requète : ".$sql);
            }
            $reqPrepare->execute(array($idExp));
            $result = $reqPrepare->fetchAll();
            return $result[0];
        }
}
