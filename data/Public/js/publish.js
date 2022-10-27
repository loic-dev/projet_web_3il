import AddInstrumentModal from "../components/addInstrumentModal.component.js";
import EventBus from "./eventBus.class.js";
import {regex_input_text,regex_input_alphaNum} from "./regex.js"



let signup_form = document.getElementById("publish-add-form");
let titleInput = document.getElementById("title-input");
let placeInput = document.getElementById("place-input");
let levelInput = document.getElementById("level-input");
let descriptionInput = document.getElementById("desc-input");
let listInstrument = [{
        "name":"Guitare",
        "icon":"guitar"},
    {
        "name":"Batterie",
        "icon":"drum"
    },
    {
        "name":"Piano",
        "icon":"piano"
    },
    {
        "name":"Saxophone",
        "icon":"saxophone"
    },
    {
        "name":"violon",
        "icon":"violin"
    }
]


let instrumentsInput = {
    "id":0,
    "name":"Guitare",
    "icon":"guitar"
}


console.log(AddInstrumentModal)

let button_submit = document.getElementById("btn-submit");
let addPhotoPanel = document.getElementById("panel-add-photos");
let inputFile = document.getElementById("file-input");
let containerPhoto = document.querySelector(".container-photos");
var listPhotos = [];
let previewSelect = 0;
let notPreviewImg = document.querySelector('.not-img-preview')
let backPreview = document.querySelector('#back');
let nextPreview = document.querySelector('#next');

const reader = new FileReader();


let containerInstrument = document.querySelector(".container-instruments");
let title = "";

const updateViewInstruments = () => {

    document.querySelectorAll('.panel-instruments').forEach(node => {
        node.remove();
    })


    listInstrument.forEach((instruments,i) => {
        console.log(instruments)
        let view = `<span id="panel-instrument-${i}" class="${instrumentsInput.id === i ? `select panel-instruments` : `panel-instruments`}">
            <em class="fa-${instruments.icon} svg-primary-grey icon-30"></em>
            <p>${instruments.name}</p>
        </span>` 
        let element = document.createRange().createContextualFragment(view);
        containerInstrument.append(element);
        instruments.id = i;
        document.querySelector(`#panel-instrument-${i}`).addEventListener("click", e => selectInstrument(instruments));
    })
}


const updatePreviewInstrument = () => {
    let preview = `
        <em class="fa-${instrumentsInput.icon} svg-white icon-30"></em>
        <span>${instrumentsInput.name}</span>
    `
    document.querySelector('#preview-icon-insts').innerHTML = preview;
}


updateViewInstruments();
updatePreviewInstrument();




function selectInstrument(instruments){
    instrumentsInput = instruments;
    updateViewInstruments();
    updatePreviewInstrument();
}

const setDescription = (value) => {
    if(value === ""){
        document.querySelector('#panel-desc-text').innerText = "Description";
    } else {
        document.querySelector('#panel-desc-text').innerText = value;
        
    }
}

const setPlace = (value) => {
    console.log(value)
    if(value === ""){
        document.querySelector('#panel-place').innerText = "Adresse";
    } else {
        document.querySelector('#panel-place').innerText = value;
        
    }
}

const setTitle = (value) => {
    title=value;
    if(value === ""){
        document.querySelector('#ad-title').innerText = "Titre de l'annonce";
    } else {
        document.querySelector('#ad-title').innerText = value;
        
    }
}

descriptionInput.addEventListener("keyup", e => setDescription(e.target.value))


const uniqId = () => {
    return Math.floor((1 + Math.random()) * 0x10000)
        .toString(16)
        .substring(1);
  }


let idPhoto = null;

const uploadPhotos = async (e) => {

    var listFile = [];
    for (let index = 0; index < 3; index++) {
        listFile.push(e.target.files[index]);
    }

    if(listPhotos.length < 3){
        for (const file in listFile) {
            idPhoto = uniqId();
            reader.readAsDataURL(file);
            listPhotos.push({
                id:idPhoto,
                file:file
            })
            inputFile.value = "";
        }
    }
    
}


