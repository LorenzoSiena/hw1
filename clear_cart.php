<?php
/* svuota il carrello
   subito dopo il pagamento
   (verrà poi reinderizzato)
*/
	session_start();
	unset($_SESSION['carrello']);
	$_SESSION['message'] = 'Carrello svuotato';
	header('location: index.php');
?>
