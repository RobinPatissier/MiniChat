// Récupération du formulaire 
const form = document.querySelector('form')

// ecouteur d'événement sur l'envoi du formulaire qui lancera une fonction
form.addEventListener('submit', function (e) {
    
    // 1. Arreter l'envoi du formulaire
    e.preventDefault();
    console.log('J\'arrete le form');
    // 2. Je récupére la valeur de l'input
    const messageContent = document.querySelector('#content').value
    const messageIp = document.querySelector('#ip_adress').value
    const userPseudo = document.querySelector('#pseudo').value
 //selectionner les valeurs des 3 input avec leur ID
    

    // Préparer les données de la requete
    let formData = new FormData()
    formData.append('content', messageContent) // appeler les 3 valeurs (pseudo messahe IP)
    formData.append('ip_adress', messageIp)
    formData.append('pseudo', userPseudo)
    
    
    // 3. Je lance ma requête en js à la place du formulaire
    fetch('./process/process_add_user_message.php', {   // changer le chemin
        method: "POST", 
        body: formData
    }).then((response)=>{
        return response.text()
    }).then((data)=>{
        // 4. Je vide l'inputconsole.log(response)
        document.querySelector('#content').value ='' // id des valeurs a vider
        document.querySelector('#pseudo').value ='';    
        

    })
    
})


// async function getTodos(){
//     const response = await fetch('./process/process_get_user_message.php');
//     const data = await response.json();
//     console.log(data);
//     let ul = document.querySelector('ul');
//     ul.innerHTML ="";
//     data.forEach(todo => {

//         ul.innerHTML += `
//             <li>${todo.content} ${todo.created_at}</li>
//          `
//     });

// }
