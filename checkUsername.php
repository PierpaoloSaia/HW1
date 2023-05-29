<?php 
require_once 'db.php';

if (!isset($_GET["q"])) {
    echo "Che ci fai qui?";
    exit;
}

header('Content-Type: application/json');

$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);

$username = mysqli_real_escape_string($conn, $_GET["q"]);

$query = "SELECT username FROM Utenti
            WHERE username = '$username'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

mysqli_close($conn);
?>
