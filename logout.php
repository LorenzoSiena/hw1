<?php
    include 'dbconfig.php';

    // Distruggo la sessione esistente
    session_start();
    session_destroy();
    //Torna alla home
    header('Location: index.php');
?>