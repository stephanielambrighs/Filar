<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Item</title>
</head>
<body>


<?php include_once("inc/nav.inc.php"); ?>


<article class="card">
  <div class="card__header">
    <figure class="card__figure">
        <img src="/images/product_smartphone_houder.jpg" alt="print_smarthphone" class="card__image--item">
    </figure>
    <div class="card__body--item">
        <h1 class="card__subtitle--item">Smartphone houder</h1>
        <p class="card__copy">
        We leven in een digitale wereld en deze smartphone houder is de perfecte accesoire voor jouw digitale levensstijl.
        Is de batterij van jouw laptop leeg en heb je zin om de nieuwste aflevering van jouw favoriete serie te kijken
        tijdens het avondeten?
        Gebruik deze stevige en minimalistische houder in plaats van jouw smartphone ongemakkelijk tegen een pot of doos aan te leunen.
        Daarbovenop is de houder zelfs sterk genoeg om kleine tablets overeind te houden,
        dus kan je op verschillende schermgroottes genieten van jouw content.
        </p>
        <h3 class="card__subtitle--item">Specificaties</h3>
        <ul>
            <li>Gemaakt van 100% gerecycleerd PETG</li>
            <li>Modern en minimalistisch design</li>
            <li>Stevig en compact</li>
        </ul>
        <h3 class="card__subtitle--item">Afmetingen</h3>
        <ul>
            <li>2 cm hoog</li>
            <li>4 cm breed</li>
            <li>6 cm diep</li>
        </ul>
        <div class="card__body__block">
            <div class="card__count">
                <span>1</span>
            </div>
            <div class="card__arrow--first">
                <a href="#"><img class="card__img--first" src="/images/arrow_icon.png"></a>
                <!-- <div class="card__arrow--second"> -->
                <a href="#"><img class="card__img--second" src="/images/arrow_icon.png"></a>
                <!-- </div> -->
            </div>

            <a href="#" class="button__item">
                <span class="button__body">Toevoegen aan winkelmand</span>
            </a>
        </div>
    </div>
  </div>
</article>

<h1 class="card__title--item">Anderen bekeken ook</h1>
<article class="card--shop--item">
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


<?php include_once("inc/footer.inc.php"); ?>


</body>
</html>