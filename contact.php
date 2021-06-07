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
        <form class="form" action="https://formsubmit.co/ellievision88@gmail.com" method="POST">
            <div class="form__header--first">
                <label for="myInput" class="form__label">E-mailadres</label>
                <input type="email" name="email" class="form__input" placeholder="john.doe@gmail.com" required>
            </div>
            <div class="form__header--first">
                <label for="myInput" class="form__label">Voor- en achternaam</label>
                <input type="text" name="name" class="form__input" placeholder="John Doe" required>
            </div>
            <div class="form__header--first">
                <label for="myInput" class="form__label">Bericht</label>
                <textarea type="text" name="message" id="myTextarea" class="form__input" placeholder="Uw bericht naar ons"></textarea>
            </div>
            <div class="form__header--first">
                <input type="hidden" name="_captcha" value="false">
                <!-- change page url -->
                <input type="hidden" name="_next" value="http://localhost:8086/contact.php">
                <button type="submit" href="#" class="button__longtext--contact">
                    <span class="button__body">Versturen</span>
                </button>
            </div>
        </form>
    </div>
    <div class="card__form--split">
        <h1 class="card__title--split">Bezoek onze winkel</h1>
        <figure class="card__figure">
            <iframe id="maps"
                src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Zandpoortvest%2060%2CMechelen%2CBelgium+(Filar)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0" margin="auto">
            </iframe>
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