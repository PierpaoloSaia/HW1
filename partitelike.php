<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
} else {
    header('Location: login.php');
    exit;
}

$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

$sql = "SELECT idPartita, username, squadra1, squadra2, casa, ospite, competizione, stadio, orario, dataPartita FROM partite WHERE username = '$username'";

$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$partiteArray = array();

while ($row = mysqli_fetch_assoc($res)) {
    $gameInfo = array(
        'idPartita' => $row['idPartita'],
        'username' => $row['username'],
        'squadra1' => $row['squadra1'],
        'squadra2' => $row['squadra2'],
        'casa' => $row['casa'],
        'ospite' => $row['ospite'],
        'competizione' => $row['competizione'],
        'stadio' => $row['stadio'],
        'orario' => $row['orario'],
        'dataPartita' => $row['dataPartita'],
    );

    $partiteArray[] = $gameInfo;
}

mysqli_close($conn);

$jsonResponse = json_encode($partiteArray);

header('Content-Type: application/json');

echo $jsonResponse;
?>

