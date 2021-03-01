<?php

require_once 'connection.php';

if ($con) {
    $username = str_replace(' ', '', trim(htmlspecialchars($_POST['username'])));;

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    $dataQuery = mysqli_fetch_array($result);
    $userNama = $dataQuery['nama'];
    $userNOHP = $dataQuery['no_hp'];
    $userKDUSER = $dataQuery['kd_user'];
    $response = array();

    $row =  mysqli_num_rows($result);

    if ($row > 0) {
        if ($userRole == 3) {
            $response = [
                'login' => 'OK_1',
                'nama' => $userNama,
                'no_hp' => $userNOHP,
                'kd_user' => $userKDUSER
            ];
        } else {
            $response = [
                'login' => 'OK_2',
                'nama' => $userNama,
                'no_hp' => $userNOHP,
                'kd_user' => $userKDUSER
            ];
        }
    } else {
        $response = [
            'login' => 'CODE_1',
            'nama' => '',
            'kd_user' => ''
        ];
    }
} else {
    $response = [
        'login' => 'CODE_2',
        'nama' => '',
        'kd_user' => ''
    ];
}

echo json_encode(array(
    'status' => $response
));
mysqli_close($con);
