console.log("script register form OK");

let insForm = document.getElementById('form-register');

if (insForm){
    insForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = 'traitement-inscription.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.json();
    console.log(responseData);
    if (responseData==='{"success":true}'){
        console.log("Vous êtes enregistré")
    }
    if (responseData==='{"success":false}'){
        console.log("Ce nom d'utilisateur existe déjà !")
    }
    });
    
}