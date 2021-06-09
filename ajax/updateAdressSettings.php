<?php

include_once(__DIR__ . "/../classes/User.php");

if(!empty($_POST)){
    $userId = $_POST['userId'];
    $user = new User();
    $user->setStreet($_POST['street']);
    $user->setCity($_POST['city']);
    $user->setProvince($_POST['province']);
    $user->setCountry($_POST['country']);

    $updateAdressSetting = $user->updateAdress($userId);

    if ($updateAdressSetting) {
        $response = [
            'status' => 'success',
            'messsage' => 'Successfully update profile'
        ];
    }
    else {
        $response = [
            'status' => 'failed',
            'messsage' => 'Failed to update profile'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
