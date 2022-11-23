import {regex_input_text,regex_input_password,regex_input_alphaNum,regex_input_phone,regex_input_email,regex_input_website} from "./regex.js"
import { createModal } from "./createModal.js";

const nameDefault = document.querySelector('#name-struct').value;
const adressDefault = document.querySelector('#adresse-struct').value;
const emailDefault = document.querySelector('#email-struct').value;
const websiteDefault =  document.querySelector('#website-struct').value;
const phoneDefault =  document.querySelector('#phone-struct').value;

const btnSubmit = document.querySelector('#btn-submit');
const deleteAccount = document.querySelector('#delete-account');
const editPasswordForm = document.querySelector('#edit-password-form');


const modifyInput = (input,iconPen) => {
    input.disabled = false;
    input.style.opacity = 1;
    input.focus();
    iconPen.style.display = "none";

}

const focusInput = (input) => {
    input.classList.add('focus');
}

const sendModify = async (input) => {
    const response = await fetch('Controllers/controllerProfile.php',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({name:input.name, value:input.value})
        }
    );
    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    const data = await response.json();

    


    console.log(data);
}

const showInfoInput = (input, msg, type ) => {
    let infoSpan = input.parentNode.querySelector('.infospan');
    infoSpan.innerHTML = msg;
    infoSpan.classList.remove('valid');
    infoSpan.classList.remove('error');
    if(type === "valid"){
        infoSpan.classList.add('valid');
    } else {
        infoSpan.classList.add('error');
    }

    setTimeout(() => {
        infoSpan.innerHTML = '';
    }, 3000);


   
}



const cancelModify = async (input,iconPen) => {
    input.classList.remove('focus');
    let name = input.name;

    if(name === "newPasswordStruct" && !regex_input_password(input.value)){
        showInfoInput(input,"le mot de passe est trop faible","error");
    }

    if(name !== "currentPasswordStruct" && name !== "newPasswordStruct"){
        switch (name) {
            case "nameStruct":
                if(input.value !== nameDefault){
                    if(regex_input_text(input.value)){
                        try {
                            await sendModify(input);
                            showInfoInput(input,"Modifié", "valid")
                        } catch (error) {
                            showInfoInput(input,error, "error")
                            input.value = nameDefault;
                        }
                    } else {
                        showInfoInput(input,"Ce champ doit contenir seulement du texte", "error")
                        input.value = nameDefault;
                    }
                }
                break;
            case "adresseStruct":
                if(input.value !== adressDefault){
                    if(regex_input_alphaNum(input.value)){
                        try {
                            await sendModify(input);
                            showInfoInput(input,"Modifié", "valid")
                        } catch (error) {
                            showInfoInput(input,error, "error")
                            input.value = adressDefault;
                        }
                    } else {
                        showInfoInput(input,"Ce champ n'est pas du type addresse", "error")
                        input.value = adressDefault;
                    }
                }
                break;
            case "emailStruct":
                if(input.value !== emailDefault){
                    if(regex_input_email(input.value)){
                        try {
                            await sendModify(input);
                            showInfoInput(input,"Modifié", "valid")
                        } catch (error) {
                            showInfoInput(input,error, "error")
                            input.value = emailDefault;
                        }
                    } else {
                        showInfoInput(input,"Ce champ n'est pas du type email", "error");
                        input.value = emailDefault;
                    }
                }
                break;
            case "websiteStruct":
                if(input.value !== websiteDefault){
                    if(regex_input_website(input.value)){
                        try {
                            await sendModify(input);
                            showInfoInput(input,"Modifié", "valid")
                        } catch (error) {
                            showInfoInput(input,error, "error")
                            input.value = websiteDefault;
                        }
                    } else {
                        showInfoInput(input,"Ce champ doit etre sous la forme http://www.site.com", "error");
                        input.value = websiteDefault;
                    }
                }
                break;
            case "phoneStruct":
                if(input.value !== phoneDefault){
                    if(regex_input_phone(input.value)){
                        try {
                            await sendModify(input);
                            showInfoInput(input,"Modifié", "valid")
                        } catch (error) {
                            showInfoInput(input,error, "error")
                            input.value = phoneDefault;
                        }
                    } else {
                        showInfoInput(input,"Ce champ doit n'est pas du type numero français","error");
                        input.value = phoneDefault;
                    }
                }
                break;
        
            default:
                break;
        }
    }

    
    if(iconPen){
        input.disabled = true;
        input.style.opacity = 0.5;
        iconPen.style.display = "flex";
    }

    
}

