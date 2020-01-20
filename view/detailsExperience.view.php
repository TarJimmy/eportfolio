<?php require('ComponentsView.view.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php ComponentView::generateHead("Détail");  ?>

  <body class="text-justify">
    <?php var_dump($detailsExp);ComponentView::generateHeader(ComponentView::EST_EXP_PRO);  ?>
    <section id="titre" class="container text-center font-weight-bold">
        <h1><?=$type?> :</h1>
        <h2><?=$detailsExp['nom']?></h2>
    </section>
    <section id="Descriptionentreprise"class="container font-weight-normal row">
      <fieldset class="form-group col">
        <legend class ="font-weight-normal">Informations sur l'entreprise</legend>
          <div class="row">
            <p class="font-weight-bold">Son nom :</p>
            <p><?=$detailsExp['Entreprise']?></p>
          </div>
          <div class="row">
            <p class = "font-weight-bold">Le gérant :</p>
            <p><?=$detailsExp['Patron']?></p>
          </div>
          <div class="row">
            <p class = "font-weight-bold">Résidence :</p>
            <p><?=$detailsExp['lieu']?></p>
          </div>
        </fieldset>
        <fieldset class="form-group col">
          <legend class ="font-weight-normal">Informations sur mon contrat</legend>
            <div class="row">
              <p class="font-weight-bold">Type d'emploie :</p>
              <p><?=$detailsExp['typeContrat']?></p>
            </div>
            <div class="row">
              <p class = "font-weight-bold">1er Jour :</p>
              <p><?=$detailsExp['DateDebut']?></p>
            </div>
            <div class="row">
              <p class = "font-weight-bold">Dernier Jour :</p>
              <p><?=$detailsExp['DateFin']?></p>
            </div>
            <div class="row">
              <p class = "font-weight-bold">Duree :</p>
              <p>
              <?php
              $dateDebut = new DateTime($detailsExp['DateDebut']);
              $dateFin = new DateTime($detailsExp['DateFin']);
              $difference = $dateDebut->diff($dateFin);
              $nbAnnee = $difference->y;
              $nbMois = $difference->m;
              $nbJours = $difference->d;
              if ($nbAnnee>0) {
                echo $nbAnnee." ans";
                if($nbMois>0){
                  echo "et ".$nbMois." mois";
                }
              }
              else if ($nbMois>0){
                echo $nbMois." mois";
                if(round($nbJours/7.0,0)>0){
                  echo "et ".$nbJours." semaine";
                }
              }
              else {
                $nbSemaine = round($nbJours/7.0);
                if($nbSemaine>0){
                  if ($nbSemaine!=4) {
                  echo $nbSemaine." semaine";
                  }
                  else {
                    echo "1 mois";
                  }
                }
                else {
                  echo $nbJours." jours";
                }
              }
              ?>
              </p>
            </div>
          </fieldset>
    </section>
    <section class="container text-center font-weight-bold col">
      <?php
        if ($detailsExp['imageContrat']=="") {
          echo "<h3>Aucun contrat n'a été enregistré. Veuillez contacter l'administrateur pour qu'il puissent remedier à ce problème.</h3>";
        }
        else {
          $tabImages = explode('//',$detailsExp['imageContrat']);
          echo "Voici ".(count($tabImages)>1?" les contrats" : "le contrat")." de cet emploi : ";
          foreach ($tabImages as $key => $image) {
            echo $image; ?>
            <div class="row">
              <embed src="../view/images/contrat/<?=$image?>">
            </div>
          <?php } } ?>
    </section>
  </body>
</html>
