<?php

require_once 'connection.php';

if ($con) {
    $username       = str_replace(' ', '', trim(htmlspecialchars($_POST['username'])));
    $nama          = htmlspecialchars($_POST['nama']);
    $no_hp          = htmlspecialchars($_POST['no_hp']);
    $password       = password_hash(htmlspecialchars($_POST['password']),PASSWORD_DEFAULT);

    $query          = "INSERT INTO user (nama,username,password,no_hp) VALUES ('$nama','$username','$password',$no_hp)";


    if ($username != '' && $password != '') {
        $result     = mysqli_query($con, $query);
        if ($result) {
            $response = 'OK';
        } else {

            $response = 'FAILED ' . mysqli_error($con);
        }
    } else {

        $response = 'FAILED';
    }
} else {

    $response = 'FAILEDddd';
}

echo json_encode(array(
    'status' => $response
));
