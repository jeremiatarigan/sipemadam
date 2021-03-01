<?php

require_once 'connection.php';

if ($con) {
    $username = str_replace(' ', '', trim(htmlspecialchars($_POST['username'])));
    $password = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    $dataQuery = mysqli_fetch_array($result);
    $userRole = $dataQuery['role_id'];
    $userID = $dataQuery['kd_user'];
    $response = array();

    $row =  mysqli_num_rows($result);

    if (password_verify($password,$dataQuery['password'])) {
        $response = [
            'login' => 'OK_1',
            'role' => $userRole,
            'kd_user' => $userID
        ];
    } else {
        $response = [
            'login' => 'CODE_1',
            'role' => '',
            'kd_user' => ''
        ];
    }
} else {
    $response = [
        'login' => 'CODE_2',
        'role' => '',
        'kd_user' => ''
    ];
}

echo json_encode(array(
    'status' => $response
));
mysqli_close($con);
