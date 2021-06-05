<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Contact</title>
</head>
<body>
<?php include_once("inc/nav.inc.php"); ?>

<article class="card">
  <div class="card__header--models">
    <div class="card__form--split">
        <h1 class="card__title--split">Contacteer ons</h1>
        <form class="form">
            <div class="form__header--first">
                <label for="myInput" class="form__label">E-mailadres</label>
                <input type="text" id="myInput" class="form__input" placeholder="john.doe@gmail.com">
            </div>
            <div class="form__header--first">
                <label for="myInput" class="form__label">Voor- en achternaam</label>
                <input type="text" id="myInput" class="form__input" placeholder="John Doe">
            </div>
            <div class="form__header--first">
                <label for="myInput" class="form__label">Bericht</label>
                <textarea type="text" id="myTextarea" class="form__input" placeholder="Uw bericht naar ons"></textarea>
            </div>
            <div class="form__header--first">
                <a href="#" class="button__longtext">
                    <span class="button__body">Versturen</span>
                </a>
            </div>
        </form>
    </div>
    <div class="card__form--split">
        <h1 class="card__title--split">Bezoek onze winkel</h1>
        <figure class="card__figure">
            <img src="/images/6_OnzeMissie.png" alt="onze_missie" class="card__image">
        </figure>
        <div class="card__body--models">
            <p class="card__copy">
                <img src="/images/icons_mail.png" alt="icon" class="card__image--icon">
                Zandpoortvest 60, 2800 Mechelen
            </p>
            <p class="card__copy">
                <img src="/images/icons_telefoon.png" alt="icon" class="card__image--icon">
                015 06 12 51
            </p>
            <p class="card__copy">
                <img src="/images/icons_klok.png" alt="icon" class="card__image--icon">
                Elke weekdag open van 13:00 tot 18:00
            </p>
        </div>
    </div>
  </div>
</article>




<?php include_once("inc/footer.inc.php"); ?>

</body>
</html>