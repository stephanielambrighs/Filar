<?php

require_once(__DIR__ . "/autoload.php");

session_start();

// if the session is not set then a redirect
if(!isset($_SESSION['email'])){
  header("Location: login.php");
}else{

// else do something in this page

}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Inlevergeschiedenis</title>
</head>
<body>


<?php include_once("inc/nav.inc.php"); ?>

<nav class="sub-nav" aria-label="sub">
  <ul class="sub-nav__list">
    <li class="sub-nav__item">
      <a href="plastic-tracker.php" class="sub-nav__link">Plastic tracker</a>
    </li>
    <li class="sub-nav__item--active">
      <a href="inlevergeschiedenis.php" class="sub-nav__link--active">Inlevergeschiedenis</a>
    </li>
    <li class="sub-nav__item">
      <a href="aankoopgeschiedenis.php" class="sub-nav__link">Aankoopgeschiedenis</a>
    </li>
    <li class="sub-nav__item">
      <a href="profielinstellingen.php" class="sub-nav__link">Profielinstellingen</a>
    </li>
  </ul>
</nav>

<h1 class="card__title">Mijn PET inlevergeschiedenis</h1>
<table class="table">
  <tr class="table__header">
    <th class="table__title">Hoeveelheid</th>
    <th class="table__title">Inlevermethode</th>
    <th class="table__title">Datum</th>
    <th class="table__title--item">Bon ontvangen</th>
  </tr>
  <tr class="table__item">
    <td class="table__subtitle">5,3kg</td>
    <td class="table__subtitle">Thuis ophalen</td>
    <td class="table__subtitle">29/03/2021</td>
    <td class="table__subtitle--item">Nog niet ontvangen</td>
  </tr>
  <tr class="table__item">
    <td class="table__subtitle">6,8kg</td>
    <td class="table__subtitle">Thuis ophalen</td>
    <td class="table__subtitle">15/03/2021</td>
    <td class="table__subtitle--item">20/03/2021</td>
  </tr>
  <tr class="table__item">
    <td class="table__subtitle">2,1kg</td>
    <td class="table__subtitle">In de winkel leveren</td>
    <td class="table__subtitle">27/02/2021</td>
    <td class="table__subtitle--item">02/03/2021</td>
  </tr>
</table>

<?php include_once("inc/footer.inc.php"); ?>


</body>
</html>