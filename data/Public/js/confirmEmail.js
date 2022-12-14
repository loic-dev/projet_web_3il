const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const token = urlParams.get('token');



const confirmEmailComponentSuccess = () => {
    return `
            <div class="container_logo">
                    <img class="valid_picture" src="../Public/media/valid.webp" />
            </div>
            <p>Votre email à été confirmé avec succès</p>
            <a href="../fr/login" ><button class="form-submit-button activeDefault">Connectez-vous</button></a>
        `
}


const confirmEmailComponentError = (err) => {
    return `
            <div class="container_logo">
                    <img class="valid_picture" src="../Public/media/error.webp" />
            </div>
            <p>${err}</p>`
}

const verifyEmail = () => {
    document.querySelector('#container-ring').classList.add('load');
    fetch('Controllers/controllerVerifyEmail.php?token='+token,{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    }).then(function (response) {
        return response.json();
    }).then(function (data) {
        document.querySelector('#container-ring').classList.remove('load');
        let containerBox = document.querySelector('.container-box');
        if(data.status){
            containerBox.innerHTML = confirmEmailComponentSuccess(data.message);
            containerBox.classList.add('active');
        } else {
            containerBox.innerHTML = confirmEmailComponentError(data.message);
            containerBox.classList.add('active');
        }
    }).catch(function (err) {
        console.log(err)
        document.querySelector('#container-ring').classList.remove('load');
        let containerBox = document.querySelector('.container-box');
        containerBox.innerHTML = confirmEmailComponentError();
        containerBox.classList.add('active');
    });


}


verifyEmail();
        
    
    
