console.log("script connect form OK");

let connectForm = document.getElementById('form-connexion');

if (connectForm){
    connectForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);

    let url = 'connexion.php';

    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    let responseData = await response.text();

    console.log(`form => `, form);
    console.log(`responseData => `, responseData);
    

    });
}