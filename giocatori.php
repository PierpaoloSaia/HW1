<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
} else {
    header('Location: login.php');
    exit;
}

$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

$sql = "SELECT giocatore, foto FROM giocatori WHERE username = '$username'";

$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$giocatoriArray = array();

while ($row = mysqli_fetch_assoc($res)) {
    $giocatoriArray[] = array(
        'giocatore' => $row['giocatore'],
        'foto' => $row['foto']);
}

mysqli_close($conn);

$jsonResponse = json_encode($giocatoriArray);

header('Content-Type: application/json');

echo $jsonResponse;
?>
