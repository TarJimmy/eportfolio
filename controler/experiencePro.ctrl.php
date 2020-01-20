<?php
//Incusion de la classe unique utilisateur
include_once("../model/DAO.class.php");
$dao = new DAO();
$mesExp = $dao->getExperiencePro();
include_once('../view/experiencePro.view.php');
