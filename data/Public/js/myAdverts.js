import { createModal } from "./createModal.js";

const activeMenu = (e,menu) => {
    e.stopPropagation();


    document.querySelectorAll('.options').forEach(option => {
        option.classList.remove('show');
    })
    let optionContainer =  menu.parentNode.querySelector('.options');
    optionContainer.classList.add('show');

    let stopPropagationEvent = (e) => {
        e.stopPropagation();
    }

    optionContainer.addEventListener("click", (e) => stopPropagationEvent(e));


    document.addEventListener("click", (event) => {
        let isShow = optionContainer.classList.contains('show');
        if(isShow){
            optionContainer.classList.remove('show');
            optionContainer.removeEventListener("click", (e) => stopPropagationEvent(e));
        } 
    })
}

let allMenu = document.querySelectorAll('.menu');
allMenu.forEach(menu => {
    menu.addEventListener('click', (e) => activeMenu(e,menu));
})






const editAdverts = (e) => {
    let advert = e.target.parentNode.parentNode.parentNode;
    document.location.href = "../fr/advert-edit?q="+advert.id;
}

const openAdverts = (e) => {
    let advert = e.target.parentNode.parentNode.parentNode;
    document.location.href = "../fr/advert?q="+advert.id;
}


const removeAdvert = (e,id) => {


    fetch('Controllers/controllerDeleteAdvert.php',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({id:id})
    }).then(function (response) {
        return response.json();
    }).then(function (data) {
        console.log(data)
        document.location.href = "../fr/my-adverts";
    }).catch(function (err) {
        addError(err);
        console.log(err)
    });


}

const deleteAdverts = (e,target) => {
    let id = target.parentNode.parentNode.parentNode.id;
    e.preventDefault();
    e.stopPropagation();
    let bodyInner = `
        <div class="input-container max100">
            <span class="input-text">Veuillez entrer "supprimer l'annonce" pour confirmer</span>
            <input type="text" name="confirmDelete" id="confirm-delete-advert" placeholder="supprimer l'annonce">
        </div>`;
    let footerInner =  `<button id="deleteButton" disabled>Supprimer</button>`
    createModal("supprimer l'annonce",bodyInner,footerInner);

    const enabledButton = (e) => {
        let deleteButton = document.getElementById("deleteButton");
        if(e.target.value === "supprimer l'annonce"){
            deleteButton.disabled = false;
            deleteButton.style.opacity = 1;
            deleteButton.style.cursor = "pointer";
        } else {
            deleteButton.disabled = true;
            deleteButton.style.opacity = 0.5;
            deleteButton.style.cursor = "default";
        }
        
    }

    let confirmDelete = document.getElementById('confirm-delete-advert');
    confirmDelete.addEventListener('keyup', (e) => enabledButton(e));
    

    document.getElementById('deleteButton').addEventListener('click',(e) => removeAdvert(e, id));
}


let editAllButton = document.querySelectorAll('.edit');
let openAllButton = document.querySelectorAll('.open');
let deleteAllButton = document.querySelectorAll('.delete');


editAllButton.forEach(editButton => {
    editButton.addEventListener("click", (e) => editAdverts(e))
})

openAllButton.forEach(openButton => {
    openButton.addEventListener("click", (e) => openAdverts(e))
})

deleteAllButton.forEach(deleteButton => {
    deleteButton.addEventListener("click", (e) => deleteAdverts(e,deleteButton))
})






