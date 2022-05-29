<?php
require_once 'auth.php';

if (checkAuth()) {
    header("Location: index.php");
    exit;
}

// Verifica l'esistenza di dati POST
if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["address"]) && !empty($_POST["confirm_password"]) && !empty($_POST["allow"])) {
    echo "creo errori";
    $error = array(); 

    print_r($dbconfig);
   $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
   
  
    
    echo "connesso!";
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    $pattern2 = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    # username
    // Controlla che l'username rispetti il pattern specificato
    if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
        $error[] = "Username non valido";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
    }


    $pattern = '/^(?=.*[!@#$%^&*_-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/'; #complesso
    $pattern2 = '/^[a-zA-Z0-9_]{1,15}$/'; #semplice
    # password
    // Controlla che l'username rispetti il pattern specificato
    if (!preg_match($pattern, $_POST['password'])) {
        $error[] = "password insufficiente (almeno 8 caratteri, almeno un numero, almeno un carattere speciale,almeno una lettera maiuscola)";
    }
    # CONFERMA PASSWORD
    if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
        $error[] = "Le password non coincidono";
    }
    # EMAIL
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }


    // Se non ci sono errori, registra l'utente
    if (count($error) == 0) { // Se non ci sono errori
        echo "Registrazione avvenuta con successo";
        $username = mysqli_real_escape_string($conn, $_POST['username']); // Prendo il valore del campo username
        $name = mysqli_real_escape_string($conn, $_POST['name']); // Prendo il nome dal form (safe)
        $surname = mysqli_real_escape_string($conn, $_POST['surname']); // Prendo il cognome dal form (safe)
        $address = mysqli_real_escape_string($conn, $_POST['address']); // Prendo l'indirizzo dal form (safe)
        $email = mysqli_real_escape_string($conn, $_POST['email']); // Prendo l'email dal form (safe)
        
        $password = mysqli_real_escape_string($conn, $_POST['password']); // Prendo la password dal form (safe)
        $password = password_hash($password, PASSWORD_BCRYPT); // Hash della password

        $query = "INSERT INTO users(username, nome, cognome, email, indirizzo, password) VALUES('$username','$name', '$surname', '$email','$address','$password')";

        if (mysqli_query($conn, $query)) { // Se la query è andata a buon fine 
            $_SESSION["username"] = $_POST["username"]; #username è in sessione
            $_SESSION["user_id"] = mysqli_insert_id($conn);  #id è in sessione
            mysqli_close($conn); // Chiudo la connessione
            header("Location: index.php"); // Redirect alla home
            exit;
        } else {
            $error[] = "Errore di connessione al Database";
        }
    }

    mysqli_close($conn); // Chiudo la connessione
} else if (isset($_POST["username"])) {
   
    $error = array("Riempi tutti i campi");
  
}

print_r($error);

?>





<html>

<head>
    <script src='./scripts/signup.js' defer></script>    
    <link rel='stylesheet' href='./style/login.css'>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png">
    <meta charset="utf-8">

    <title>Signup</title>
</head>

<body>
    <main class="magic">
        <div>
            <strong id="title"><a href="index.php"">Retro Museum</a></strong>
       
        <section class=" form">

                    <h1>Iscrizione</h1>
                    <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off" action="signup.php">
                        <div class="username">
                            <div class="username">
                                <div><label for='username'>Username</label></div>
                                <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                                <div><input type='text' name='username' <?php if (isset($_POST["username"])) {
                                                                            echo "value=" . $_POST["username"];
                                                                        } ?>></div>
                            <span class="error" ></span>    
                        </div>

                        </div>
                        <div class="name">
                            <div><label for='name'>Nome</label></div>
                            <div><input type='text' name='name' <?php if (isset($_POST["name"])) {
                                                                    echo "value=" . $_POST["name"];
                                                                } ?>></div>
                            <span class="error" ></span>
                        </div>
                        <div class="surname">
                            <div><label for='surname'>Cognome</label></div>
                            <div><input type='text' name='surname' <?php if (isset($_POST["surname"])) {
                                                                        echo "value=" . $_POST["surname"];
                                                                    } ?>></div>
                            <span class="error" ></span>
                        </div>


                        <div class="email">
                            <div><label for='email'>Email</label></div>
                            <div><input type='text' name='email' <?php if (isset($_POST["email"])) {
                                                                        echo "value=" . $_POST["email"];
                                                                    } ?>></div>
                            <span class="error" ></span>
                        </div>
                        <div class="address">
                            <div><label for='address'>Indirizzo</label></div>
                            <div><input type='text' name='address' <?php if (isset($_POST["address"])) {
                                                                        echo "value=" . $_POST["address"];
                                                                    } ?>></div>
                            <span class="error" ></span>
                        </div>
                        <div class="password">
                            <div><label for='password'>Password</label></div>
                            <div><input type='password' name='password' <?php if (isset($_POST["password"])) {
                                                                            echo "value=" . $_POST["password"];
                                                                        } ?>></div>
                            <span class="error" ></span>
                        </div>

                        <div class="confirm_password">
                            <div><label for='confirm_password'>Conferma Password</label></div>
                            <div><input type='password' name='confirm_password' <?php if (isset($_POST["confirm_password"])) {
                                                                                    echo "value=" . $_POST["confirm_password"];
                                                                                } ?>></div>
                            <span class="error" ></span>
                        </div>

                        <div class="allow">
                            <div><label for='allow'>Acconsento al trattamento dei dati</label></div>
                            <div><input type='checkbox' name='allow' value="1" <?php if (isset($_POST["allow"])) {
                                                                                    echo $_POST["allow"] ? "checked" : "";
                                                                                } ?>></div>
                        </div>

                        <div class="submit">
                            <input type='submit' value="Registrati" id="log">
                        </div>
                    </form>
                    <div class="message">Hai già un account? <a href="login.php">Accedi</a>
       
                        </section>
                    </div>
    </main>
</body>

</html>