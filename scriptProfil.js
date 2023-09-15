console.log('script profil ok');
let toast=document.getElementById("toast-screen");
let word="rien";
toast.innerHTML=word;

function displayToast($message){
    toast.innerHTML=$message;
    toast.style.display = "block";
    setTimeout(() => {
        toast.style.display = "none";
    }, "1000");
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
    //console.log("request",request);
    let responseData = await response.json();
    console.log(responseData);
    if (responseData==='{"success":true}'){
        $message="Vous avez changé le login avec succès !";
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
            $message="Vous avez changé le prénom avec succès !";
            displayToast($message);
        }
        if (responseData==='{"success":false}'){
            $message="Erreure inconnue";
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
        $message="Vous avez changé le nom avec succès !";
        displayToast($message);    }
    if (responseData==='{"success":false}'){
        $message="Erreure inconnue";
        displayToast($message);    
    }
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
    let responseData = await response.json();
    console.log(`response => `, responseData);
    if (responseData==='{"success":true}'){
        $message="Vous avez changé votre mot de passe";
        console.log($message);
        displayToast($message);    
}
    if (responseData==='{"success":false}'){
            $message="Erreure inconnue";
            console.log($message);
            displayToast($message);    
    }
    if (responseData.success==="diff MP"){
        $message="Les mots de passe sont différents";
        console.log($message);
         displayToast($message);   
    }
    if (responseData.success==="bad pattern"){
        $message="Le mot de passe n'est pas au format attendu !";
        console.log($message);
        displayToast($message);   
    }


    });
 }