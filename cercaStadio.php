<?php 
include 'verifica.php';

if (!verifica()) exit;



$API_KEY = "55068989789c93a8435d6e1c2fc66e9d";
$opzione = $_POST['seleziona'];

if ($opzione === 'Serie A') {
    $url = "https://v3.football.api-sports.io/teams?league=135&season=2022";
} elseif ($opzione === 'Premier League') {
    $url = "https://v3.football.api-sports.io/teams?league=39&season=2022";
} elseif ($opzione === 'Bundesliga') {
    $url = "https://v3.football.api-sports.io/teams?league=78&season=2022";
} elseif ($opzione === 'Ligue 1') {
    $url = "https://v3.football.api-sports.io/teams?league=61&season=2022";
} elseif ($opzione === 'Liga BBVA') {
    $url = "https://v3.football.api-sports.io/teams?league=140&season=2022";
}

$headers = array(
    "x-rapidapi-host: v3.football.api-sports.io",
    "x-rapidapi-key: " . $API_KEY
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>

