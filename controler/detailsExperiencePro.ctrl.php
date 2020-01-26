<?php

if (isset($_POST['idExp'])) {
  include_once("../model/DAO.class.php");
  $dao = new DAO();
  $detailsExp = $dao->getDetailsExperiencePro($_POST['idExp']);
  include_once('../view/detailsExperiencePro.view.php');
} else {
  $erreur = "Une erreur a été survenue, veillez recommencer. Si l'erreur persiste, veillez me contacter.";
  include_once("../view/erreur.view.php");
}
