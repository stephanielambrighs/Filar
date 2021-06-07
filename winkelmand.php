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
    <title>Winkelmand</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>


<h1 class="card__title">Mijn winkelmand</h1>

<table class="table--large">
  <tr class="table__header">
    <th class="table__title">Product</th>
    <th class="table__title"></th>
    <th class="table__title">Prijs</th>
    <th class="table__title">Aantal</th>
    <th class="table__title--item">Subtotaal</th>
    <th class="table__title"></th>
  </tr>
  <tr class="table__item">
    <td class="table__subtitle"><img class="table__image" src="/images/product_smartphone_houder.jpg" alt="smarthphone_houder"></td>
    <td class="table__subtitle">
        <span class="table__subtitle--product">Smartphone houder</span>
    </td>
    <td class="table__subtitle">€15</td>
    <td class="table__subtitle">
        <div class="card__body__block--large">
            <div class="card__count">
                    <span>1</span>
            </div>
            <div class="card__arrow--first">
                <a href="#"><img class="card__img--first" src="/images/arrow_icon.png"></a>
                <a href="#"><img class="card__img--second" src="/images/arrow_icon.png"></a>
            </div>
        </div>
    </td>
    <td class="table__subtitle--item">€15</td>
    <td class="table__subtitle--item">
        <a href="#"><img class="table__image" src="/images/icons_vuilbak.png" alt="vuilbak"></a>
    </td>
  </tr>
</table>


<ul class="list--large">
    <div class="list__second">
        <h2 class="list__subtitle">Totaal winkelmand</h2>
        <li class="list__item">Subtotaal
            <ul class="list__second">
                <li class="list__item__second">€25
            </ul>
        </li>
        <li class="list__item">Verzending
            <ul class="list__second">
                <li class="list__item__second">€3
            </ul>
        </li>
        <li class="list__item">Korting
            <ul class="list__second">
                <li class="list__item__second">€0
            </ul>
        </li>
    </div>
</ul>

<article class="card">
  <div class="card__header--switch">
    <div class="card__body--shop">
        <h2 class="card__subtitle--item">Totaal aankoop</h2>
        <h3 class="card__subtitle--item">Je hebt 3 kortingsbonnen van 5 euro per stuk*</h3>
        <a href="#" class="button__item--small">
            <span class="button__body">Een kortingsbon toepassen</span>
        </a>
        <p class="card__copy">
        *Maximum 1 kortingsbon per aankoop
        </p>
    </div>
    <div class="card__body--shop">
        <h2 class="card__subtitle--item">€28</h2>
        <a href="#" class="button__item--edit">
            <span class="button__body">Winkelmand bijwerken</span>
        </a>
        <a href="#" class="button__code--small">
            <span class="button__body">Betalen</span>
        </a>
    </div>
  </div>
</article>

<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>