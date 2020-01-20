<?php require('ComponentsView.view.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php ComponentView::generateHead("Détail");  ?>

  <body class="text-justify">
    <?php ComponentView::generateHeader(ComponentView::EST_EXP_PRO);  ?>
    <section id="titre" class="container text-center font-weight-bold">
        <h1><?=$type?> :</h1>
    </section>
    <button type="button" class="btn btn-danger" onclick="history.go(-1)">Retour page précedente &raquo;</button>
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
          <div class="row">
            <p class = "font-weight-bold">Type d'entreprise :</p>
            <p><?=$detailsExp['typeEntreprise']?></p>
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
      <div class="row">
        <p class = "font-weight-bold">Description du poste :</p>
        <p class = "font-weight-normal"><?=$detailsExp['descriptionPoste']?></p>
      </div>
      <div class="row">
      <?php
        if ($detailsExp['imageContrat']=="") {
          echo "<h3>Aucun contrat n'a été enregistré. Veuillez contacter l'administrateur pour qu'il puissent remedier à ce problème.</h3>";
        }
        else {
          $tabImages = explode('//',$detailsExp['imageContrat']); ?>
          <div class="row">
            <?php
            echo "Voici ".(count($tabImages)>1?" les contrats" : "le contrat")." de cet emploi : ";
            ?>
            </div> <?php
          foreach ($tabImages as $key => $image) {?>
            <div class="col">
              <a href="../view/images/contrat/<?=$image?>" target="_blank"><?=$image?></a>
            </div>
          <?php } } ?>
      </div>
    </section>
  </body>
</html>
