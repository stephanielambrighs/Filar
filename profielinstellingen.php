<?php

require_once(__DIR__ . "/autoload.php");

session_start();

// if the session is not set then a redirect
if(!isset($_SESSION['email'])){
  header("Location: login.php");
}else{

    // else do something in this page
    $sessionUser = $_SESSION['email'];
    $userEmail = $sessionUser->getEmail();
    $user = User::loadProfile($userEmail);
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Profielinstellingen</title>
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
    <li class="sub-nav__item">
      <a href="aankoopgeschiedenis.php" class="sub-nav__link">Aankoopgeschiedenis</a>
    </li>
    <li class="sub-nav__item--active">
      <a href="profielinstellingen.php" class="sub-nav__link--active">Profielinstellingen</a>
    </li>
  </ul>
</nav>


<h1 class="card__title">Profiel details</h1>
<ul class="list">
    <div class="list__second">
        <h2 class="list__subtitle">Persoonlijke details</h2>
        <li class="list__item">Voornaam
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['firstname'];?>
            </ul>
        </li>
        <li class="list__item">Achternaam
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['lastname'];?>
            </ul>
        </li>
        <li class="list__item">Geboortedatum
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['date_of_birth'];?>
            </ul>
        </li>
        <li class="list__item">E-mailadres
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['email'];?>
            </ul>
        </li>
        <li class="list__item">Wachtwoord
            <ul class="list__second">
                <li class="list__item__second">******
            </ul>
        </li>
        <a href="#" class="list__link">Persoonlijke details bijwerken</a>
    </div>

  <ul class="list--second">
    <div class="list__second">
        <h2 class="list__subtitle">Adres details</h2>
        <li class="list__item">Straat
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['street'];?>
            </ul>
        </li>
        <li class="list__item">Gemeente
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['city'];?>
            </ul>
        </li>
        <li class="list__item">Provincie
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['province'];?>
            </ul>
        </li>
        <li class="list__item">Land
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['country'];?>
            </ul>
        </li>
        <a href="#" class="list__link">Adres details bijwerken</a>
    </div>
  </ul>

</ul>






<?php include_once("inc/footer.inc.php"); ?>

</body>
</html>