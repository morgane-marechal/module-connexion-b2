console.log("script register form OK");

let insForm = document.getElementById('form-register');

if (insForm){
    insForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);

    let url = 'inscription.php';

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