<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
}

if (isset($_GET["giocatore"]) && isset($_GET["foto"])) {
    $giocatore = $_GET["giocatore"];
    $foto=$_GET['foto'];

    $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

    $sql = "INSERT INTO giocatori (foto, giocatore, username) VALUES ('$foto', '$giocatore', '$username')";

    if (mysqli_query($conn, $sql)) {
        echo "Dati inseriti con successo nel database.";
    } else {
        echo "Errore nell'esecuzione della query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

