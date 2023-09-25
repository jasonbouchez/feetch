fetch("http/get.php")
    .then(response => response.json())

    .then(data => {
        data.forEach(element => {
            const createP = document.createElement('p');
            createP.textContent = `${element.nom}  ${element.prenom}`;
            document.body.appendChild(createP);
        });
    })

   
    const form = document.getElementById("myForm");

    
form.addEventListener("submit", function(event) {
    event.preventDefault();

    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;

   
    // FormData pour envoyer les données du formulaire
    const formData = new FormData();
    formData.append("nom", nom);
    formData.append("prenom", prenom);

   
    //requête POST vers post.php
    fetch("http/post.php", {
        method: "POST",
        body: formData
    })

    .then(response => {
        if (!response.ok) {
            throw new Error("La requête a échoué.");
        }
        return response.json();
    })
 
    // réponse du serveur 
    .then(data => {
        console.log(data);
    })

    // Gérez les erreurs
    .catch(error => {
        console.error(error);
    });
});




