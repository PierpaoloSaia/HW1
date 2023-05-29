<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
}

if (isset($_GET["giocatore"])) {
    $giocatore = $_GET["giocatore"];

    $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

    $sql = "DELETE FROM giocatori WHERE giocatore= '$giocatore' AND username = '$username'";

    if (mysqli_query($conn, $sql)) {
        echo "Riga rimossa con successo dal database.";
    } else {
        echo "Errore nell'esecuzione della query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>