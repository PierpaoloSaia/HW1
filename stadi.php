<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
} else {
    header('Location: login.php');
    exit;
}

$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

$sql = "SELECT stadio, foto FROM stadi WHERE username = '$username'";

$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$stadiArray = array();

while ($row = mysqli_fetch_assoc($res)) {
    $stadio = $row['stadio'];
    $foto = $row['foto'];
    $stadiArray[] = array('stadio' => $stadio, 'foto' => $foto);
}

mysqli_close($conn);

$jsonResponse = json_encode($stadiArray);

header('Content-Type: application/json');

echo $jsonResponse;
?>