function uploadPhoto(files) {

    var reader = new FileReader(); 
    
    
    const readFile = (index) => {
      if( index >= 3 || index >= files.length ) {
        inputFile.value = "";
        return;
      }

      

      var file = files[index];
      console.log(file)
      idPhoto = uniqId();
      listPhotos.push({
        id:idPhoto,
        file:file
      })


      reader.onload = function(e) {  
        var bin = e.target.result;
        listPhotos[listPhotos.findIndex(data => data.id === idPhoto)].preview = e.target.result;
        idPhoto = null;
        readFile(index+1);
      }

      reader.readAsDataURL(file);
    }
    readFile(0);
    updateViewPhoto();
}



const remove = (e,id) => {
    listPhotos.splice(listPhotos.findIndex(data => data.id === id), 1);
    updateViewPhoto();
}


const updateStateImgPreview = () => {
    if(listPhotos.length < 2){
        backPreview.classList.add('not');
        nextPreview.classList.add('not');
    } else if(listPhotos.length >= 2 && previewSelect === 0){
        backPreview.classList.add('not');
        nextPreview.classList.remove('not')
    } else if(listPhotos.length >= 2 && previewSelect == listPhotos.length-1){
        backPreview.classList.remove('not');
        nextPreview.classList.add('not')
    } else {
        backPreview.classList.remove('not');
        nextPreview.classList.remove('not');
    }

}

const movePreview = (direction) => {
    console.log(direction)
    let nextSelect = null;
    let value = 0;
    if(previewSelect === 3){
        nextSelect = 0;
    } else if(direction === '-'){
        nextSelect = previewSelect+1;
        
    } else {
        nextSelect = previewSelect-1;
    }
    value=nextSelect*100;
    console.log(value);
    previewSelect = nextSelect;
    updateStateImgPreview();
   
   
    let allnode = document.querySelectorAll('.img-preview');
    allnode.forEach(node => {
        node.style.transform = `translate(-${value}%,0)`;
    })
}




const updateViewPhoto  = () => {


    //delete state list photos
    let getNodePhotos = document.querySelectorAll(".edit-photo-span");
    getNodePhotos.forEach((node,i) => {
        node.removeEventListener("click",(e) => remove(e,i), true);
        node.remove();
    })

    


    //delete preview state
    let getNodePreviewPhotos = document.querySelectorAll(".img-preview");
    getNodePreviewPhotos.forEach((node,i) => {
        node.remove();

    })



    if (listPhotos.length > 1 && nextPreview.getAttribute('listener') !== 'true') {
        nextPreview.addEventListener("click", (e) => movePreview("-"))
        nextPreview.setAttribute('listener', 'true');
    }

    if (listPhotos.length > 1 &&  backPreview.getAttribute('listener') !== 'true') {
        backPreview.addEventListener("click", (e) => movePreview("+"))
        backPreview.setAttribute('listener', 'true');
    }


    console.log(listPhotos)

    listPhotos.forEach((link) => {

        console.log(link)

        /*input photos*/
        let newPhotoEditComponent = `
            <span id="edit-photo-span-${link.id}" style="background-image: url('${link.preview}');" class="edit-photo-span">
                <span class="overlay"></span>
                <em class="deleteIcon fa-trash svg-primary-grey icon-30"> </em>
            </span>`
        containerPhoto.prepend(document.createRange().createContextualFragment(newPhotoEditComponent));
        document.getElementById(`edit-photo-span-${link.id}`).addEventListener("click", (e) => remove(e,link.id));



        /* preview photos */
        let newPhotoPreview = `<span id="img-preview-${link.id}" style="background-image: url('${link.preview}');" class="img-preview" ></span>`
        document.querySelector('#preview-img-container').prepend(document.createRange().createContextualFragment(newPhotoPreview));
    })


    updateStateImgPreview();

    
    

    


    

   
    
    
    if(listPhotos.length > 0){
        notPreviewImg.classList.add('unshow');
    } else {
        notPreviewImg.classList.remove('unshow');
        backPreview.classList.add('not');
        nextPreview.classList.add('not')
    }
    

    
    
    
    
    
    if(listPhotos.length >= 3) {
        addPhotoPanel.classList.add("unshow")
        addPhotoPanel.classList.remove("show")
    } else {
        addPhotoPanel.classList.remove("unshow")
        addPhotoPanel.classList.add("show")
    }
}   


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
    setPlace(data.label);
    placeInput.value = data.label;
    document.querySelector('#panel-place').innerText = value;
    document.querySelector("#list-search").classList.remove("show");
}

