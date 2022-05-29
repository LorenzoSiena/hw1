<?php 
header('Content-Type: application/json');

require_once 'dbconfig.php'; #GESTIONE ERRORI

if (!isset($_GET["q"])) { //se non è settato il parametro q
    echo "Non dovresti essere qui"; //ritorna errore
    exit;
}



//ritorna un json

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']); //connessione al db

$value = mysqli_real_escape_string($conn, $_GET["q"]); //prendo il valore del parametro q (SAFE)



//SELEZIONA TUTTI I PRODOTTI CHE CONTENGONO LA STRINGA INSERITA nel nome o nella descrizione

$query ="SELECT *  FROM `GAME` WHERE `nome` LIKE '%$value%' OR `descrizione` LIKE '%$value%' AND `tipo` = 1";
            
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode(array('exists' => false));
}


mysqli_close($conn); //chiudo la connessione

?>