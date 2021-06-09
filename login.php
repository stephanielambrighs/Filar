<?php

require_once(__DIR__ . "/autoload.php");

session_start();

if(!isset($_SESSION['id'])){
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    try {
      $user = new User();
      $user->setEmail($_POST['email']);
      $user->setPassword($_POST['password']);

      if($user->canLogin()){
        session_start();
        $_SESSION["email"] = $user->getEmail();
        $email = $user->getEmail();
        $_SESSION['id'] = $user->getId($email)[0][0];
        header("Location: plastic-tracker.php");
      }
      else{
        $error = true;
      }
    }
    catch(Exception $e){
      $error = $e->getMessage();
      $error = true;
    }

  }
}else{
  header("Location: plastic-tracker.php");
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
  <h1 class="form-group__title">Log in</h1>
  <div class="form-group__header">
    <?php if(isset($error)): ?>
      <div class="alert"><?php echo "Sorry, de inloggegevens zijn niet correct"; ?></div>
    <?php endif; ?>
  </div>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">E-mailadres</label>
    <input name="email" type="text" class="form-group__input" placeholder="john.doe@gmail.com">
  </div>
  <div class="form-group__header">
    <label for="myInput" class="form-group__label">Wachtwoord</label>
    <input name="password" type="password" class="form-group__input" placeholder="********">
  </div>
  <div class="form-group__header">
    <button type="submit" class="button">
        <span class="button__body">Log in</span>
    </button>
    <a href="registreer.php" class="form-group__link">Ik heb nog geen profiel</a>
  </div>
</form>



<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>