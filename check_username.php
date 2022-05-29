<?php 

/*soddisfa  
fetch("check_username.php?q=" + encodeURIComponent(input.value))
.then(fetchResponse)
.then(jsonCheckUsername);
*/


require_once 'dbconfig.php'; #GESTIONE ERRORI

if (!isset($_GET["q"])) { //se non è settato il parametro q
    echo "Non dovresti essere qui"; //ritorna errore
    exit;
}

header('Content-Type: application/json'); #RITORNO DESIDERATO -> JSON

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']); //connessione al db


$username = mysqli_real_escape_string($conn, $_GET["q"]); //prendo il valore del parametro q (SAFE)

$query = "SELECT username FROM users
            WHERE username = '$username'"; 

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

#RITORNO DELLA PROMESSA , dice se l'utente esiste (ho più di zero righe)
echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false)); //ritorna true se esiste, false se non esiste

mysqli_close($conn); //chiudo la connessione
?>
