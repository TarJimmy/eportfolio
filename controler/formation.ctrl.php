<?php
//Incusion de la classe unique utilisateur
include_once("../model/DAO.class.php");
$dao = new DAO();
$mesFormations = $dao->getFormations();
include_once('../view/formation.view.php');
