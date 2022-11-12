let email = document.getElementById("login-input-email");
let password = document.getElementById("login-input-password");


let login_form = document.getElementById("login-form");

login_form.addEventListener("submit",  (e) => login(e));





const addError = (err) => {
    let errortext = document.querySelector('#error-signup');
    let errorContainer = document.querySelector('.error-container');
    errorContainer.classList.add('active');
    errortext.innerHTML = err;
}

const login = async (event) => {
    console.log(event)
    event.preventDefault();

    const submitButton = document.querySelector('#submit-button');
    submitButton.innerHTML = `<div class="lds-dual-ring"></div>`;

    
        
    fetch('Controllers/controllerLogin.php',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({email:email.value,password:password.value})
        }).then( (response) => {
            return response.json();
        }).then((data) => {
            console.log(data)
            if(!data.status){
                addError(data.message);
                submitButton.innerHTML = `connexion`;
                email.value = '';
                password.value = '';
            } else {
                let token = "bearer "+data.message.token;
                document.cookie = "token=" + token;
                document.location.href = '../fr/publish-an-ad';
            }
        }).catch(function (err) {
            addError(err);
        });
        
    
    
}