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
        public function getExperiencesPros() {
          $sql = "SELECT p.*, c.intitule, c.typeContrat
                  FROM Exp_professionnel p, Contrats c
                  where c.idContrat=p.idContrat
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
        public function getDetailsExperiencePro($idExp) {
            $sql = "SELECT p.DateDebut, p.DateFin, p.lieu,
                           e.nomEntreprise, e.typeEntreprise, e.patron, e.lienSociete, e.residence,
                           c.intitule, c.typeContrat, c.descriptionPoste, c.imageContrat
                    From Exp_professionnel p, Entreprise e, Contrats c
                    where p.idExp= ?
                    and p.idContrat=c.idContrat
                    and e.idEntreprise=c.idEntreprise";
            $reqPrepare = $this->db->prepare($sql);
            if (!$reqPrepare){
              die("Erreur dans la requète : ".$sql);
            }
            $reqPrepare->execute(array($idExp));
            $result = $reqPrepare->fetchAll();
            return $result[0];
        }
        //Retourne toutes mes formations
        public function getFormations(){
          $sql = "SELECT *
                  FROM Formation
                  ORDER BY anneeFin DESC";
          $req = $this->db->query($sql);
          if (!$req) {
            die("Erreur dans la requete : ".$sql);
          }
          $res = $req->fetchAll();
          return $res;
        }
}
