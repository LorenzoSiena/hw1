function onResponsePodcast(response)
{
    console.log("AAA");
    
    console.log(response);
    console.log("DOPO LA RISPOSTA");
    
    return response.json();
}


//Crea il riquadro e lo stampa
function onJsonPodcast(json) {
    console.log("sto per stampare  il json");
    console.log(json);
  

    console.log("ho appena stampato il json");
    const LastPodcast = document.querySelector("#buttonez");
    LastPodcast.innerHTML = ''; //lo svuoto per sicurezza

    const result = json.items[0];  // OGGETTO
    const url = result.external_urls.spotify; // LINK
    const title = result.name; // NOME PUNTATA
    const img_album = result.images[0].url; // immagine 640*640

    const title1 = document.createElement('h2');
    title1.textContent= "Ascolta il nostro ultimo podcast!";
    const sub_title1 = document.createElement('h1');
    sub_title1.textContent= "Da oggi attraverso una richiesta curl in php!";
    sub_title1.classList.add("titlephp");
    
    const div1 = document.createElement('div');
    const sub = document.createElement('span');
    sub.textContent = title;

    const img = document.createElement('img');
    img.src = img_album;
 
    const par = document.createElement('p');
    par.textContent = "Ascolta su spotify!";
 
    const a = document.createElement('a');
    const link = document.createTextNode("Play");
    a.appendChild(link);
    a.href = url;

    LastPodcast.appendChild(title1);
    LastPodcast.appendChild(sub_title1);
    
    LastPodcast.appendChild(div1);
    div1.appendChild(img);
    img.appendChild(sub);
    
    div1.appendChild(par);
    par.appendChild(a);
  
}



console.log("a");
fetch("fetchSpotifyPodcast.php").then(onResponsePodcast).then(onJsonPodcast);
console.log("b");
    
