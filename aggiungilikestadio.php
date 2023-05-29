<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
}

if (isset($_GET["stadio"]) && isset($_GET["foto"])) {
    $stadio = $_GET["stadio"];
    $foto = $_GET["foto"];

    // Connessione al database
    $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

    // Esegui la query di inserimento
    $sql = "INSERT INTO stadi (foto, stadio, username) VALUES ('$foto', '$stadio', '$username')";

    if (mysqli_query($conn, $sql)) {
        echo "Dati inseriti con successo nel database.";
    } else {
        echo "Errore nell'esecuzione della query: " . mysqli_error($conn);
    }

    // Chiudi la connessione al database
    mysqli_close($conn);
}
?>