const searchPlace = (value) => {

    setPlace(value);

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
            console.log(err)
        });
    } else {
        document.querySelector("#list-search").classList.remove("show");
    }
   
    
}


const changeLevelPreview = (value) => {
    document.getElementById('level-preview').innerHTML = "Niveau : "+value;
}
changeLevelPreview(levelInput.value);



placeInput.addEventListener('keyup', (e) => searchPlace(e.target.value));
placeInput.addEventListener('focusout', (e) => document.querySelector("#list-search").classList.remove("show"))


levelInput.addEventListener('change', (e) => changeLevelPreview(e.target.value));



titleInput.addEventListener("keyup", (e) =>  setTitle(e.target.value))
addPhotoPanel.addEventListener("click", (e) => inputFile.click());


inputFile.addEventListener('change', (e) => uploadPhoto(e.target.files));

const showModalAddInstruments = () => {
    let viewModal = `<modal-instrument>

    </modal-instrument>`
    document.querySelector('body').prepend(document.createRange().createContextualFragment(viewModal));
}

document.querySelector('#add-instruments').addEventListener("click", (e) => showModalAddInstruments());


EventBus.register("addInstrument", (evt) => {
    console.log(evt)
    let newSelection = {
        "name":evt.detail.value,
        "icon":"music"
    }
    newSelection.id = listInstrument.length;
    listInstrument.push(newSelection);
    selectInstrument(newSelection);
});


const publish = (e) => {
    e.preventDefault();
    if(verifyAllForm()){

    

        let ad = {
            "title":titleInput.value,
            "place":placeInput.value,
            "level":levelInput.value,
            "description":descriptionInput.value,
            "instruments":instrumentsInput.name,
            "images":listPhotos
        }

        const form_data = new FormData();
        Object.keys(ad).forEach(key => {
            if(key === "images"){
                ad[key].forEach((data,i) => {
                    form_data.append(`image-${i}`, data);
                })
            } else {
                form_data.append(key, ad[key]);
            }
        })

        console.log(...form_data)
        

       




        fetch('Controllers/controllerAd.php',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: form_data
        }).then(function (response) {
            return response.json();
        }).then(function (data) {
            console.log(data)
        }).catch(function (err) {
            addError(err);
        });
    } else {
        addError("un problème est survenue");
    }
}


const verifyAllForm = () => {
    return titleInput.value && regex_input_alphaNum(titleInput.value) &&
    placeInput.value && regex_input_alphaNum(placeInput.value) &&
    levelInput.value && regex_input_alphaNum(levelInput.value) &&
    descriptionInput.value && instrumentsInput.name;
}


const activeSubmitButton = () => {
    if(verifyAllForm()){
        document.querySelector('#btn-submit').classList.add("active");
        document.querySelector('#btn-submit').disabled=false;
    } else {
        document.querySelector('#btn-submit').classList.remove("active");
        document.querySelector('#btn-submit').disabled=true;
    }
}


signup_form.addEventListener("submit", e => publish(e));

signup_form.addEventListener("change", () => activeSubmitButton());