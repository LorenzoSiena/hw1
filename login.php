<?php
// Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
include 'auth.php';
if (checkAuth()) {
  header('Location: index.php');
  exit;
}



// Se username e password sono stati inviati
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
  // Connessione al DB hostato in locale (Retrodatabase)
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

  // Salvo i campi in modo safe (NOHACK!)
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);




  $searchField = filter_var($username, FILTER_VALIDATE_EMAIL) ? "email" : "username"; // Se l'username che ha scritto è una email, cerca per email, altrimenti cerca per username

  // ID e Username per sessione, password per controllo
  $query = "SELECT id, username, password
                  FROM users 
                  WHERE $searchField = '$username'"; // Cerca l'utente con username o email
                                          
  // Ritorna il risultato della query dal database
  $res = mysqli_query($conn, $query) or die(mysqli_error($conn));


  if (mysqli_num_rows($res) > 0) {  // SE esiste una riga dove c'è l'utente che sta loggando
    //Raccogli il risultato come array associativo
    $entry = mysqli_fetch_assoc($res);

    if (password_verify($_POST['password'], $entry['password'])) {


     

      // Imposto una sessione dell'utente
      
      $_SESSION["username"] = $entry['username'];
      $_SESSION["user_id"] = $entry['id'];
     
      //setto un carrello vuoto
      $_SESSION["carrello"] = array();

     
      //VAI ALLA HOME
      header("Location: index.php");
      mysqli_free_result($res);
      mysqli_close($conn);
      exit;
    }
  }
  // Se l'utente non è stato trovato o la password non ha passato la verifica
  $error = "Username e/o password errati.";
} else if (isset($_POST["username"]) || isset($_POST["password"])) {
  // Se solo uno dei due è impostato
  $error = "Inserisci username e password.";
}

?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/login.css">

  <script src="scripts/login.js" defer="true"></script>
  
  <title>Login</title>
</head>

<body>
  
  <div class="login-page">
    <div >   
        <strong id="title"><a href="index.php"">Retro Museum</a></strong>
    </div>
    <div class="form">

      <?php
      // Verifica la presenza di errori
      if (isset($error)) {
        echo "<span class='error'>$error</span>";
      }

      ?>
 
      <form name='login' method='post' action="login.php">
        <div class="username">
          <div><label for='username'>Email</label></div>
          <div><input type='text' name='username' placeholder ='Utente' <?php if (isset($_POST["username"])) {
                                                    echo "value=" . $_POST["username"];
                                                  } ?>></div>
        </div>
        <div class="password">
          <div><label for='password'>Password</label></div>
          <div><input type='password' name='password' placeholder='password' <?php if (isset($_POST["password"])) {
                                                        echo "value=" . $_POST["password"];
                                                      } ?>></div>
        </div>
        <div class="remember">
          <div><input type='checkbox' name='remember' value="1" <?php if (isset($_POST["remember"])) {
                                                                  echo $_POST["remember"] ? "checked" : "";
                                                                } ?>></div>
          <div><label for='remember'>Ricorda l'accesso</label></div>
        </div>
        <div>
          <input id='log' type='submit' value="Accedi">
        </div>
        <p class="message">Non sei ancora registrato? </br><a href="signup.php">Crea un account</a></p>
      </form>



    </div>
  </div>





</body>

</html>