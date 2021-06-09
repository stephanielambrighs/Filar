<?php
    include_once(__DIR__ . "/classes/Scanner.php");

    session_start();

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
    <p id="scan_camera_view">Hoeveelheid</p>
    <p id="scan_user_id">Gebruiker</p>
    <p id="scan_amount">Hoeveelheid</p>
    <form action="" method="POST">
        <input type="text" name="user_id" placeholder="Gebruiker ID">
        <input type="text" name="amount" placeholder="Hoeveelheid in kg">
        <input type="text" name="method" placeholder="Hoe het werd ingeleverd">
        <input type="submit" name="submit_scan">
    </form>
</body>
</html>