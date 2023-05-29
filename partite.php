<?php
require_once 'verifica.php';

if(!verifica()){
    header('Location: login.php');
    exit;
}
?>

<html>
<head>
    <title>Ricerca Partite di Calcio - Football.com</title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Delicious+Handrawn">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Righteous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Satisfy">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Great+Vibes"> 
    <link rel="stylesheet" href="partite.css?version=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="partite.js" defer></script>
</head>

<body>
<header id="header1">
    <div id="overlay"> </div>
    <nav id="navbar">
       <div id="nomesito">Football.com</div>
       <div id="links">
       <div class='link'><a href='home.php' class='bottone'> Home</a> </div>  
       </div>
    <div id="menu"> 
        <div></div>
        <div></div>
        <div></div>
    </div>
    </nav>
    <form method="POST" id='form1'>
        <label for="squadra1">
            <input type="text" id="squadra1" name="squadra1" placeholder='Team 1'> 
        </label>
        <label for="squadra2">
            <input type="text" id="squadra2" name="squadra2" placeholder='Team 2'> 
        </label>
        <button type="submit" id='cerca'>
            <i class="fas fa-search"></i>
        </button>
    </form>
</header>

<section id='sezione' class='hidden'>
</section>
</body>
</html>