<?php
    require_once 'verifica.php';
    if (verifica()){
        header('Location: home.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $query = "SELECT username, password FROM utenti WHERE username = '$username'";
        
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0){
            $entry=mysqli_fetch_assoc($res);
            
            if (password_verify($_POST['password'], $entry['password'])) {
                header("Location: home.php");
                $_SESSION["username"] = $entry['username'];
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='login.css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accedi - Football.com</title>
    </head>
    <body>
    <h1>Esegui l'accesso</h1>
    <?php
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                
            ?>
        <main>
            <form name='login' method='post' id='signup'>
                    <label for='username'>
                        Username <input type='text' name="username" id='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    </label>
                    <label for='password'>
                        Password <input type='password' name="password" id='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    </label>
                        <input type='submit' value="Accedi">
            </form>
            <h2>Non hai un account?</h2>
            <a class="signup-btn" href="signup.php">Iscrivi a Football.com</a>
        </main>
    </body>
</html>