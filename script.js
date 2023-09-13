console.log("script OK");
let spaceForm=document.getElementById("forms-space");
let btnInscription=document.getElementById("inscription-button");
let btnConnexion=document.getElementById("connexion-button");



async function inscriptionForm() {
    const response = await fetch("inscription.php");
    const form = await response.text();
    console.log(form);
    spaceForm.innerHTML=form;
}


async function connexionForm() {
    const response = await fetch("connectForm.php");
    const form = await response.text();
    console.log(form);
    spaceForm.innerHTML=form;
}




btnInscription.addEventListener('click', (event) => {
    inscriptionForm();

});

btnConnexion.addEventListener('click', (event) => {
    connexionForm();
});



