<?php
require_once 'verifica.php';

if (verifica()){
    $username = verifica();
}

if (isset($_GET['id'])) {
    $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

    $idPartita = $_GET['id'];

    $query = "SELECT * FROM partite WHERE idPartita = '$idPartita' AND username = '$username'";
    
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));
}
?>
