<?php
require_once 'verifica.php';
require_once 'db.php';

if (verifica()){
    $username=verifica();
}

if(isset($_GET['giocatore'])){

    $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

    $giocatore = $_GET['giocatore'];

    $query = "SELECT * FROM giocatori WHERE giocatore = '$giocatore' AND username = '$username'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));
}
?>


