<?php
include_once("../model/Utilisateur.class.php");

$user = Utilisateur::getInstance();
include_once('../view/accueil.view.php');
