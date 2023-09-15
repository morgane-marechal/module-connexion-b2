console.log("script connexion form OK");

let connectForm = document.getElementById('form-connexion');

if (connectForm){
    connectForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'traitement-connexion.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.text();
    window.location.href = 'profil.php';
    console.log(responseData);
    if (responseData==='{"success":true}'){
        console.log("Vous êtes connecté")
    }
    if (responseData==='{"success":false}'){
        console.log("Vous n'êtes pas connecté !")
    }
    });
    
}