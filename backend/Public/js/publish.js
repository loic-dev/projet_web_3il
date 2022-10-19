let signup_form = document.getElementById("publish-add-form");
let titleInput = document.getElementById("title-input");
let placeInput = document.getElementById("place-input");
let levelInput = document.getElementById("level-input");
let descriptionInput = document.getElementById("desc-input");
let instrumentsInput = "panel-instrument-1";
let button_submit = document.getElementById("btn-submit");


let containerInstrument = document.querySelector(".container-instruments");

const instruments = Array.from(containerInstrument.children);

let title = "";



function selectInstrument(id){
    instruments.forEach(span => {
        span.classList.remove("select");
    })
    document.getElementById(id).classList.add("select");
}


instruments.forEach(span => {
    document.getElementById(span.id).addEventListener("click", (e) => selectInstrument(span.id))
})




const setTitle = (value) => {
    title=value;
    if(value === ""){
        document.querySelector('#ad-title').innerText = "Titre de l'annonce";
    } else {
        document.querySelector('#ad-title').innerText = value;
        
    }
}






titleInput.addEventListener("keyup", (e) =>  setTitle(e.target.value))