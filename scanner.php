<?php
    include_once(__DIR__ . "/classes/Scanner.php");

    if(!empty($_POST["submit_scan"])){
        $sc = new Scanner();
        $user_id = $_POST["user_id"];
        $amount = $_POST["amount"];
        $method = $_POST["method"];
        $sc->addPlastic($user_id, $amount, $method);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Winkel</title>
</head>
<body>

<?php include_once("inc/nav.inc.php"); ?>

<form class="form-group" action="" method="POST">
    <h1 class="form-group__title">PET inzamelen</h1>
    <div class="form-group__header">
        <label for="myInput" class="form-group__label">Gebruiker</label>
        <input class="form-group__input" type="text" name="user_id" placeholder="Gebruiker ID">
    </div>
    <div class="form-group__header">
        <label for="myInput" class="form-group__label">Hoeveelheid in kg</label>
        <input class="form-group__input" type="text" name="amount" placeholder="Hoeveelheid in kg">
    </div>
    <div class="form-group__header">
        <label for="myInput" class="form-group__label">Hoe het werd ingeleverd</label>
        <input class="form-group__input" type="text" name="method" placeholder="Hoe het werd ingeleverd">
    </div>
    <div class="form-group__header">
        <input class="button--scan" name="submit_scan" type="submit">
    </div>
</form>


<?php include_once("inc/footer.inc.php"); ?>
</body>
</html>