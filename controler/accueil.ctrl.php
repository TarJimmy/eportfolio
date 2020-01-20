<?php
//Incusion de la classe unique utilisateur
include_once("../model/TardyJimmy.class.php");

$tardyJimmy = TardyJimmy::getInstance();

include_once('../view/accueil.view.php');
