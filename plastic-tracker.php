<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Plastic tracker</title>
</head>
<body>


<?php include_once("inc/nav.inc.php"); ?>

<nav class="sub-nav" aria-label="sub">
  <ul class="sub-nav__list">
    <li class="sub-nav__item--active">
      <a href="#" class="sub-nav__link--active">Plastic tracker</a>
    </li>
    <li class="sub-nav__item">
      <a href="#" class="sub-nav__link">inlevergeschiedenis</a>
    </li>
    <li class="sub-nav__item">
      <a href="#" class="sub-nav__link">Aankoopgeschiedenis</a>
    </li>
    <li class="sub-nav__item">
      <a href="#" class="sub-nav__link">Profielinstellingen</a>
    </li>
  </ul>
</nav>

<article class="card--code">
  <div class="card__header--tracker">
  <h1 class="card__title">Plastic Tracker</h1>
    <figure class="card__figure">
      <img src="/images/2_Sterk.png" alt="donut_chart" class="card__image--chart">
    </figure>
    <div class="card__body--tracker">
        <div class="card__copy">
            <h2 class="card__subtitle">Bonnen ontvangen</h2>
            <h3 class="card__subtitle--h3">3</h3>
        </div>
        <div class="card__copy">
            <h2 class="card__subtitle">Totaal PET ingeleverd</h2>
            <h3 class="card__subtitle--h3">3,6kg</h3>
        </div>
        <a href="#" class="form-group__link--code">Mijn volledige inlevergeschiedenis</a>
    </div>
  </div>
  <div class="card__header--code">
  <h1 class="card__title">Persoonlijke code</h1>
    <div class="card__body--code">
        <p class="card__copy--code">
        Met de onderstaande knop kan je gemakkelijk het formulier met jouw persoonlijke code
        downloaden en vervolgens zelf afprinten zo vaak als je nodig hebt.
        Het werkt gelijkaardig aan een retour doen van een pakketje dat je besteld hebt.
        <br>
        Je moet gewoon voor elke zak met PET flessen die je zou willen inleveren
        het formulier afdrukken en één op elke zak vastmaken.
        Dan hoef je het alleen nog maar in te leveren en de rest van het proces nemen wij wel voor onze rekening.
        Een aantal dagen later zal je de korting in jouw profiel zien staan.
        </p>
        <a href="#" class="button__code">
            <span class="button__body">Download persoonlijke code</span>
        </a>
    </div>
  </div>
</article>


<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>