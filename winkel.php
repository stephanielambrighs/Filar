<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Winkel</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>


<h1 class="card__title">Ons ready-to-print aanbod</h1>
<article class="card--shop">
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_keycaps.jpg" alt="print_keycaps" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Keycaps</h3>
        <p class="card__subtitle__body">€30</p>
    </div>
  </div>
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_smartphone_houder.jpg" alt="print_smarthphone" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">GSM-houder</h3>
        <p class="card__subtitle__body">€15</p>
    </div>
  </div>
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_yoda.jpg" alt="print_yoda" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Baby Yoda</h3>
        <p class="card__subtitle__body">€20</p>
    </div>
  </div>
  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_dalek.jpg" alt="print_dalek" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Dalek</h3>
        <p class="card__subtitle__body">€25</p>
    </div>
  </div>  <div class="card__header__shop">
    <figure class="card__figure">
        <a href="#"><img src="/images/product_trees.jpg" alt="print_trees" class="card__image__print"></a>
    </figure>
    <div class="card__body__shop">
        <h3 class="card__subtitle__shop">Team Trees</h3>
        <p class="card__subtitle__body">€25</p>
    </div>
  </div>
</article>


<article class="card__shop--ownarticle">
  <div class="card__header__shop--ownarticle">
    <h2 class="card__subtitle__shop--ownarticle">Jouw eigen ontwerp</h2>
    <figure class="card__figure">
        <a href="#"><img src="/images/eigen_ontwerp_filar.jpg" alt="eigen_ontwerp_filar" class="card__image__print--ownarticle"></a>
    </figure>
  </div>
  <div class="card__header__shop--ownarticle">
    <h2 class="card__subtitle__shop--ownarticle">Ons gerecycleerd filament</h2>
    <figure class="card__figure">
        <a href="#"><img src="/images/gerecycleerd_filament.png" alt="gerecycleerd_filament" class="card__image__print--ownarticle"></a>
    </figure>
  </div>
</article>



<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>