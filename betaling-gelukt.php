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
    <title>Betaling gelukt</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>

<article class="card__shop--center">
  <div class="card__header__shop--center">
    <figure class="card__figure">
        <a href="#"><img src="/images/7_AankoopGelukt.png" alt="aankoop-gelukt" class="card__image__print--center"></a>
    </figure>
    <h2 class="card__subtitle__shop--center">Jouw aankoop is gelukt!</h2>
    <a href="#" class="button__longtext">
        <span class="button__body">Terug naar de winkel</span>
    </a>
  </div>
</article>


<?php include_once("inc/footer.inc.php"); ?>

</body>
</html>