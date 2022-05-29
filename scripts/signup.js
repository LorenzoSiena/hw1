//////////////////////////INIZIO_DATABASE//////////////////////////////////////////////////////////

function jsonCheckUsername(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.username = !json.exists) {
        
        document.querySelector('.username span').textContent = "";
        document.querySelector('.username').classList.remove('errorj');
        console.log("username valido!!");
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
        console.log("Ma già esistente!!");
    }
    checkForm();
}

function jsonCheckEmail(json) { 
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
        document.querySelector('.email span').textContent = "";
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
    checkForm();
}

function fetchResponse(response) { // Funzione che gestisce la risposta del server
    if (!response.ok) return null; // Se la risposta non è ok, restituisce null
    return response.json();         // Altrimenti, restituisce il JSON
}
// contatto il server per verificare che l'username non sia già utilizzato
function checkUsername(event) {
    const input = document.querySelector('.username input');

    if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) { // Controllo che il nome utente sia alfanumerico e non più lungo di 15 caratteri
        input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        document.querySelector('.username').classList.add('errorj');
        formStatus.username = false;
        console.log("username non valido");
        checkForm();
    } else {
        console.log("username valido");
        fetch("check_username.php?q=" + encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
        //TORNA UN JSON CON UN CAMPO EXISTS CHE CONTIENE TRUE SE L'UTENTE ESISTE
    }
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;
        checkForm();
    } else {
        fetch("check_email.php?q=" + encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}


///////////////////////////FINE_DATABASE///////////////////////////////////////////



function checkName(event) {
    const input = event.currentTarget; 

    if (formStatus[input.name] = input.value.length > 0) {
        document.querySelector('.name').classList.remove('errorj');
        document.querySelector('.name span').textContent = "";
    } else {
        document.querySelector('.name span').textContent = "";
        document.querySelector('.name').classList.add('errorj'); 
    }
    checkForm(); // Controlla se il form è valido
}


function checkSurname(event) {
    const input = event.currentTarget; 

    if (formStatus[input.name] = input.value.length > 0) {
        document.querySelector('.surname').classList.remove('errorj');
        document.querySelector('.surname span').textContent = "";
    } else {
        document.querySelector('.surname span').textContent = "";
        document.querySelector('.surname').classList.add('errorj'); 
    }
    checkForm(); // Controlla se il form è valido
}



function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    
    if (formStatus.password = /^(?=.*[!@#$%^&*_-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/.test(passwordInput.value)) { 
        // Controllo che la password sia almeno lunga 8 caratteri, almeno una lettera maiuscola, almeno un carattere speciale e almeno un numero
        document.querySelector('.password').classList.remove('errorj');
        document.querySelector('.password span').textContent = "";
    } else {
        document.querySelector('.password').classList.add('errorj');
        document.querySelector('.password span').textContent = "La password deve essere lunga almeno 8 caratteri ,contenere almeno un numero,una lettera maiuscola e un carattere speciale";
    }
    checkForm();
}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value
        && confirmPasswordInput.value.length > 8) {
        document.querySelector('.confirm_password').classList.remove('errorj');
        document.querySelector('.confirm_password span').textContent = "";
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
        document.querySelector('.confirm_password span').textContent = "Le password non corrispondono";
    }
    checkForm();
}
function checkAddress(event) {
    const input = event.currentTarget; 
    if (formStatus[input.name] = input.value.length > 0) {
        document.querySelector('.address').classList.remove('errorj');
        document.querySelector('.address span').textContent = "";
    } else {
        document.querySelector('.address').classList.add('errorj');
        document.querySelector('.address span').textContent = "";
    }
    checkForm(); // Controlla se il form è valido
}



function checkForm() {
    console.log(Object.keys(formStatus).length);
    console.log(formStatus);
    // Controlla consenso dati personali
    document.getElementById('log').disabled = !document.querySelector('.allow input').checked || //
        // Controlla che tutti i campi siano pieni
        Object.keys(formStatus).length !== 7 ||
        // Controlla che i campi non siano false
        Object.values(formStatus).includes(false);  
}



//blur-> quando clicco fuori dal campo
const formStatus = { }; // Crea un oggetto che contiene lo stato dei campi del form
document.querySelector('.name input').addEventListener('blur', checkName); // Evento per controllare il nome
document.querySelector('.address input').addEventListener('blur', checkAddress);
document.querySelector('.surname input').addEventListener('blur', checkSurname); // Evento per controllare il cognome
document.querySelector('.username input').addEventListener('blur', checkUsername); // Evento per controllare il nome utente
document.querySelector('.email input').addEventListener('blur', checkEmail); // Evento per controllare l'email
document.querySelector('.password input').addEventListener('blur', checkPassword); // Evento per controllare la password
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword); // Evento per controllare la conferma password
document.querySelector('.allow input').addEventListener('change', checkForm); // Evento per controllare il consenso dati personali


if (document.querySelector('.errorj') !== null) { // Se c'è un errore
    checkUsername(); checkPassword(); checkConfirmPassword(); checkEmail(); // Controllo i campi
    document.querySelector('.name input').dispatchEvent(new Event('blur')); // Disattivo i campi
    document.querySelector('.surname input').dispatchEvent(new Event('blur')); // Disattivo i campi
}

