import AddInstrumentModal from "../components/addInstrumentModal.component.js";
import EventBus from "./eventBus.class.js";
import {regex_input_text,regex_input_alphaNum} from "./regex.js"



let signup_form = document.getElementById("publish-add-form");
let titleInput = document.getElementById("title-input");
let placeInput = document.getElementById("place-input");
let levelInput = document.getElementById("level-input");
let rubricInput = document.getElementById("rubric-input");
let descriptionInput = document.getElementById("desc-input");
let instrumentsInput = document.querySelector('.panel-instruments.select');
let allInstruments = document.querySelectorAll('.panel-instruments');


//get photo server
let containerPhoto = document.querySelector(".container-photos");
var listPhotos = [];
document.querySelectorAll('.edit-photo-span').forEach(span => {
    
    listPhotos.push({
        type:"server",
        id:span.id,
    });
})

//create history
const historyForm = {
    "title":titleInput.value,
    "place":placeInput.value,
    "level":levelInput.value,
    "rubric":rubricInput.value,
    "description":descriptionInput.value,
    "instruments":instrumentsInput.innerText,
    "images":[...listPhotos]
}


let addPhotoPanel = document.getElementById("panel-add-photos");
let inputFile = document.getElementById("file-input");





const selectInstrument = (id) => {
    instrumentsInput = document.querySelector('#'+id);
    allInstruments.forEach((inst) => {
        if(inst.id === id){
            inst.classList.add("select");
        } else {
            inst.classList.remove("select");
        }
    })
    activeSubmitButton();
}

allInstruments.forEach((inst) => {
    inst.addEventListener("click", () => selectInstrument(inst.id))
})





descriptionInput.addEventListener("keyup", e => setDescription(e.target.value))


const uniqId = () => {
    return Math.floor((1 + Math.random()) * 0x10000)
        .toString(16)
        .substring(1);
}


const addError = (err) => {
    let errorContainer = document.querySelector('#error-container');
    errorContainer.innerHTML =  `<span>${err}</span>`;
    errorContainer.classList.add('show');

    setTimeout(() => {
        errorContainer.classList.remove('show');
    }, 3000);

}


let idPhoto = null;

function uploadPhoto(files) {
    var reader = new FileReader(); 
    
    
    const readFile = (index) => {
        var file = files[index];



        
        if( index >= 3 || index >= files.length ) {
            inputFile.value = "";
            return;
        }   

        

        //check extention
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(inputFile.value)) {
            addError("Invalid file type");
            return false;
        }


        //check file size
        if (file.size / (1024 * 1024) > 3) {
            addError("File size is too large (max 3 MB)");
            return false;
        }
      
        idPhoto = uniqId();
        console.log(idPhoto)
        let i = listPhotos.findIndex(p => p.id === null)
        if(i === -1){
            listPhotos.push({
                id:idPhoto,
                file:file,
                type:"upload"
            })
        } else {
            listPhotos[i] = {
                id:idPhoto,
                file:file,
                type:"upload"
            }
        }

        

        

        reader.onload = function(e) {  
            listPhotos[listPhotos.findIndex(data => data.id === idPhoto)].preview = e.target.result;
            idPhoto = null;
            if(listPhotos.filter(link => link.id !== null).length < 3){
                readFile(index+1);
            }
            updateViewPhoto();
        }

        reader.readAsDataURL(file);
    }
    readFile(0);
    
}



const remove = (e,index) => {
    listPhotos[index].id = null;
    updateViewPhoto();
    activeSubmitButton();
}



const updateViewPhoto  = () => {
    

    //delete state list photos
    let getNodePhotos = document.querySelectorAll(".edit-photo-span");
    getNodePhotos.forEach((node,i) => {
        
        let index = listPhotos.findIndex(data => data.id === node.id)
        if(index === -1 || listPhotos[index].type !== "server"){
            node.removeEventListener("click",(e) => remove(e,index), true);
            node.remove();
        }
    })


    listPhotos.forEach((link,i) => {

        if(link.id !== null){
            if(link.type !== "server"){
                /*input photos*/
                let newPhotoEditComponent = `
                <span id="${link.id}" style="background-image: url('${link.preview}');" class="edit-photo-span">
                    <span class="overlay"></span>
                    <em class="deleteIcon fa-trash svg-primary-grey icon-30"> </em>
                </span>`
                containerPhoto.prepend(document.createRange().createContextualFragment(newPhotoEditComponent));
            }
            document.getElementById(`${link.id}`).addEventListener("click", (e) => remove(e,i));
        }
        
        
    })

    let filter = listPhotos.filter(link => link.id !== null);
    if(filter.length >= 3) {
        addPhotoPanel.classList.add("unshow")
        addPhotoPanel.classList.remove("show")
    } else {
        addPhotoPanel.classList.remove("unshow")
        addPhotoPanel.classList.add("show")
    }


}


