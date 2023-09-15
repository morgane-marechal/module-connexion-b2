console.log('script profil ok');
let toast=document.getElementById("toast-screen");
let word="rien";
toast.innerHTML=word;

function displayToast($message){
    toast.innerHTML=$message;
    toast.style.display = "block";
}

let loginForm = document.getElementById('form-login');
if (loginForm){

    loginForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    // console.log("form".form);
    // console.log("form target",form.target[0]);

    let url = 'traitement.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.json();
    console.log(responseData);
    if (responseData==='{"success":true}'){
        $message="Vous avez changé le login avec succès !"
        displayToast($message);
    }
    if (responseData==='{"success":false}'){
        $message="Ce login existe déjà";
        displayToast($message);
    }
    });
}


let firstnameForm = document.getElementById('form-firstname');
if (firstnameForm){
    firstnameForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'traitement.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.json();
    console.log(responseData);
        if (responseData==='{"success":true}'){
            $message="Vous avez changé le prénom avec succès !"
            displayToast($message);
        }
        if (responseData==='{"success":false}'){
            $message="Erreur inconnue"
            displayToast($message);
        }
    });
}

let lastnameForm = document.getElementById('form-lastname');
if (lastnameForm){
    lastnameForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'traitement.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.json();
    console.log(responseData);
    if (responseData==='{"success":true}'){
        $message="Vous avez changé le nom avec succès !"
        displayToast($message);    }
    if (responseData==='{"success":false}'){
        $message="Erreure inconnue"
        displayToast($message);    }
    });
}

let passwordForm = document.getElementById('form-password');
if (passwordForm){
    passwordForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'traitement.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    let responseData = await response.text();
    console.log(`form => `, form);
    console.log(`response => `, response);
    console.log(`response ok => `, response.ok);
    if (response.ok===true){
        console.log("Vous avez changé votre mot de passe avec succès")
    }
    });
}