console.log('script profil ok');

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
        console.log("Vous avez changé votre login avec succès")
    }
    if (responseData==='{"success":false}'){
        console.log("Ce nom d'utilisateur existe déjà !")
    }
    });
}


let firstnameForm = document.getElementById('form-firstname');
if (firstnameForm){
    firstnameForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'profil.php';
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
        console.log("Vous avez changé votre prénom avec succès")
    }
    });
}

let lastnameForm = document.getElementById('form-lastname');
if (lastnameForm){
    lastnameForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'profil.php';
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
        console.log("Vous avez changé votre nom avec succès")
    }
    });
}

let passwordForm = document.getElementById('form-password');
if (passwordForm){
    passwordForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'profil.php';
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