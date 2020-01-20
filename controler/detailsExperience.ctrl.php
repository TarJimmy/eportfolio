<?php

if (isset($_POST['idExp']) && isset($_POST['type'])){
  include_once("../model/DAO.class.php");
  $dao = new DAO();
  $detailsExp = $dao->getDetailsExperience($_POST['idExp'],$_POST['type']);
  $type = "";
  switch ($detailsExp['type']) {
    case 'pro':
      $type = "Expérience Professionnelle";
      break;
      case 'info':
        $type = "Projet Informatique";
        break;
    default:
      $type = "Formation scolaire";
      break;
  }
  include_once('../view/detailsExperience.view.php');
} else {
  $erreur = "Une erreur a été survenue, veillez recommencer. Si l'erreur persiste, veillez me contacter.";
  include_once("../view/erreur.view.php");
}
