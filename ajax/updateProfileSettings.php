<?php

include_once(__DIR__ . "/../classes/User.php");

if(!empty($_POST)){
    $userId = $_POST['userId'];
    $user = new User();
    $user->setFirstname($_POST['firstname']);
    $user->setLastname($_POST['lastname']);
    $user->setDate_of_birth($_POST['date_of_birth']);
    $user->setPassword($_POST['password']);

    $updateProfileSetting = $user->updateProfile($userId);

    if ($updateProfileSetting) {
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
