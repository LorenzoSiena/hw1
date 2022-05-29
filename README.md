# hw1

Il sito RetroMuseum è un fake e-commerce riguardo una fittizia azienda Catanese,
Presenta un meccanismo di login e iscrizioni con validazione da server(moduli php-> database) e da client (password alfanumeriche con almeno 8 char di simboli,lettere e numeri) usando metodi post.
I “blocchi di contenuto” da visualizzare nella home page 
sono essere caricati accedendo tramite API REST a pagine PHP presenti sul sito.
Sia da javascript->php->database(locale) con ricerca nel database,
che da javascript->api token che si rinnovano ogni 30 secondi riaggiornando i contenuti senza ricaricare la pagina.

La home page permette di aggiungere al carrello 3 console e dopo aver cercato i giochi sul database anche di aggiungere quelli.

Le pagine oltre la home page sono Carrello,login,signup e aboutUs.
Quest'ultima effettua una ricerca da javascript->php curl verso l'ultimo podcast spotify (Auth2.0) disponibile del fittizio team.
Non è stato implementa la ricerca tra i podcast ma il codice che fa quello è commentato nel php addetto alle chiamate api di spotify.
A causa del tempo limitato non sono arrivato a implementare le funzionalità del checkout per "pagare "e  inserire gli ordini che hanno come chiave esterne l'id dell'utente e l'id del gioco (0=console,1=gioco)
Nel Database ho avuto un problema con le dimensioni del blob durante le chiamate per estrarre dei file immagine in binario che facevano crashare le richieste,
quindi li ho sostituiti con degli url_immagine al momento null nel database users,game,ordini,cookie(non implementati).
