<?php 
header('Content-Type: application/json');

require_once 'dbconfig.php'; #GESTIONE ERRORI
session_start();
if (!isset($_GET["q"]) || !isset($_SESSION["username"])) { //se non è settato il parametro q
    echo "Non dovresti essere qui"; //ritorna errore
    exit;
}



//ritorna un json

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']); //connessione al db

$value = mysqli_real_escape_string($conn, $_GET["q"]); //prendo il valore del parametro q (SAFE)



//SELEZIONA il prodotto a cui appartiene l'id inserito

$query = "SELECT * FROM `GAME` WHERE `id` = '$value'";
        

            
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));


if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);
    //se il prodotto esiste aumento la quantità
    if(isset($_SESSION["carrello"][$row["id"]]))
        $_SESSION["carrello"][$row["id"]]["quantity"]++;
        //BUG:se il prodotto è cercato si duplica :/
    else{
        $cart = $_SESSION["carrello"];
        $cart[] = $row;
        $_SESSION["carrello"] = $cart;
    }
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}



mysqli_close($conn); //chiudo la connessione

?>