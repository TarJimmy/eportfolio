<?php require('ComponentsView.view.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="../framework/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
  </head>

  <body>
    <?php ComponentView::generateHeader(ComponentView::EST_ACCUEIL);  ?>
    <section id="titre" class="container text-center text-justify font-weight-bold">
        <h1>Bienvenue sur mon E-Portfolio numérique </h1>
        <h4>Une réalisation de <?=$user->getNomComplet()?> </h4>
    </section>
    <section id="description" class="containerfont-weight-normal">
      <h2 class="font-weight-bold">Qui suis-je ?</h2>
      <p>J'ai actuellement <?=$user->getAge()?> ans. Je suis un <?=$user->getStatus()?>.</p>
      <h4 class="font-weight-bold">Ma plus grande passion <3</h4>
      <p>Je fait pas mal de sport, notamment du basket. Par exemple, on peut voir sur cette vidéo un extrait de mon talent : </p>
    </section>
    <div class="container">
    <embed src="../view/images/video_basket.mp4">
  </div>
  </body>
</html>
<!--
  <embed src="images/CV.pdf" width="680px" height="1000px">
  !-->
