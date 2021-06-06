<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Jouw eigen ontwerp</title>
</head>
<body>
<?php include_once("inc/nav.inc.php"); ?>

<article class="card">
  <h1 class="card__title--models">Vind jouw eigen 3D modellen... </h1>
  <div class="card__header--switch">
    <figure class="card__figure--switch--models">
        <div>
            <img src="/images/Thingiverse.jpeg" alt="thingiverse" class="card__image--models">
            <p class="card__subtitle--models">Thingiverse</p>
        </div>
        <div>
            <img src="/images/Pinshape.png" alt="pinshape" class="card__image--models">
            <p class="card__subtitle--models">Pinshape</p>
        </div>
    </figure>
    <div class="card__body--switch">
        <p class="card__copy">
        Indien je niet meteen iets terugvindt in ons bestaand aanbod,
        kan je er voor kiezen om zelf op zoek te gaan naar een leuk 3D model dat wij dan voor jou kunnen printen.
        We lijsten enkele websites die we gerust kunnen aanraden hier voor je op.
        <br><br>
        De eerste en meeste gekende optie is Thingiverse.
        Het platform is volledig gratis en bevat vrijwel zeker voor iedereen iets leuks.
        Je kan dus eender welk model aanklikken en het als een ZIP bestand downloaden om het met het onderstaand formulier naar ons door te sturen.
        <br><br>
        Als tweede optie raden we Pinshape aan.
        Dit platform werkt op een gelijkaardie manier als het eerste,
        maar hier zijn ook modellen te vinden waar je voor moet betalen.
        Uiteraard mag je dat zeker doen indien het echt een leuk model is en je het graag zou willen laten printen,
        maar die keuze laten we volledig aan jou over.
        </p>
    </div>
  </div>

  </div>
</article>


<article id="mission" class="card">
  <h1 class="card__title--models">... Of doe-het-zelf</h1>
  <div class="card__header">
    <figure class="card__figure--models">
        <div>
            <img src="/images/Blender.png" alt="blender" class="card__image--models">
            <p class="card__subtitle--models">Blender</p>
        </div>
        <div>
            <img src="/images/Netfabb.png" alt="netfabb" class="card__image--models--netfabb">
            <p class="card__subtitle--models">Netfabb</p>
        </div>
    </figure>
    <div class="card__body">
        <p class="card__copy">
        Indien je meer creatief van aard bent en zelf de uitdaging wil aangaan,
        kunnen wij ook een programma aanraden waarmee je zelf 3D modellen kan maken.
        <br><br>
        Blender is een voorbeeld van een uitstekend,
        krachtig en vooral gratis programma waarmee je aan de slag kan om jouw ideeën tot leven te brengen.
        Exporteer jouw 3D model uiteindelijk gewoon als een FBX bestand en steek dat in een ZIP,
        om het dan met het onderstaand formulier naar ons te sturen.
        </p>
    </div>
  </div>
</article>


<article class="card">
  <h1 class="card__title--models">Hoe dan ook, contacteer ons!</h1>
  <div class="card__header--models">
    <div class="card__body--models">
        <p class="card__copy">
        Welke manier je ook kiest, neem zeker met ons contact op en geef het model in een ZIP bestand mee,
        alsook de nodige gegevens en eventuele bijkomende instructies.
        Samen kunnen we de mogelijkheden bekijken en jou zo snel mogelijk jouw model bezorgen.
        <br><br>
        Als alles correct verloopt mag je snel van ons een mailtje terug verwachten waarin we
        eventuele bijkomende vragen stellen of gewoonweg de nodige informatie doorgeven zoals
        de prijs en wanneer de print klaar zal zijn.
        </p>
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
                <label for="myInput" class="form__label">ZIP bestand</label>
                <input type="file" id="myInput" class="form__input" placeholder="model.zip">
            </div>
            <div class="form__header--first">
                <label for="myInput" class="form__label">Groote in cm (maximum 25)</label>
                <input type="text" id="myInput" class="form__input" placeholder="20">
            </div>
        </form>
    </div>
    <div class="card__form">
        <form class="form">
            <div class="form__header">
                <label for="myInput" class="form__label">Kleur</label>
                <input type="text" id="myInput" class="form__input" placeholder="Kies uw kleur">
            </div>
            <div class="form__header">
                <label for="myInput" class="form__label">Leveringsmethode</label>
                <input type="text" id="myInput" class="form__input" placeholder="Kies uw leveringsmethode">
            </div>
            <div class="form__header">
                <label for="myInput" class="form__label--textarea">Bijkomende instructies</label>
                <textarea type="text" id="myTextarea" class="form__input" placeholder="Uw bijkomende instructies voor ons"></textarea>
            </div>
            <div class="form__header">
                <a href="#" class="button__longtext--send">
                    <span class="button__body">Versturen</span>
                </a>
            </div>
        </form>
    </div>
  </div>
</article>



<?php include_once("inc/footer.inc.php"); ?>

</body>
</html>