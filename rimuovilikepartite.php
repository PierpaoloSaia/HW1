<?php
require_once 'verifica.php';

if (verifica()) {
    $username = verifica();
}

if (isset($_GET["id"])) {
    $partitaId = $_GET["id"];

    $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

    $sql = "DELETE FROM partite WHERE idPartita = $partitaId AND username = '$username'";

    if (mysqli_query($conn, $sql)) {
        echo "Like rimosso con successo.";
    } else {
        echo "Errore nell'esecuzione della query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


