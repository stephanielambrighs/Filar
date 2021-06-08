<?php

include_once(__DIR__ . "/../classes/User.php");

if(!empty($_POST)){
    $userId = $_POST['userId'];
    $user = new User();

    $getDetails = $user->getProfileDetails($userId);

    if ($getDetails) {
        $response = [
            'status' => 'success',
            'data' => $getDetails,
            'messsage' => 'Successfully get details'
        ];
    }
    else {
        $response = [
            'status' => 'failed',
            'messsage' => 'Failed to get details'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
