<?php
require_once 'verifica.php';

if (!verifica()) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['squadra1']) && isset($_POST['squadra2'])) {
    $squadra1 = $_POST['squadra1'];
    $squadra2 = $_POST['squadra2'];

    $squadra1 = str_replace(' ', '_', $squadra1);
    $squadra2 = str_replace(' ', '_', $squadra2);

    $partita = $squadra1 . '_vs_' . $squadra2;
    
    $url = "https://www.thesportsdb.com/api/v1/json/3/searchevents.php?e=" . urlencode($partita);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
}
?>