updateViewPhoto();

const createSearchItemComponent = (data) => {
    let component = `
        <div class="items-search" id=${data.id}>
            <span class="label">${data.name}</span>
            <span class="postcodeAndCity">${data.postcode} - ${data.city}</span>
        </div>
    `
    return document.createRange().createContextualFragment(component);
}

const completePlaceInput = (data) => {
    placeInput.value = data.label;
    document.querySelector("#list-search").classList.remove("show");
}

const searchPlace = (value) => {

    let getNodeSearchItems = document.querySelectorAll(".items-search");
    getNodeSearchItems.forEach((node,i) => {
        node.remove();
    })


    if(value.length > 3){
        document.querySelector("#list-search").classList.add("show")
        document.querySelector("#ring-search").classList.add("show")
        fetch('Controllers/controllerAddress.php?'+ new URLSearchParams({
            search: value,
        }),{
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        }).then(function (response) {
            return response.json();
        }).then(function (data) {
            document.querySelector("#ring-search").classList.remove("show");
            
            data.features.forEach(data => {
                document.querySelector("#container-list-search").prepend(createSearchItemComponent(data.properties));
                document.getElementById(data.properties.id).addEventListener("click", e => completePlaceInput(data.properties));
            })
        }).catch(function (err) {
            addError(err);
        });
    } else {
        document.querySelector("#list-search").classList.remove("show");
    }
 
    
}




placeInput.addEventListener('keyup', (e) => searchPlace(e.target.value));
placeInput.addEventListener('focusout', (e) => document.querySelector("#list-search").classList.remove("show"));

addPhotoPanel.addEventListener("click", (e) => inputFile.click());


inputFile.addEventListener('change', (e) => uploadPhoto(e.target.files));


const save = (e) => {
    e.preventDefault();
    if(!verifyAllForm()){

        const params = new URLSearchParams(window.location.search)

        let adModify = {"id":params.get('q')}
        
        createChangedArray().forEach(data => {
            if(data.changed){
                Object.keys(data).forEach(key => {
                    if(key !== "changed"){
                        adModify[key] = data[key]
                    }
                })
            }
        })



        const form_data = new FormData();
        Object.keys(adModify).forEach(key => {
            if(key === "images"){
                adModify[key].forEach((data,i) => {
                    let index = i+1;
                    if(data.id === null){
                        form_data.append(`Picture${index}`, 'delete');
                    } else {
                        if(data.type !== "server"){
                            form_data.append(`${index}`, data.file);
                        }
                        
                    }
                   
                })
            } else {
                form_data.append(key, adModify[key]);
            }
        })

        for (const pair of form_data.entries()) {
            console.log(`${pair[0]}, ${pair[1]}`);
          }

    
        fetch('Controllers/ControllerEditAdvert.php',{
            method: 'POST',
            body: form_data
        }).then(function (response) {
            return response.json();
        }).then(function (data) {
            document.location.href = "../fr/my-adverts";
        }).catch(function (err) {
            addError(err);
            console.log(err)
        });


    } else {
        addError("un problème est survenue");
    }
}


const verifyAllForm = () => { 
    return (historyForm.title === titleInput.value && 
            historyForm.place === placeInput.value && 
            historyForm.rubric === rubricInput.value && 
            historyForm.level === levelInput.value && 
            historyForm.description === descriptionInput.value && 
            historyForm.instruments === instrumentsInput.innerText && 
            historyForm.images === listPhotos);
}

const createChangedArray = () => {
    return [{"title":titleInput.value, "changed":historyForm.title !== titleInput.value},
    {"place":placeInput.value, "changed": historyForm.place !== placeInput.value},
    {"level":rubricInput.value, "changed": historyForm.rubric !== rubricInput.value},
    {"rubric":levelInput.value, "changed": historyForm.level !== levelInput.value},
    {"description":descriptionInput.value, "changed": historyForm.description !== descriptionInput.value},
    {"instruments":instrumentsInput.innerText, "changed": historyForm.instruments !== instrumentsInput.innerText},
    {"images":listPhotos, "changed": historyForm.images !== listPhotos}]
}


const activeSubmitButton = () => {
    if(!verifyAllForm()){
        document.querySelector('#btn-submit').classList.add("active");
        document.querySelector('#btn-submit').disabled=false;
    } else {
        document.querySelector('#btn-submit').classList.remove("active");
        document.querySelector('#btn-submit').disabled=true;
    }
}


signup_form.addEventListener("submit", e => save(e));

signup_form.addEventListener("change", () => activeSubmitButton());