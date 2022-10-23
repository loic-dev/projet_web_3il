import AddInstrumentModal from "../components/addInstrumentModal.component.js";



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
    "name":"Guitare",
    "icon":"guitar"
}




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
        let view = `<span id="panel-instrument-${i}" class="${instrumentsInput.icon === instruments.icon ? `select panel-instruments` : `panel-instruments`}">
            <em class="fa-${instruments.icon} svg-primary-grey icon-30"></em>
            <p>${instruments.name}</p>
        </span>` 
        let element = document.createRange().createContextualFragment(view);
        containerInstrument.append(element);
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

const uploadPhoto = (e) => {
    const file = e.target.files[0];
    reader.readAsDataURL(file);
    inputFile.value = "";
}

reader.onload = e => {
    if(listPhotos.length < 3){
        listPhotos.push(e.target.result);
        console.log(listPhotos)
        updateViewPhoto();
    }
}

const remove = (e,index) => {
    listPhotos.splice(index, 1);
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




    listPhotos.forEach((link,i) => {



        /*input photos*/
        let newPhotoEditComponent = `
            <span id="edit-photo-span-${i}" style="background-image: url('${link}');" class="edit-photo-span">
                <span class="overlay"></span>
                <em class="deleteIcon fa-trash svg-primary-grey icon-30"> </em>
            </span>`
        containerPhoto.prepend(document.createRange().createContextualFragment(newPhotoEditComponent));
        document.getElementById(`edit-photo-span-${i}`).addEventListener("click", (e) => remove(e,i));



        /* preview photos */
        let newPhotoPreview = `<span id="img-preview-${i}" style="background-image: url('${link}');" class="img-preview" ></span>`
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


inputFile.addEventListener('change', (e) => uploadPhoto(e));

const showModalAddInstruments = () => {
    let viewModal = `<modal-instrument>

    </modal-instrument>`
    document.querySelector('body').prepend(document.createRange().createContextualFragment(viewModal));
}

document.querySelector('#add-instruments').addEventListener("click", (e) => showModalAddInstruments());


