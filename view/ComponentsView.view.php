<?php

class ComponentView {
  const EST_ACCUEIL = "accueil";
  const EST_EXP_PRO = "Expérience Professionnel";
  const EST_FORMATION = "Formation";
  public static function generateHead($title) { ?>
    <head>
    <?php include_once('../framework/bootstrap.framework.php'); ?>
    <link rel="stylesheet" href="../view/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
  </head>
  <?php }

  public static function generateHeader($ongletActive) { ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Que voulez-vous consultez ?</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link
              <?php if(self::EST_ACCUEIL===$ongletActive) {?>
                active
              <?php } ?>" href="accueil.ctrl.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(self::EST_EXP_PRO===$ongletActive) {?>
                active
              <?php } ?>" href="experiencePro.ctrl.php">Mes expériences Professionnelles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(self::EST_FORMATION===$ongletActive) {?>
                active
              <?php } ?>" href="formation.ctrl.php">Mes Formations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mes projets universitaires</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mes Projets personnels</a>
            </li>
          </ul>
        </div>
      </nav>
  <?php }
  public static function generateFooter($user) { ?>
  <!-- Footer -->
  <footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="container">Mes réseaux</h5>
          <!--FB -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="icon-linkedin"></i> icon-linkedin
          </a>
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Me Contacter</h5>

          <ul class="list-unstyled">
            <li>Tel : <?=$user->getTelephone()?></li>
            <li>Email perso : <?=$user->getEmailPerso()?></li>
            <li>Email pro : <?=$user->getEmailPro()?></li>
            <li>Via mes réseaux</li>
          </ul>

        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
    <!-- Footer Links -->
  </footer>
  <!-- Footer -->
<?php }
  public static function getMois($numMois){
    switch ($numMois) {
      case 1:
        return "Janvier";
        break;
      case 2:
        return "Février";
        break;
      case 3:
        return "Mars";
        break;
      case 4:
        return "Avril";
        break;
      case 5:
        return "Mai";
        break;
      case 6:
        return "Juin";
        break;
      case 7:
        return "Juillet";
        break;
      case 8:
        return "Août";
        break;
      case 9:
        return "Septembre";
        break;
      case 10:
        return "Octobre";
        break;
      case 11:
        return "Novembre";
        break;
      case 12:
        return "Décembre";
        break;
      default:
        return "Erreur : ".$i." n'est pas un mois";
        break;
    }
  }
  //renvoie un string de la date sous format : 15 janvier 2019
  //$date doit etre de la forme : annee-mois-jour en nombre
  public static function ecrireDateFR($date){
    $tabDate = explode('-',$date);
    return $tabDate[2].' '.self::getMois(intval($tabDate[1])).' '.$tabDate[0];
  }

  //retourne le temps exacte ou approximatif de la période entre les 2 dates
  public static function getPeriode($dDebut,$dFin){
    $dateDebut = new DateTime($dDebut);
    $dateFin = new DateTime($dFin);
    $difference = $dateDebut->diff($dateFin);
    $nbAnnee = $difference->y;
    $nbMois = $difference->m;
    $nbJours = $difference->d;
    $resultat = "";
    if ($nbAnnee>0) {
      $resultat = $nbAnnee." ans";
      if($nbMois>0){
        $resultat .= " et ".$nbMois." mois";
      }
    }
    else if ($nbMois>0){
      $resultat = $nbMois." mois";
      $nbSemaine = round($nbJours/7.0);
      if($nbSemaine>0){
        $resultat .= " et ".$nbJours." semaines";
      }
    }
    else {
      $nbSemaine = round($nbJours/7.0);
      if($nbSemaine>0){
        if ($nbSemaine!=4) {
          $resultat =  $nbSemaine." semaine";
        }
        else {
          $resultat = "1 mois";
        }
      }
      else {
        $resultat = $nbJours." jours";
      }
    }
    return $resultat;
  }
}
