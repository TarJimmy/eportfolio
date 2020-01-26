<?php

class TardyJimmy {
   private static $_instance = null;
   private $nom = "Tardy";
   private $prenom = "Jimmy";
   private $date_naissance = '03/11/2000';
   private $statue = "étudiant en 2ème année de DUT Informatique à l'IUT2 de grenoble";
   private $ville = "grenoble";
   private $emailPerso = "tardyjim26@gmail.com";
   private $emailPro = "jimmy.tardy@etu.univ-grenoble-alpes.fr";
   private $telephone = "06 44 89 15 55";
   private $permis = array(
                            "permis B"=>"voiture"
                          );
   private $passions = array("basket", "pétanque", "mythologie grecque", "échec");
   /**
    * Constructeur de la classe
    *
    * @param void
    * @return void
    */
   private function __construct() {}

    /**
     * Ecriture toString de l'objet
     *
     * @param void
     * @return void
     */
    public function __toString() {
      return $this->getNomComplet();
    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return TardyJimmy
     */

    public static function getInstance()
     {
         if (self::$_instance === null) {
             self::$_instance = new TardyJimmy();
         }
         return self::$_instance;
     }

   /**
    * donne l'âge courant de l'utilisateur
    *
    * @param void
    * @return int
    */
  public function getAge()  {
    $mydate = explode('/', $this->date_naissance);
    $dateCourante = explode('/', date('d/m/Y'));
    if(($mydate[1] < $dateCourante[1]) || (($mydate[1] == $dateCourante[1]) && ($mydate[0] <= $dateCourante[0]))){
      return $dateCourante[2] - $am[2];
    }
    return $dateCourante[2] - $mydate[2] - 1;
  }
  /**
   * donne le nom courant de l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getPrenom(){
    return $this->prenom;
  }
  /**
   * donne le prenom courant de l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getNom(){
    return $this->nom;
  }
  /**
   * donne le nom complet, avec le choix de l'ordre
   *
   * @param bool
   * @return string
   */
  public function getNomComplet($prenom_nom = true){
    if ($prenom_nom) {
      return $this->prenom." ".$this->nom;
    } else{
      return $this->nom." ".$this->prenom;
    }
  }
  /**
   * donne le status courant de l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getStatus(){
    return $this->statue;
  }
  /**
   * donne la ville courante où vit l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getVille() {
    return $this->ville;
  }
  /**
   * donne le numéro de téléphone de l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getTelephone() {
    return $this->telephone;
  }
  /**
   * donne l'email personnel de l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getEmailPerso() {
    return $this->emailPerso;
  }
  /**
   * donne l'email professionnel de l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getEmailPro() {
    return $this->emailPro;
  }

  /**
   * donne tous les permis de l'utilisateur
   *
   * @param void
   * @return string
   */
  public function getPermis() {
    return $this->permis;
  }

}
