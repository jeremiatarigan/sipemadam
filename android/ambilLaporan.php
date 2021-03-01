<?php

require_once 'connection.php';

$user = $_POST['user'];

$query = "SELECT * FROM report WHERE user = '$user'  ORDER BY tgl_laporan DESC";
$result = mysqli_query($con, $query);
$hasil = array();

if ($result) {
    $response = 'success';

    while ($data = mysqli_fetch_array($result)) {
        array_push($hasil, array(
            'alamat' => $data['alamat'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'tanggal' => $data['tgl_laporan'],
            'keterangan' => $data['ket'],
            'gambar' => $data['gambar'],
        ));
    }
} else {
    $result = 'failed';
}

echo json_encode(array(
    'status' => $response,
    'data' => $hasil
));
