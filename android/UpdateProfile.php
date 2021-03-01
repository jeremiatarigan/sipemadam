<?php

require_once 'connection.php';

if ($con) {
    $username   = str_replace(' ', '', trim(htmlspecialchars($_POST['username'])));
    $nama       = htmlspecialchars($_POST['nama']);
    $password   = htmlspecialchars($_POST['password']);
    $no_hp      = htmlspecialchars($_POST['no_hp']);
    $kd_user      = htmlspecialchars($_POST['kd_user']);

    $username_  = $username;
    $nama_      = $nama;
    $password_  = password_hash($password,PASSWORD_DEFAULT);
    $no_hp_     = $no_hp;

    if ($password != '') {
        $query = "UPDATE user
	SET
		nama='$nama_',
		username='$username_',
		password='$password_',
		no_hp=$no_hp_
    WHERE kd_user = $kd_user ";
    } else {
        $query = "UPDATE user
	SET
    nama='$nama_',
		username='$username_',
		no_hp=$no_hp_
    WHERE kd_user = $kd_user";
    }

    $result = mysqli_query($con, $query);
    $response = array();

    $row =  mysqli_affected_rows($result);

    if ($result) {
        $response = [
            'responses' => 'OK_1'
        ];
    } else {
        $response = [
            'responses' => 'CODE_1'
        ];
    }
} else {
    $response = [
        'responses' => 'CODE_2'
    ];
}

echo json_encode(array(
    'status' => $response
));
mysqli_close($con);
