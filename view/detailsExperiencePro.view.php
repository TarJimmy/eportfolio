<?php require('ComponentsView.view.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php ComponentView::generateHead("Détail");  ?>

  <body class="text-justify">
    <?php var_dump($detailsExp);ComponentView::generateHeader(ComponentView::EST_EXP_PRO);  ?>
    <section id="titre" class="container text-center font-weight-bold">
        <h1>Détail d'une experience professionnelle :</h1>
        <h2><?=$detailsExp['intitule']?></h2>
    </section>
    <button type="button" class="btn btn-danger" onclick="history.go(-1)">&laquo; Retour page précedente</button>
    <section id="Descriptionentreprise"class="container font-weight-normal row">
      <fieldset class="form-group col">
        <legend class ="font-weight-normal">Informations sur l'entreprise</legend>
          <div class="row">
            <p class="font-weight-bold">Son nom :</p>
            <p><?=$detailsExp['nomEntreprise']?></p>
          </div>
          <div class="row">
            <p class = "font-weight-bold">Le gérant :</p>
            <p><?=$detailsExp['patron']?></p>
          </div>
          <div class="row">
            <p class = "font-weight-bold">Résidence :</p>
            <p><?=$detailsExp['residence']?></p>
          </div>
          <div class="row">
            <p class = "font-weight-bold">Type d'entreprise :</p>
            <p><?=$detailsExp['typeEntreprise']?></p>
          </div>
          <div class="row">
            <p class = "font-weight-bold">Pour plus d'information :</p>
            <a href="<?=$detailsExp['lienSociete']?>" target="_blank"><p>http://societe.com</p></a>
          </div>
        </fieldset>
        <fieldset class="form-group col">
          <legend class ="font-weight-normal">Informations sur mon contrat</legend>
            <div class="row">
              <p class="font-weight-bold">Type d'emploi :</p>
              <p><?=$detailsExp['typeContrat']?></p>
            </div>
            <div class="row">
              <p class = "font-weight-bold">1er Jour :</p>
              <p><?=ComponentView::ecrireDateFR($detailsExp['DateDebut'])?></p>
            </div>
            <div class="row">
              <p class = "font-weight-bold">Dernier Jour :</p>
              <p><?=ComponentView::ecrireDateFR($detailsExp['DateFin'])?></p>
            </div>
            <div class="row">
              <p class = "font-weight-bold">Duree :</p>
              <p><?=ComponentView::getPeriode($detailsExp['DateDebut'],$detailsExp['DateFin'])?></p>
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
          echo "<h4>Aucun contrat n'a été enregistré. Veuillez contacter l'administrateur pour qu'il puissent remedier à ce problème.</h4>";
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
