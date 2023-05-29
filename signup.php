<?php
require_once 'verifica.php';

if(verifica()){
    header("Location: home.php");
    exit;
}

if (!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["e-mail"]) && !empty($_POST["username"]) && 
        !empty($_POST["password"]) && !empty($_POST["conferma_password"]))
        {
            $errore=array();
            $conn=mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);

            if (!filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) {
                $error[] = "Email non valida!";
            } else {
                $email = mysqli_real_escape_string($conn, strtolower($_POST['e-mail']));
                $res = mysqli_query($conn, "SELECT email FROM Utenti WHERE email = '$email'");
                if (mysqli_num_rows($res) > 0) {
                    $error[] = "Email già utilizzata";
                }
            }

            if(!preg_match('/^[\w\-]{7,16}$/', $_POST['username'])) {
                $error[] = "Username non valido";
            } else {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
                $query = "SELECT username FROM Utenti WHERE username = '$username'";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                    $error[] = "Username già utilizzato";
                }
            }

            if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/', $_POST["password"])){
                $error[]="La password deve contenere almeno una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale. Lunghezza minima: 10 caratteri.";
            }

            if (strcmp($_POST["password"], $_POST["conferma_password"]) != 0) {
                $error[] = "Le password non coincidono";
            }

            if(count($error)==0){
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO Utenti(nome, cognome, email, username, password) VALUES('$nome', '$cognome', '$email', '$username', '$password')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }




?>

<html>
    <head>
        <link rel="stylesheet" href="signup.css">
        <script src='signup.js' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Iscriviti - Football.com</title>
    </head>
    <body>
        <h1>Iscriviti gratis qui!</h1>
        <main>
            <form id='signup' name='signup' method="post" enctype="multipart/form-data" autocomplete="off">
                <label for='nome'> 
                    Nome <input type='text' name='nome' id='nome' <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?>> 
                    <span class='nonOpaco' id='nome2'> Campo obbligatorio</span> 
                </label>
                <label for='cognome'> 
                    Cognome <input type='text' name='cognome' id='cognome' <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?>> 
                    <span class='nonOpaco' id='cognome2'> Campo obbligatorio</span>
                </label>
                <label for='e-mail'> 
                    E-mail<input type='text' name='e-mail' id='eMail' <?php if(isset($_POST["e-mail"])){echo "value=".$_POST["e-mail"];} ?>> 
                    <span class='nonOpaco' id='email2'> Campo obbligatorio</span>
                </label>
                <label for='username'>
                    Username<input type='text' name='username' id='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>> 
                    <span class='nonOpaco' id='username2'>Campo obbligatorio </span>
                </label>
                <label for='password'> 
                    Password (10 caratteri minimo)  <input type='password' name='password' id='password'<?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>> 
                    <span class='nonOpaco' id='password2'> Campo obbligatorio</span> 
                    </label>
                <label for='conferma_password'> 
                    Conferma password <input type='password' name='conferma_password' id='conferma_password' <?php if(isset($_POST["conferma_password"])){echo "value=".$_POST["conferma_password"];} ?>> 
                    <span class='nonOpaco' id='conferma_password2'> Campo obbligatorio</span>
                </label>
                <input type='submit' value="Registrati" id="submit">
            </form>
        </main>
        <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errore'>$err </div>";
                    }
                } ?>
    </body>
</html>