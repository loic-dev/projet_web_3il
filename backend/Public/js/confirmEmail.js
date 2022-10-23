const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const token = urlParams.get('token');



const confirmEmailComponentSuccess = () => {
    return `
            <div class="container_logo">
                    <img class="valid_picture" src="./Public/media/valid.svg" />
            </div>
            <p>Votre email à été confirmé avec succès</p>
            <a href="../login" class="form-submit-button">Connectez-vous</a>
        `
}


const confirmEmailComponentError = () => {
    return `
            <div class="container_logo">
                    <img class="valid_picture" src="./Public/media/error.svg" />
            </div>
            <p>Une erreur est survenue</p>`
}


fetch('Controllers/controllerVerifyEmail.php?token='+token,{
    method: 'GET',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
}).then(function (response) {
    return response.json();
}).then(function (data) {
    let containerBox = document.querySelector('.container-box');
    if(data.status){
        containerBox.innerHTML = confirmEmailComponentSuccess();
        containerBox.classList.add('active');
    } else {
        containerBox.innerHTML = confirmEmailComponentError();
        containerBox.classList.add('active');
    }
}).catch(function (err) {
    let containerBox = document.querySelector('.container-box');
    containerBox.innerHTML = confirmEmailComponentError();
    containerBox.classList.add('active');
});
        
    
    