const showInfoPassword = (msg, type) => {
    let infoContainer = document.getElementById('info-container-profile');
    infoContainer.classList.remove('valid');
    infoContainer.classList.remove('error');
    infoContainer.classList.remove('close');
    
    if(type === "error"){
        infoContainer.classList.add('open');
        infoContainer.classList.add('error');
    } else {
        infoContainer.classList.add('open');
        infoContainer.classList.add('valid');
    }

    infoContainer.innerHTML = msg;

    setTimeout(() => {
        infoContainer.classList.remove('open');
        infoContainer.classList.add('close');
        infoContainer.innerHTML = "";
    }, 3000);



};


const allInput = document.querySelectorAll('.input-container');
allInput.forEach(inputContainer => {
    const iconPen  = inputContainer.querySelector('.pen-icon');
    const input  = inputContainer.querySelector('input');

    iconPen && iconPen.addEventListener("click", (e) => modifyInput(input,iconPen));
    input.addEventListener("blur", (e) => cancelModify(input,iconPen));
    input.addEventListener("focus", (e) => focusInput(input));
    
})

editPasswordForm.addEventListener('change', () => {
    let passwordForm = editPasswordForm.querySelectorAll('.input-container');
    let passwords = [];
    passwordForm.forEach(inputContainer => {
        let input = inputContainer.querySelector('input');
        passwords.push(input.value);
    })
    
    if(passwords[0] && regex_input_password(passwords[1])){
        btnSubmit.classList.add('active');
        btnSubmit.disabled = false;
    } else {
        btnSubmit.classList.remove('active');
        btnSubmit.disabled = true;
    }
})

const removeAccount = (e) => {
    window.location.replace("../fr/");
}

const showModalDeleteAccount = (e) => {
    e.preventDefault();
    let bodyInner = `
        <div class="input-container max100">
            <span class="input-text">Veuillez entrer "supprimer mon compte" pour confirmer</span>
            <input type="text" name="confirmDelete" id="confirm-delete-struct" placeholder="supprimer mon compte">
        </div>`;
    let footerInner =  `<button id="deletePassword" disabled>Supprimer</button>`
    createModal("supprimer votre compte",bodyInner,footerInner);

    const enabledButton = (e) => {
        let deleteButton = document.getElementById("deletePassword");
        if(e.target.value === "supprimer mon compte"){
            deleteButton.disabled = false;
            deleteButton.style.opacity = 1;
            deleteButton.style.cursor = "pointer";
        } else {
            deleteButton.disabled = true;
            deleteButton.style.opacity = 0.5;
            deleteButton.style.cursor = "default";
        }
        
    }

    let confirmDelete = document.getElementById('confirm-delete-struct');
    confirmDelete.addEventListener('keyup', (e) => enabledButton(e));
    

    document.getElementById('deletePassword').addEventListener('click',(e) => removeAccount(e));
}


const showModalConfirmPassword = (e) => {
    e.preventDefault();
    let bodyInner = `
        <div class="input-container max100">
            <input type="password" name="confirmPassword" id="confirm-password-struct">
            <span class="infospan"></span>
        </div>`;
    let footerInner =  `<button id="confirmPassword">Confirmer</button>`
    createModal("Confirmer le mot de passe",bodyInner,footerInner);

    document.getElementById('confirmPassword').addEventListener('click',(e) => changePassword(e));

}




const changePassword = async (e) => {

    let valueNewPassword = document.getElementById("new-password-struct");
    let valueConfirmPassword = document.getElementById("confirm-password-struct");


    if(valueNewPassword.value !== valueConfirmPassword.value){
        showInfoInput(valueConfirmPassword,"les mots de passe ne correspondent pas", "error");
    } else {
        document.getElementById('close-icon').click();
        document.getElementById('confirmPassword').removeEventListener('click',(e) => changePassword(e));
        try {
            await sendModify(valueNewPassword);
            showInfoPassword("Votre mot de passe à été modifié", "valid");
        } catch (error) {
            showInfoPassword(error, "error");
            document.getElementById("current-password-struct").value = "";
            valueNewPassword.value="";
            valueConfirmPassword.value = "";
        }

    }

    
}


editPasswordForm.addEventListener('submit', (e) => showModalConfirmPassword(e));


deleteAccount.addEventListener('click', (e) => showModalDeleteAccount(e));
