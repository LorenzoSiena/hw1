<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>About Us</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/hw1.css">
    
    
    <script src="scripts/spotify.js" defer="true"></script>
     
</head>

<body>
    <header>
        <nav>
        <div id="links">
        <div class="user-icon">
          <div class="circle"></div>
          <?php
          session_start();
          // stampa benvenuto utente
          if (isset($_SESSION['username'])) {
            echo "<p>Benvenuto</br>" . $_SESSION['username'] . "</p>";
            echo "<a class=small href='logout.php'>logout</a>";
          } else {
            echo "<p>Benvenuto</br>Ospite</p>";
            echo "<a class=small style='background-color:yellow;' href='login.php'>login</a>";
          }
          ?>
        </div>
        <a href="index.php">Console</a>
        <a href="shoppingCart.php">Carrello</a>
        <a href="about.php">About Us</a>
      </div>
            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>

        <h1>
      <strong class="title">Retro Museum</strong><br />
      <p class="sub_title">Refurbished Retro Console</p><br />
    </h1>
 <div class="ryu"></div>

    </header>

    <div id="middletop">
        <h1 class="title">Chi Siamo</h1>
        <div id="presentation">
            <p>
            <h1>Welcome Player 1!</h1>
            Retro Museum è un’officina elettronica di console anni 80 fondata nel 2019 e con base a Catania. <br /> Siamo
            una compagnia di appassionati che si occupa di rimettere a nuovo e rivendere console di video giochi e accessori
            dei marchi più ricercati come Nintendo, Sony e Microsoft.</br>
            Retro Museum è specializzata in giochi di vecchia generazione per raggiungere la nostra clientela con una serie
            di prodotti che rispettano gli standard del mercato.
            La nostra compagnia colleziona resi dei clienti di negozi videoludici e lavora per valutare, testare, riparare,
            ricondizionare e rivendere console restaurate che trovano una nuova casa presso i nostri clienti.<br />
            </p>
            
        </div>
        <img src="images/Nerd.jpg" alt="Nerd" id="teamphoto">
    </div>

    <section>
    <div id="buttonez">
    
    </div>
<!--
        <div id="podcastdiv" class ="title"><span >Ascolta il nostro ultimo podcast!</span>
            <div><img src="https://i.scdn.co/image/ab6765630000ba8a06eec12791223e30f3d48337">
                <p>Adesso su spotify!</p>
                <a href="https://open.spotify.com/episode/0SQTcBtIOpQIdeMSSQVaW2">Play</a>
            </div>
        </div>

        -->
        
    </section>

    <footer>
        <p>Powered by Lorenzo Siena 1000015814</p>
    </footer>
</body>

</html>

