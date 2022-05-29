

function onResponse(response) {
  console.log(response);
  return response.json();
}

//Crea il riquadro e lo stampa
function onJsonStockGame(json) {

  console.log("I giochi in stock sono i seguenti");
  console.log(json);

  if (json.exists === false) {
    const res=document.querySelector("#middlebottom");
    res.innerHTML='';
    const err=document.createElement("h1");
    err.textContent="Nessun risultato trovato in stock";
    res.appendChild(err);
    
    
      

  }else{

  const res=document.querySelector("#middlebottom");
  res.innerHTML='';
  const div=document.createElement("div");
  div.className="container";
  
  console.log("A");
  
  
  
  for (const element of json) {
    console.log("B");
    const nome=element.nome;
    const prezzo=element.prezzo;
    const descr=element.descrizione;
    const quantita=element.quantita;
    const id=element.id;
    let url_img=element.imag_url;
    console.log("C");
    if (url_img==null){
      url_img="images/nodisp.jpg";
    
    }else{
      url_img=element.imag_url;
    
    }
    
    
    console.log("D");
    const item=document.createElement("div");
    item.className="item";

     
    const title=document.createElement("h1");
    title.textContent=nome;
    item.appendChild(title);
    
    img=document.createElement("img");

    img.src=url_img;
    
    img.className="imgg";
    item.appendChild(img);
    
    const desc=document.createElement("p");
    desc.textContent=descr;
    item.appendChild(desc);
    
    const price=document.createElement("p");
    price.textContent=prezzo+"€";
    item.appendChild(price);
    
    const quant=document.createElement("p");
    quant.textContent=quantita+" pezzi disponibili";
    item.appendChild(quant);
    
    const button=document.createElement("button");
    button.textContent="Acquista";
    button.className="btn";
    button.dataset.buy=id;
    button.addEventListener("click",onClick);
    item.appendChild(button);
    
    console.log("F");
    div.appendChild(item);
    
  
  }
  res.appendChild(div);
  console.log("WWW");




  }
  
}




function createPoster(released, name, background_image, description, data_type_id) {
  //data_type_id= a = primo (nes)
  //                b= secondo (atari)
  //                c= terzo    (sega)
  //released : "1985-09-15" ->(SOLO ANNO) ->H1
  // name : "Ultima IV: Quest of the Avatar" ->H1
  // background_image	:	"https://media.rawg.io/media/screenshots/773/7730495e8fc0fe7e1e747cb9449399ac.jpeg"->img
  //description : "<p>Battletoads are here to fight aliens form other words.</p>" -> dentro un div
  const year = released.substring(0, 4); // ESTRAE SOLO L'ANNO

  const game = document.querySelector("[data-type-id=" + `${data_type_id}` + "]");
  game.innerHTML = '';
  const A1 = document.createElement('div');
  const A2 = document.createElement('div');

  const title = document.createElement('h1');
  const date = document.createElement('h1');
  const img = document.createElement('img');
  const par = document.createElement('div');

  img.src = background_image;

  title.textContent = name;

  date.textContent = year;

  par.innerHTML = description;

  A1.classList.add('A1');
  A2.classList.add('A2');

  img.classList.add('img_announce');

  game.appendChild(A1);
  game.appendChild(A2);
  A1.appendChild(date);
  A1.appendChild(img);
  A2.appendChild(title);
  A2.appendChild(par);
}



function getGameInfo(url, url2, url_game, key_api, id_console, data_type_id) {
  const url_search = url + key_api + url2 + id_console;
  const result = fetch(url_search)


    .then(response => response.json())
    .then(json => {

      const num = Math.floor(Math.random() * 19);
      const slug = json.results[num].slug;
      return fetch(`${url_game}${slug}?key=${key_api}`); // make a 2nd request and return a promise

    })
    .then(response => response.json())
    .catch(err => {
      console.error('Request failed', err)
    })
  result.then(
    r => {
      createPoster(r.released, r.name, r.background_image, r.description, data_type_id);
    });
}




const key_api = '394f8ac2db054cfda1189e604c4d08dc';
const id_c1 = 49;
const id_c2 = 23;
const id_c3 = 43;
const url = 'https://api.rawg.io/api/games?key=';
const url2 = '&ordering=-added&platforms=';
url_game = 'https://api.rawg.io/api/games/';

getGameInfo(url, url2, url_game, key_api, id_c1, "a");
getGameInfo(url, url2, url_game, key_api, id_c2, "b");
getGameInfo(url, url2, url_game, key_api, id_c3, "c");

let flag; 
//flag per controllare se è stato premuto il tasto va interrotta la richiesta di giochi ogni 30 secondi

  flag=window.setInterval(function(){
    getGameInfo(url,url2,url_game,key_api,id_c1,"a");
    getGameInfo(url,url2,url_game,key_api,id_c2,"b");
    getGameInfo(url,url2,url_game,key_api,id_c3,"c");
    console.log("Cambio!");
  } ,30000);


/* fetch(`https://api.rawg.io/api/games?search=${this.value}&key=394f8ac2db054cfda1189e604c4d08dc`)}*/
//when enter is pressed on the input field it will call the function getGameInfo
document.querySelector('#search').addEventListener('keyup', function(e) {
  if (e.code === 'Enter'&& this.value != ''){
      clearInterval(flag);
      fetch("dbStockFinder.php?q=" + encodeURIComponent(this.value)).then(onResponse).then(onJsonStockGame);
      
    }
  });



  function onJsonAddGame(json) {
    //ritorna true se l'aggiunta è andata a buon fine
    console.log(json);
    }
    function onResponse(response) {
        console.log(response);
        return response.json();
      }
      
    
    function onClick(event){
      console.log("cliccato");
       //leggo id-product dell'elemento cliccato (il prodotto viene nominato dal server)
        console.log(this.dataset.buy);
        
        //lo spedisco al php insieme al mio $SESSION(username)
       
        //lo mando al server per aggiunerlo al carrello
        fetch("dbGameFinder.php?q=" + encodeURIComponent(this.dataset.buy)).then(onResponse).then(onJsonAddGame);
       // //dove c'è il tasto acquista-> aggiunto! :D
        this.textContent = "Aggiunto al carrello!!";
    }
    const consoleButt = document.querySelectorAll('.btn');
    for (const but of consoleButt) { 
        but.addEventListener("click", onClick);
    
    }
    