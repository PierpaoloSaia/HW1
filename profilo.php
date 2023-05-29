<?php
require_once 'verifica.php';

if(!verifica()){
    header("Location: login.php");
    exit;
}
else{
    $username=verifica();
}
?>

<html>
<head>
    <title>Profilo utente - Football.com</title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Delicious+Handrawn">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Righteous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Satisfy">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Great+Vibes"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="profilo.css?version=123">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="profilo.js" defer></script>
</head>

<body>
<header id="header1">
    <div id="overlay"> </div>
    <nav id="navbar">
       <div id="nomesito">Football.com</div>
       <div id="links">
       <div class='link'><a href='home.php' class='bottone'> Home</a> </div>  
       </div>
    </nav>
    <div id="welcome-message">
        <?php echo $username . ", ecco i tuoi mi piace:"; ?>
    </div>
</header>

<div id="partite">
    <h2> Partite </h2>
</div>

<div class='separatore'> </div>

<div id="stadi">
    <h2> Stadi </h2>
</div>

<div class='separatore'> </div>

<div id="giocatori">
    <h2> Giocatori </h2>
</div>


</body>
</html>