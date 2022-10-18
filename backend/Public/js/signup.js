import {regex_input_text,regex_input_email,regex_input_password} from "./regex.js"



let signup_form = document.getElementById("signup-form");
let name = document.getElementById("signup-input-name");
let surname = document.getElementById("signup-input-surname");
let email = document.getElementById("signup-input-email");
let password = document.getElementById("signup-input-password");
let confirmPassword = document.getElementById("signup-input-confirmPassword");
let button_submit = document.getElementById("submit-button");



if(name !== undefined) {
    name.addEventListener("change", (e) => check_validity(e,"text"));
    surname.addEventListener("change", (e) => check_validity(e,"text"));
    email.addEventListener("change", (e) => check_validity(e,"email"));
    password.addEventListener("change", (e) => check_validity(e,"password"));
    confirmPassword.addEventListener("change", (e) => check_validity(e,"confirmPassword"));
    signup_form.addEventListener("change", (e) => check_validity(e,"all"));
    signup_form.addEventListener("submit",  (e) => signup(e));
}




const active_submit_button = (validity) => {
    if(validity){
        button_submit.classList.add("active");
        button_submit.disabled = false;
    } else {
        button_submit.disabled = true;
        button_submit.classList.remove("active");
    }
}


const active_error_input = (target, valid) => {
    let error_text_target = document.getElementById(target.name+"_error");
    if(valid === false){
        target.classList.add("error");
        error_text_target.style.visibility = "visible";
    } else {
        target.classList.remove("error");
        error_text_target.style.visibility = "hidden";
    }
}

const check_validity = (event, type) => {
    let value = event.target.value;
    var validity = false;
    switch (type) {
        case "text":
            validity = regex_input_text(value);
            active_error_input(event.target,validity); 
            break;
        case "email":
            validity = regex_input_email(value);
            active_error_input(event.target,validity); 
            break;
        case "password":
            validity = regex_input_password(value);
            active_error_input(event.target,validity); 
            break;
        case "confirmPassword":
            validity = password.value === value
            active_error_input(event.target,validity);
            break;
        case "all":
            validity = regex_input_text(name.value) && regex_input_text(surname.value) && regex_input_email(email.value) &&  regex_input_password(password.value) && password.value === confirmPassword.value;
            active_submit_button(validity);
            break;
        default:
            break;
    } 
    return validity; 
}


const newModalSuccess = (email, nom) => {
   return `
        <section class='success_signup_section'>
            <div class="container_logo">
                <img class="valid_picture" src="./Public/media/valid.png" />
            </div>
            <span class="bigtext">Bravo ${nom},</span>
            <p>Votre compte à été créé avec succès !!!</p>
            <p class="bigtext">Nous venons d'envoyer un mail à l'adresse mail suivante : <strong>${email}</strong></p>
        </section>`;
}


const addError = (err) => {
    let errortext = document.querySelector('#error-signup');
    let errorContainer = document.querySelector('.error-container');
    errorContainer.classList.add('active');
    errortext.innerHTML = err;
}

const signup = async (event) => {
    event.preventDefault();

    let validity = check_validity(event,"all");

    const submitButton = document.querySelector('#submit-button');
    submitButton.innerHTML = `<div class="lds-dual-ring"></div>`;

    if(validity){
        
            fetch('Controllers/controllerSignup.php',{
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({name:name.value,email:email.value,password:password.value,confirmPassword:confirmPassword.value})
            }).then(function (response) {
                return response.json();
            }).then(function (data) {
                if(!data.status){
                    addError(data.message);
                    submitButton.innerHTML = `S'inscrire`;
                } else {
                    const containerBox = document.querySelector('.container-box')
                    containerBox.style.opacity = "0";
                    containerBox.classList.add("success");
                    setTimeout(function(){
                        containerBox.innerHTML = newModalSuccess(data.message.email,data.message.name);
                    },500)
                    containerBox.style.opacity = "1";
                }
            }).catch(function (err) {
                addError(err);
            });
        
    }
    
}