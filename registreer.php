<?php

include_once(__DIR__ . "/autoload.php");

if(!empty($_POST)){
    try {
        $user = new User();
        $user->setEmail($_POST['email']);

        $password = $_POST['password'];
        $conform_password = $_POST['conform_password'];

        if($password == $conform_password){
            $user->setPassword($_POST['conform_password']);
            if(!empty($_POST['email']) && !empty($_POST['conform_password'])){
                $user->register();
                header("Location: login.php");
            }else{
                $inputError = true;
            }
        }else{
            $error = true;
        }
    }
    catch(Throwable $error) {
        $error = $error->getMessage();
    }

}

?><!DOCTYPE html>
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


<form class="form-group" method="post">
  <h1 class="form-group__title">Registreer</h1>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">E-mailadres</label>
    <input name="email" type="text" id="myInput" class="form-group__input" placeholder="john.doe@gmail.com">
  </div>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">Wachtwoord</label>
    <input name="password" type="password" id="myInput" class="form-group__input" placeholder="********">
  </div>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">Wachtwoord bevestigen</label>
    <input name="conform_password" type="password" id="myInput" class="form-group__input" placeholder="********">
  </div>
  <div class="form-group__header">
    <button type="submit" href="#" class="button__longtext--large">
        <span class="button__body">Registreer</span>
    </button>
    <a href="login.php" class="form-group__link">Ik heb al een profiel</a>
  </div>
</form>



<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>