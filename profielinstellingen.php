<?php

require_once(__DIR__ . "/autoload.php");

session_start();

// if the session is not set then a redirect
if(!isset($_SESSION['id'])){
  header("Location: login.php");
}else{

    // else do something in this page
    $sessionUser = $_SESSION['id'];
    $userEmail = $sessionUser->getEmail();
    $user = User::loadProfile($userEmail);
    $userId = $user['id'];
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
    <div id="showProfileDetails" class="list__second">
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
        <a id="edit" href="#" class="list__link">Persoonlijke details bijwerken</a>
    </div>

    <form method="POST" id="editProfileDetails" class="list__second">
        <h2 class="list__subtitle">Persoonlijke details</h2>
        <li class="list__item">Voornaam
            <ul class="list__second">
                <li class="list__item__second"><input id="firstname" type="text" name="firstname" placeholder="john">
            </ul>
        </li>
        <li class="list__item">Achternaam
            <ul class="list__second">
                <li class="list__item__second"><input id="lastname" type="text" name="lastname" placeholder="doe">
            </ul>
        </li>
        <li class="list__item">Geboortedatum
            <ul class="list__second">
                <li class="list__item__second"><input id="date_of_birth" type="date" name="date_of_birth" placeholder="1997-01-01">
            </ul>
        </li>
        <li class="list__item">E-mailadres
            <ul class="list__second">
                <li class="list__item__second"><?php echo $user['email'];?>
            </ul>
        </li>
        <li class="list__item">Wachtwoord
            <ul class="list__second">
                <li class="list__item__second"><input id="password" type="password" name="password" placeholder="*******">
            </ul>
        </li>
        <a id="update" type="submit" href="#" class="list__link">Update persoonlijke details</a>
    </form>

  <ul id="showAdressDetails" class="list--second">
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
        <a id="editAdress" href="#" class="list__link">Adres details bijwerken</a>
    </div>
  </ul>

  <form id="editAdressDetails" method="POST" class="list--second">
    <div class="list__second">
        <h2 class="list__subtitle">Adres details</h2>
        <li class="list__item">Straat
            <ul class="list__second">
                <li class="list__item__second"><input id="street" type="text" name="street" placeholder="Zandpoortvest 60">
            </ul>
        </li>
        <li class="list__item">Gemeente
            <ul class="list__second">
                <li class="list__item__second"><input id="city" type="text" name="city" placeholder="Mechelen">
            </ul>
        </li>
        <li class="list__item">Provincie
            <ul class="list__second">
                <li class="list__item__second"><input id="province" type="text" name="province" placeholder="Antwerpen">
            </ul>
        </li>
        <li class="list__item">Land
            <ul class="list__second">
                <li class="list__item__second"><input id="country" type="text" name="country" placeholder="Belgium">
            </ul>
        </li>
        <a id="updateAdress" type="submit" href="#" class="list__link">Update adres details</a>
    </div>
  </ul>

</ul>


<?php include_once("inc/footer.inc.php"); ?>

<script type="text/javascript">
    let userId = <?php echo $userId;?>;
</script>
<script src="/javascript/profile.js"></script>

</body>
</html>