<?php   
        /* pagina di test per vedere carrello e sessioni utente*/
        session_start();
        echo "username = " . $_SESSION["username"] . "<br>";
        echo "user_id = " . $_SESSION["user_id"] . "<br>";
        print_r($_SESSION);       
?>
