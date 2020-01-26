<?php require('ComponentsView.view.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php ComponentView::generateHead("Exp Professionnel");  ?>

  <body>
    <?php ComponentView::generateHeader(ComponentView::EST_FORMATION);  ?>
    <section id="titre" class="container text-center text-justify font-weight-bold">
        <h1>Mes Formations </h1>
    </section>
    <div class="container row">
        <?php
        foreach ($mesFormations as $key => $formCourante): ?>
        <div class="container col" id="fondPostIt">
          <div class="col align-items-center text-center" id="contenueForm" >
            <h4 class="font-weight-bold" ><?=$formCourante['nomFormation']?></h4>
                <h4>En <?=$formCourante['anneeDebut'].' - '.$formCourante['anneeFin']?></h4>
                <h4>À <?=$formCourante['ville']?></h4>
                <h4>
                <?php if (isset($formCourante['imageDiplome'])) { ?>
                  <a href="../view/images/diplomes/<?=$formCourante['imageDiplome']?>" target="_blank">Diplôme</a>
                <?php }
                else {
                  echo 'Obtention du diplôme en cours';
                }
                ?>
                </h4>
          </div>
        </div>
      <?php endforeach;?>
    </div>
</body>
</html>
