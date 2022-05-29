<?php   

//ritorna un json
    
    $client_id = "009e83cc31424b339485bfd72d98c2c1"; //Identificatore della mia app [pubblica(?)]
    $client_secret = "2683260904db45cf94243ca61cd79e56"; //"Password" della mia app [per me e per spotify](dovrebbe rimanere nascosta al pubblico)
   
    if(!isset($token)){ 
    // ACCESS TOKEN
    $ch = curl_init(); //inizializzo curl
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' ); //url del token
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //ritorno il risultato
    curl_setopt($ch, CURLOPT_POST, 1); //eseguo la post
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); //setto i parametri della post (header+body) 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); //setto l'header (id+password)) 
    $token=json_decode(curl_exec($ch), true); //eseguo la richiesta e ritorno il risultato (ottengo il mio token)
    curl_close($ch);     //chiudo curl
    }


    //$query = urlencode($_GET["q"]);
    //$url = 'https://api.spotify.com/v1/search?type=episodes&shows=79AqdlUNncp3KZQJqKv8I7&market=IT&offset=0&q='.$query;


    $url = "https://api.spotify.com/v1/shows/79AqdlUNncp3KZQJqKv8I7/episodes?market=IT&limit=1&offset=0";
    $ch = curl_init(); //inizializzo curl
    curl_setopt($ch, CURLOPT_URL, $url); //url della query
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //ritorno il risultato
    
    # Imposto il token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); //setto l'header (col token) 
    $res=curl_exec($ch); //eseguo la richiesta
    curl_close($ch); //chiudo curl
    echo $res; //ritorno il risultato
    
