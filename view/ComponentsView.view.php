<?php

class ComponentView {
  const EST_ACCUEIL = "accueil";
  public static function generateHeader($ongletActive) { ?>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link
              <?php if(self::EST_ACCUEIL===$ongletActive) {?>
                active
              <?php } ?>" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Expérience Professionnelle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mon parcours scolaires</a>
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
    </header>
  <?php }
}
