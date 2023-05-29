<?php 
    require_once 'verifica.php';
    if (!(verifica())) {
        header("Location: login.php");
        exit;
    }

?>


<html>
  <head>
    <title>Football.com</title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Delicious+Handrawn">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Righteous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Satisfy">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Great+Vibes"> 
    <link rel="stylesheet" href="home.css?version=23">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="home.js" defer="true"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  </head>


<body>
<header id="header1">
    <div id="overlay"> </div>
    <nav id="navbar">
       <div id="nomesito">Football.com</div>
       <div id="links">
        <div class=link> <a href='partite.php' class='bottone'> Matches </a> </div>    
        <div class=link><a href='profilo.php' class='bottone'> Profile </a> </div>
        <div class='link'><a href='logout.php' class='bottone'> Logout </a> </div>    
       </div>
    </nav>
    <form id="form1">  
        <input type='text' name='stadio' placeholder='Team' id='barra'>
        <select name='seleziona' id="seleziona">
            <option value='Serie A'> Serie A</option>
            <option value='Premier League'> Premier League</option> 
            <option value='Bundesliga'> Bundesliga</option>
            <option value='Ligue 1'> Ligue 1</option>
            <option value='Liga BBVA'> Liga BBVA</option>
        </select>
        <button type='submit' id='submit'>
            <i class="fas fa-search"></i>
        </button>
    </form>  
    
    <form id="form2">
        <input type='text' name='nome' placeholder='Name' id='barra2'>
        <input type='text' name='cognome' placeholder='Surname' id='barra3'>
        <button type='submit' id='submit2'>
            <i class="fas fa-search"></i>
        </button>
    </form>
</header>

<section id='section1'>
</section>

</body>
</html>