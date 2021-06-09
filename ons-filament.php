<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Ons filament</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>

<article class="card">
  <h1 class="card__title">Eigenschappen</h1>
  <div class="card__header">
    <figure class="card__figure">
      <img src="/images/2_Sterk.png" alt="sterk" class="card__image">
    </figure>
    <div class="card__body">
        <h2 class="card__subtitle">Sterk</h2>
        <p class="card__copy">
        Een van de beste dingen aan PETG is hoe sterk het materiaal het.
        Het komt misschien wel van gerecycleerde PET flessen,
        maar verrassend genoeg is het sterker dan de twee meest gebruikte soorten filament, ABS en PLA.
        Concreet betekent dit dat prints van PETG meer druk kunnen weerstaan voor ze breken.
        Dit wordt ook geholpen door het feit dat het dankzij de toegevoegde glycol iets flexibeler is dan zowel ABS als PLA.
        </p>
    </div>
  </div>
  <div class="card__header--switch">
    <figure class="card__figure--switch">
      <img src="/images/3_Bestendig.png" alt="bestendig" class="card__image">
    </figure>
    <div class="card__body--switch">
        <h2 class="card__subtitle">Bestendig</h2>
        <p class="card__copy">
        Het materiaal zorgt niet alleen voor prints die fysiek sterker zijn,
        maar ook nog eens minstens even bestendig als de bekendere ABS en PLA.
        Hier hebben we het dan over bestendigheid tegen veelvoorkomende elementen zoals water en hitte.
        Hiernaast veroorzaken prints met PETG trouwens ook geen slechte geur tijdens en na het printproces,
        wat zeker kan helpen als jouw printer bijvoorbeeld altijd in jouw slaapkamer staat.
        We zouden wel nog altijd aanraden om de ruimte regelmatig te verluchten.
        </p>
    </div>
  </div>
  <div class="card__header">
    <figure class="card__figure">
      <img src="/images/4_WeinigVervorming.png" alt="vervorming" class="card__image">
    </figure>
    <div class="card__body">
        <h2 class="card__subtitle">Weinig vervorming</h2>
        <p class="card__copy">
        Nog een pluspunt aan PETG is de gemakkelijkheid om er mee te printen.
        Je kan hiermee net zo snel printen als met PLA omdat het bij printtemperatuur goed vloeibaar is.
        Het materiaal blijft ook goed aan het printbed kleven en heeft weinig last van vervorming.
        Het geprinte voorwerp zal met PETG ook een gladder en meer effen oppervlak hebben dan met PLA of ABS.
        </p>
    </div>
  </div>
</article>


<h1 class="card__title">Ideaal gebruik</h1>
<article class="card--usecases">
  <div class="card__header__usecases">
    <figure class="card__figure">
      <img src="/images/1_usecase.jpg" alt="usecase_huishoudelijk" class="card__image__usecases">
    </figure>
    <div class="card__body">
        <h2 class="card__subtitle__usecases">Huishoudelijk</h2>
    </div>
  </div>
  <div class="card__header__usecases">
    <figure class="card__figure">
      <img src="/images/2_usecase.jpg" alt="usecase_medisch" class="card__image__usecases">
    </figure>
    <div class="card__body">
        <h2 class="card__subtitle__usecases">Medisch hulpmiddel</h2>
    </div>
  </div>
  <div class="card__header__usecases">
    <figure class="card__figure">
      <img src="/images/3_usecase.jpg" alt="usecase_design" class="card__image__usecases">
    </figure>
    <div class="card__body">
        <h2 class="card__subtitle__usecases">Design</h2>
    </div>
  </div>
</article>

<?php include_once("inc/footer.inc.php"); ?>


</body>
</html>