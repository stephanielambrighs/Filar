<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>login</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>



<form class="form-group">
  <h1 class="form-group__title">Registreer</h1>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">E-mailadres</label>
    <input type="text" id="myInput" class="form-group__input" placeholder="john.doe@gmail.com">
  </div>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">Wachtwoord</label>
    <input type="text" id="myInput" class="form-group__input" placeholder="********">
  </div>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">Wachtwoord bevestigen</label>
    <input type="text" id="myInput" class="form-group__input" placeholder="********">
  </div>
  <div class="form-group__header">
    <a href="#" class="button__longtext--large">
        <span class="button__body">Registreer</span>
    </a>
    <a href="login.php" class="form-group__link">Ik heb al een profiel</a>
  </div>
</form>



<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>