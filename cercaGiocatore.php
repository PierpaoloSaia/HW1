<?php

if (isset($_POST['nome']) && isset($_POST['cognome'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    $url = "https://www.thesportsdb.com/api/v1/json/3/searchplayers.php?p=" . urlencode($nome . " " . $cognome);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response; 
}

?>