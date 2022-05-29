<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Retro Museum</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/hw1.css">
  <script src="scripts/buythis.js" defer="true"></script>
  
  <script src="scripts/hw1.js" defer="true"></script>
  

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

    <div></div>
  </header>















  <section>
   
    <div class="input-group">
      <span>Cerca nel nostro store  </span>
      <input id="search" required="" type="text" name="text" autocomplete="off" class="input">
      <label class="user-label">Direttamente dal nostro Database! </label>
      
    </div>



    <div id="middlebottom">
    <span><h2>Le nostre console e i loro giochi  più famosi! </br><small><small>(ogni 15 secondi cambiano!)</small></small></h2></span>


      <div class="sub" data-console-id="NES">

        <div class="announce">
          <div class="info">
            <h1>NES</h1>
            <p>Il Nintendo Entertainment System (NES), noto in Giappone con il nome di Famicom (ファミコン Famikon pronuncia[?·info]?), è stata una console per videogiochi a 8-bit prodotta da Nintendo tra il 1983 e il 1995.

              È da molti considerato il sistema che ha risollevato l'industria dei videogiochi dopo la crisi del 1983,[7] soprattutto grazie al successo di titoli come Super Mario Bros, The Legend of Zelda e Metroid, di livello qualitativo superiore a quello dell'epoca;[8] la console ha inoltre introdotto un modello lavorativo oggi adottato da tutti, ovvero quello di concedere a terze parti le licenze per lo sviluppo dei software.[9]

              Considerata una delle più importanti console videoludiche della storia,[10] nel 1995, anno in cui fu tolta definitivamente dal commercio, raggiunse quasi le 62 milioni di unità vendute,[3] diventando la macchina da gioco più venduta della sua epoca.[11] Nel 2009 il sito IGN l'ha definita la migliore console videoludica di tutti i tempi.[12]</p>
          </div>

          <div class="buy">
            
            <?php
            if (isset($_SESSION['username'])) {
              echo "<button class='btn' data-name-console='NES' data-buy='1'>Acquista!</button> " ;  
            }             
            ?>
          
            <img src="images/NES-Console-Set.jpg"/>
          </div>

        </div>

        <div class="api" data-type-id="a">
          Con il termine lorem ipsum si indica un testo segnaposto utilizzato da grafici, designer, programmatori e tipografi a modo riempitivo per bozzetti e prove grafiche.[1] È un testo privo di senso, composto da parole (o parti di parole) in lingua latina, riprese pseudocasualmente da uno scritto di Cicerone del 45 a.C, a volte alterate con l'inserzione di passaggi ironici. La caratteristica principale è data dal fatto che offre una distribuzione delle lettere uniforme, apparendo come un normale blocco di testo leggibile.

          Il testo fu utilizzato per la prima volta nel 1500 da un anonimo tipografo per mostrare i propri caratteri; da allora è diventato lo standard dell'industria tipografica. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni '60, con la diffusione dei fogli di caratteri trasferibili, detti anche trasferelli, e successivamente dai programmi di grafica. La sua funzione lo avvicina al testo ETAOIN SHRDLU un tempo usato per provare le Linotype.[2]

          In informatica è usato molto frequentemente come testo riempitivo nelle prove grafiche di pagine web e come dati fittizi nella prova di funzionamento dei database. L'uso di questo espediente, per riempire spazi altrimenti vuoti (spesso in attesa dei dati definitivi), è molto efficace grazie soprattutto all'alternanza di parole lunghe e brevi, punteggiatura e paragrafi. In questo modo viene simulato con sufficiente verosimiglianza l'impatto grafico di un testo reale, in modo particolare per quanto riguarda l'impatto estetico.

          Questa consuetudine come testo segnaposto standard ha fatto sì che la maggior parte dei software di grafica e tipografia adottassero funzioni e strumenti di "riempimento automatico", con un'immediata anteprima dello spazio occupato e della resa finale.[3][4][5]
        </div>

      </div>






      <div class="sub" data-console-id="ATARI2600">

        <div class="announce">
          <div class="info">
            <h1>Atari 2600</h1>
            <p>L'Atari 2600 (pubblicizzata nei primi anni di commercializzazione come Atari VCS, sigla di Video Computer System) è una console per videogiochi prodotta da Atari e venduta a partire dall'11 settembre 1977[3] fino al 1992.[3][4]

              È stata tra le prime console a utilizzare le cartucce come metodo di distribuzione dei giochi ed è anche ricordata come la prima console di successo: ne sono stati infatti venduti circa 30 milioni di esemplari, una delle console più longeve di tutti i tempi.[3] Furono realizzati per la console più di 550 giochi[4] e vennero vendute più di 120 milioni di cartucce, con prezzi che oscillavano fra i 12 e i 35 dollari.[5] </p>
          </div>

          <div class="buy">
          <?php
            if (isset($_SESSION['username'])) {
              echo "<button class='btn' data-name-console='ATARI2600' data-buy='2'>Acquista!</button> " ;  
            }             
            ?>
            <img src="images/Atari-2600-Wood-4Sw-Set.jpg" />
          </div>

        </div>

        <div class="api" data-type-id="b">
          QUA_VIENE_GENERATO_IL_CODICE
        </div>

      </div>

      <div class="sub" data-console-id="SEGAMEGADRIVE">

        <div class="announce">
          <div class="info">
            <h1>Sega Mega Drive</h1>
            <p>Il Sega Mega Drive (メガドライブ Sega Mega Doraibu?), commercializzato come Sega Genesis negli Stati Uniti d'America e come Super GameBoy e Super Aladdin Boy in Corea del Sud[4], è stata una console per videogiochi a 16 bit prodotta da SEGA tra il 1988 e il 1998.

              Venne distribuita in Giappone il 29 ottobre 1988 e negli USA a partire dal 14 agosto 1989, mentre in Europa e in Brasile fu distribuita negli ultimi mesi del 1990. È stato il secondo sistema dotato di lettore CD-ROM, grazie alla distribuzione da parte della casa nipponica di un dispositivo esterno (il Sega Mega CD) che aggiungeva non solo una maggior capacità di memorizzazione ma anche potenza di calcolo al sistema, permettendo di avere velocità maggiori, grafica più accurata e, naturalmente, colonne sonore di qualità CD.[5] In Italia era distribuito dalla Giochi Preziosi.[6]

              Nonostante la console fosse riuscita a ottenere un grande successo in Nord America, Europa e Brasile, in Giappone non riuscì a stare al passo con altre due console concorrenti, ovvero il PC Engine della NEC Corporation e il Super Nintendo Entertainment System della Nintendo.</p>
          </div>

          <div class="buy">
          <?php
            if (isset($_SESSION['username'])) {
              echo "<button class='btn' data-name-console='SEGAMEGADRIVE' data-buy='3'>Acquista!</button> " ;  
            }             
            ?>
            <img src="images/Sega-Mega-Drive.jpg" />
          </div>

        </div>

        <div class="api" data-type-id="c">
         
        </div>

      </div>
    </div>

  </section>













  <footer>
    <p>Powered by Lorenzo Siena 1000015814</p>
  </footer>
</body>

</html>