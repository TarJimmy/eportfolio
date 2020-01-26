<?php require('ComponentsView.view.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php ComponentView::generateHead("Exp Professionnel");  ?>

  <body>
    <?php ComponentView::generateHeader(ComponentView::EST_EXP_PRO);  ?>
    <section id="titre" class="container text-center text-justify font-weight-bold">
        <h1>Mes expériences professionnelles </h1>
    </section>
    <section id="description" class="containerfont-weight-normal">
      <div class="container col">
        <?php
        $anneeCourante = "0";
        foreach ($mesExp as $key => $expCourante) {
            //Ecrire l'année courante des expérience
            //Décomposer les dates
            $dateDebut = explode('-',$expCourante["DateDebut"]);
            $dateFin = explode('-',$expCourante["DateFin"]);
             if ($anneeCourante != $dateFin[0]){
              $anneeCourante = $dateFin[0]; ?>
              <div class="row">
                <div class="col">
                  <h2 id="anneeCourante" class="text-center">Pour <?=$anneeCourante?></h2>
                </div>
              </div>
            <?php } ?>
            <!- Ecrire la description de l'expérience !-->
            <div class="row" id="caseExperience">
              <form action="detailsExperiencePro.ctrl.php" method="post">
                <input type="hidden" name="idExp" value="<?=$expCourante['idExp']?>">
                <button type="submit" class="btn btn-secondary btn-sm">Voir details &raquo;</button>
              </form>
                <h4 id="lienDetail"><?php
                //Si l'année de début est égal à l'année de fin, n'afficher qu'une fois l'année
                //Sinon afficher l'année sous la forme xxxx - xxxx
                if ($dateDebut[0]==$dateFin[0]) {

                      echo $dateDebut[0]." (";
                        // récupérer le mois
                        //Si les mois sont égaux, n'ecire le mois qu'une fois le mois (le nom)
                        //Sinon afficher les mois sous la forme mois1 - mois2
                        if ($dateDebut[1]==$dateFin[1]){
                          echo  ComponentView::getMois(intval($dateDebut[1])).")";
                        }
                        else {
                            echo ComponentView::getMois(intval($dateDebut[1])).'-'.ComponentView::getMois(intval($dateFin[1])).")";
                        }
                      }
                      else {
                        echo $dateDebut[0].' - '.$dateFin[0];
                      }
                      echo ' : '.$expCourante['intitule']." - ".$expCourante['typeContrat']?>
                  </h4>
            </div>
        <?php } ?>
      </div>
    </section>
  </body>
</html>
<!--
  <embed src="images/CV.pdf" width="680px" height="1000px">
  !-->
