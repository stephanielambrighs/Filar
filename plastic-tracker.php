<?php

include_once(__DIR__ . "/classes/User.php");
require_once(__DIR__ . "/autoload.php");

session_start();

  // if the session is not set then a redirect
if(!isset($_SESSION['id'])){
  header("Location: login.php");
}else{
  // else do something in this page
  $u = new User();
  $email = $_SESSION['email'];
  $id = $u->getId($email)[0][0];
  $allDelivered = $u->allDelivered($id);
  $u->allDeliveredSum($id);
  $currentPlastic = $u->plasticTracker($id);
  $coupons_used = $u->getCoupons($id);
  $coupons_available = $u->plasticTracker($id)[0];
}

?>

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
      <a href="plastic-tracker.php" class="sub-nav__link--active">Plastic tracker</a>
    </li>
    <li class="sub-nav__item">
      <a href="inlevergeschiedenis.php" class="sub-nav__link">Inlevergeschiedenis</a>
    </li>
    <li class="sub-nav__item">
      <a href="aankoopgeschiedenis.php" class="sub-nav__link">Aankoopgeschiedenis</a>
    </li>
    <li class="sub-nav__item">
      <a href="profielinstellingen.php" class="sub-nav__link">Profielinstellingen</a>
    </li>
  </ul>
</nav>

<article class="card--code">
  <div class="card__header--tracker">
  <h1 class="card__title">Plastic Tracker</h1>
    <figure class="card__figure">
      <canvas id="myChart" class="card__image--chart"></canvas>
        <h3 class="card__canvas--title">Huidig PET doel</h3>
        <h2 class="card__canvas--kilo">0,<span id="currentTarget"><?php echo $currentPlastic[1] ?></span>/1kg</h2>
    </figure>
    <div class="card__body--tracker">
        <div class="card__copy">
            <h2 class="card__subtitle">Bonnen beschikbaar</h2>
            <h3 class="card__subtitle--h3"><?php echo $coupons_available-$coupons_used ?></h3>
            <a href="scanner.php" class="form-group__link--code">Mijn scanner</a>
        </div>
        <div class="card__copy">
            <h2 class="card__subtitle">Totaal PET ingeleverd</h2>
            <h3 class="card__subtitle--h3"><?php echo $currentPlastic[0] ?>,<?php echo $currentPlastic[1] ?>kg</h3>
        </div>
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
        <br>
        Je moet gewoon voor elke zak met PET flessen die je zou willen inleveren
        het formulier afdrukken en ????n op elke zak vastmaken.
        Dan hoef je het alleen nog maar in te leveren en de rest van het proces nemen wij wel voor onze rekening.
        Een aantal dagen later zal je de korting in jouw profiel zien staan.
        </p>
        <a href="/documents/persoonlijke_code.pdf" class="button__code" download="persoonlijke_code">
            <span class="button__body">Download persoonlijke code</span>
        </a>
    </div>
  </div>
</article>

<?php include_once("inc/footer.inc.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
<script>
  let done = document.getElementById("currentTarget").innerText;
  let notDone = 10 - done;
  let myChart = document.getElementById("myChart").getContext("2d");
  let plasticChart = new Chart(myChart, {
    type: 'doughnut',
    data: {
      labels:["Ingeleverd", "Nog in te leveren"],
      datasets: [{
        data: [done, notDone],
        backgroundColor: ["#44cb7c", "#2528ba"]
      }]
    },
    options: {
      cutout: "90%"
    }
  })
</script>
</body>
</html>