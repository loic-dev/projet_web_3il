import {regex_input_text,regex_input_email,regex_input_password} from "./regex.js"



let signup_form = document.getElementById("signup-form");
let name = document.getElementById("signup-input-name");
let surname = document.getElementById("signup-input-surname");
let email = document.getElementById("signup-input-email");
let password = document.getElementById("signup-input-password");
let confirmPassword = document.getElementById("signup-input-confirmPassword");
let button_submit = document.getElementById("submit-button");



name.addEventListener("change", (e) => check_validity(e,"text"));
surname.addEventListener("change", (e) => check_validity(e,"text"));
email.addEventListener("change", (e) => check_validity(e,"email"));
password.addEventListener("change", (e) => check_validity(e,"password"));
confirmPassword.addEventListener("change", (e) => check_validity(e,"confirmPassword"));
signup_form.addEventListener("change", (e) => check_validity(e,"all"));
signup_form.addEventListener("submit",  (e) => signup(e));


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


const signup = (event) => {
    event.preventDefault();

    

    let validity = check_validity(event,"all");

    if(validity){
        
            fetch('Controllers/controllerSignup.php',{
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({name:name.value,surname:surname.value})
            }).then(function (response) {
                return response.json();
            }).then(function (data) {
                console.log(data);
            }).catch(function (err) {
                console.warn('Something went wrong.', err);
            });
        
    }
    
}