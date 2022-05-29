<?php
    require_once 'dbconfig.php';
   /*******************************************************
        fetch("check_email.php?q=" + encodeURIComponent(String(emailInput.value).toLowerCase()))
        .then(fetchResponse)
        .then(jsonCheckEmail);
   
    ********************************************************/
    
    // Controllo che l'accesso sia legittimo
    if (!isset($_GET["q"])) { //se non è settato il parametro q
        echo "Non dovresti essere qui"; //ritorna errore
        exit;
    }

    // Imposto l'header della risposta
    header('Content-Type: application/json'); //RITORNO DESIDERATO -> JSON
    
    // Connessione al DB
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    // Leggo la stringa dell'email
    $email = mysqli_real_escape_string($conn, $_GET["q"]); //prendo il valore del parametro q (SAFE)

    // Costruisco la query
    $query = "SELECT email 
              FROM users 
              WHERE email = '$email'";

    // Eseguo la query
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Torna un JSON con chiave exists e valore boolean
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false)); //ritorna true se esiste, false se non esiste

    // Chiudo la connessione
    mysqli_close($conn);
?>