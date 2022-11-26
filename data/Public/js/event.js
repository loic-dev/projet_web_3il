let cantonSelected = "Millau-1";
let iterator = 0;

function createNewAtelier(element) {
// element["Title"],element["Picture1"],element["MailStructure"], element["IdAdvert"]

let domNode = document.createElement('span');
domNode.classList.add("atelier");
domNode.id = element["IdAdvert"];

domNode.href = "./advert?q=" + element["IdAdvert"];
    let img = undefined;
    if(element["Picture1"] === "") {
      img = "/public/media/NoPic.png";
    } else {
      img = element["Picture1"].substring(0,element["Picture1"].indexOf("."))+ ".webp";
    }
    
    // domNode.innerHTML = `
    //         <img src="${img}"/>
    //         <p>${element["Title"]}</p>
    //         <p>${element["MailStructure"]}</p>
    // `;
    
    domNode.innerHTML = `
          <div class="photo-container" style="background-image:url(${img})"></div>
          <div class="adverts-body-container">
              <div class="a-header">
                  <div class="title-ad-container">
                      <span class="a-title">${element["Title"]}</span>
                      <span class="a-inst">${element["Instrument"]}</span>

                  </div>
                  <span class="a-address">${element["Adress"]}</span>
              </div>
          </div>
    `;
    
    document.getElementById("display_event").appendChild(domNode);
}
 
function removeActualSpan() {
  document.getElementById("testHidden").remove();
}

function hiddenSpanToLoad() {
  let domNode = document.createElement('span');
  domNode.id = "testHidden"
  domNode.innerText = "Chargement de nouvelles annonces ..."
  domNode.style = "height:15px"
  document.getElementById("display_event").appendChild(domNode);
  
  let observer = new IntersectionObserver(function(entries) {
  if(entries[0].isIntersecting === true) {
    let resultInput = document.getElementById("inputSearchAdvert").value;
    let category = document.getElementById("rubric-select").value;
    let instrument = document.getElementById("insturment-select").value;
    let level = document.getElementById("level-select").value;
    
    console.log(JSON.stringify({title:resultInput, category:category,instrument:instrument, level:level, canton:cantonSelected}));
    
    iterator += 6;
    
    fetchAdvert(resultInput,category,instrument,level,cantonSelected, iterator, false);  
    removeActualSpan();

  }
  }, { threshold: [1] });  
  observer.observe(document.querySelector("#testHidden"));
}

function cleanAllAdvert() {
  document.getElementById("display_event").innerHTML = "";
}

function removeAllAtelier() {
  document.getElementById("display_event").innerHTML = '';
}

function setCantonTitle(element) {
  document.getElementById("search_title").innerText = "Annonce : " + element;
}

function fetchAdvert(resultInput,category,instrument,level,cantonSelected, limit = 0, reset=true) {
  fetch('./Controllers/searchAdvert.php',{
    method: 'POST',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({title:resultInput, rubric:category,instrument:instrument, level:level, canton:cantonSelected, limit:limit})
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    setCantonTitle(cantonSelected);
    console.log(data);
    createAllAdvert(data,reset);
  }).catch(function (err) {
    console.log(err)
  });
}

function fetchRandAdvert(limit = 0) {
  fetch('./Controllers/controllerIndex.php',{
    method: 'POST',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({limit:limit})
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    setCantonTitle(cantonSelected);
    console.log(data);
    createAllAdvert(data);

  }).catch(function (err) {
    console.log(err)
  });
}

function createAllAdvert(data,reset) {
  if(reset) removeAllAtelier();

  if(data.length < 1 && reset) {

    let domNode = document.createElement('div');
    domNode.classList.add("liner");
    domNode.innerHTML = `
            <p>Aucun resultat</p>
    `;

    document.getElementById("display_event").appendChild(domNode);
  } else if(data.length < 1 && !reset) {
    let domNode = document.createElement('div');
    domNode.classList.add("liner");
    domNode.innerHTML = `<p>Fin des resultats</p>`;
    document.getElementById("display_event").appendChild(domNode);
    removeActualSpan();
  } else {
      data.forEach(element => {
        console.log(element);
        createNewAtelier(element);
      });
      hiddenSpanToLoad();
  }
}

window.addEventListener("load", (e) => {
  let display_content = document.getElementById("display_event");
  let elements = document.getElementById("index_map").getElementsByTagName("path");
  let tooltip = document.getElementById("tooltip");
  
  function cleanAllPath () {
    for (const element of elements) {
        element.style = "fill : inherit;"
    }
  }
  
  function setClick(element) {
    cleanAllPath();
    element.style = "fill : red;";
    cantonSelected = element.id;
  }
  

  for (const element of elements) {
      element.addEventListener('click', (e)=> {
          setClick(e.target);
      }, false);
      element.addEventListener('mouseenter', (e)=> {
          tooltip.style.display = "block";
      }, false);
      element.addEventListener('mouseleave', (e)=> {
          tooltip.style.display = "none";
      }, false);
      element.addEventListener('mousemove', (e)=> {
          tooltip.innerHTML = e.target.id;
          tooltip.style.left = e.pageX + 'px';
          tooltip.style.top = e.pageY + 'px';
      }, false);
  }

  setClick(document.getElementById("Rodez-1"));
  cleanAllAdvert();

  fetchRandAdvert();

  document.getElementById("searchAdvertBtn").addEventListener("click",()=> {
    let resultInput = document.getElementById("inputSearchAdvert").value;
    let category = document.getElementById("rubric-select").value;
    let instrument = document.getElementById("insturment-select").value;
    let level = document.getElementById("level-select").value;  
    fetchAdvert(resultInput,category,instrument,level,cantonSelected);
  });

})