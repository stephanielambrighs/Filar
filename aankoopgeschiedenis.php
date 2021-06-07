<?php

include_once(__DIR__ . "/classes/User.php");
require_once(__DIR__ . "/autoload.php");

session_start();

// if the session is not set then a redirect
if(!isset($_SESSION['email'])){
  header("Location: login.php");
} else {

// else do something in this page
  $u = new User();
  $purchases = $u->purchaseHistory();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Aankoopgeschiedenis</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>

<nav class="sub-nav" aria-label="sub">
  <ul class="sub-nav__list">
    <li class="sub-nav__item">
      <a href="plastic-tracker.php" class="sub-nav__link">Plastic tracker</a>
    </li>
    <li class="sub-nav__item">
      <a href="inlevergeschiedenis.php" class="sub-nav__link">Inlevergeschiedenis</a>
    </li>
    <li class="sub-nav__item--active">
      <a href="aankoopgeschiedenis.php" class="sub-nav__link--active">Aankoopgeschiedenis</a>
    </li>
    <li class="sub-nav__item">
      <a href="profielinstellingen.php" class="sub-nav__link">Profielinstellingen</a>
    </li>
  </ul>
</nav>

<h1 class="card__title">Mijn aankoopgeschiedenis</h1>
<table class="table">
  <tr class="table__header">
    <th class="table__title">Product</th>
    <th class="table__title">Datum</th>
    <th class="table__title">Prijs</th>
    <th class="table__title">Aantal</th>
    <th class="table__title--item">Subtotaal</th>
  </tr>
  <?php foreach($purchases as $p): ?>
  <tr class="table__item">
    <td class="table__subtitle"><img class="table__image" src="/images/product_smartphone_houder.jpg" alt="smarthphone_houder"><span class="table__subtitle--product"><?php echo $p["name"] ?></span></td>
    <td class="table__subtitle"><?php echo $p["date"] ?></td>
    <td class="table__subtitle">€<?php echo $p["price"] ?></td>
    <td class="table__subtitle"><?php echo $p["quantity"] ?></td>
    <td class="table__subtitle--item">€<?php echo $p["quantity"]*$p["price"] ?></td>
  </tr>
  <?php endforeach; ?>
</table>

<?php include_once("inc/footer.inc.php"); ?>

</body>
</html>