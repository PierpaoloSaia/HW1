<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
}

if (isset($_GET["id"]) && isset($_GET["squadra1"]) && isset($_GET["squadra2"]) && isset($_GET["casa"]) && isset($_GET["ospite"]) && isset($_GET["competizione"]) && isset($_GET["orario"]) && isset($_GET["stadio"]) && isset($_GET["dataPartita"])) {
    $partitaId = $_GET["id"];
    $squadra1 = $_GET["squadra1"];
    $squadra2 = $_GET["squadra2"];
    $casa = $_GET["casa"];
    $ospite = $_GET["ospite"];
    $competizione = $_GET["competizione"];
    $stadio = $_GET["stadio"];
    $orario = $_GET["orario"];
    $dataPartita = $_GET["dataPartita"];

    $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

    $sql = "INSERT INTO partite (username, idPartita, squadra1, squadra2, casa, ospite, competizione, stadio, orario, dataPartita) VALUES ('$username', '$partitaId', '$squadra1', '$squadra2', '$casa', '$ospite', '$competizione', '$stadio', '$orario', '$dataPartita')";

    if (mysqli_query($conn, $sql)) {
        echo "Like aggiunto con successo al database.";
    } else {
        echo "Errore nell'esecuzione della query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

