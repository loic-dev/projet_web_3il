let cantonSelected = "Millau-1";
let iterator = 0;

function createNewAtelier(element) {
// element["Title"],element["Picture1"],element["MailStructure"], element["IdAdvert"]

let domNode = document.createElement('a');
domNode.classList.add("atelier");
domNode.id = element["IdAdvert"];

domNode.href = "./advert?q=" + element["IdAdvert"];
    let img = undefined;
    if(element["Picture1"] === "") {
      img = "/public/media/NoPic.png";
    } else {
      img = element["Picture1"].substring(0,element["Picture1"].indexOf("."))+ ".webp";
    }

    let observer = new IntersectionObserver(function(entries) {
      if(entries[0].isIntersecting === true) {
        document.getElementById(element["IdAdvert"] + "photo").style = `background-image:url(${img})`;
      }
      }, { threshold: [1] });  
      observer.observe(domNode);

      


    
    
    domNode.innerHTML = `
    <div class="photo-container" id="${element["IdAdvert"] + "photo"}" ></div>
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
  let onlyOne = false;
  let domNode = document.createElement('span');
  domNode.id = "testHidden"
  domNode.classList.add("liner");
  domNode.innerText = "Chargement de nouvelles annonces ..."
  domNode.style = "height:15px"
  document.getElementById("display_event").appendChild(domNode);
  
  let observer = new IntersectionObserver(function(entries) {
  if(entries[0].isIntersecting === true && !onlyOne) {
    onlyOne = true;
    let resultInput = document.getElementById("inputSearchAdvert").value;
    let category = document.getElementById("rubric-select").value;
    let instrument = document.getElementById("insturment-select").value;
    let level = document.getElementById("level-select").value;
    
    console.log(JSON.stringify({title:resultInput, category:category,instrument:instrument, level:level, canton:cantonSelected}));
    
    iterator += 6;
    setTimeout(()=> {
      fetchAdvert(resultInput,category,instrument,level,cantonSelected, iterator, false);  
    }, 200);
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

function fetchAdvert(resultInput,category,instrument,level,cantonSelected, limit = 0, reset = true) {
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
    if(reset) removeAllAtelier();
    setCantonTitle(cantonSelected);
    console.log(data);
    data.numberOfResult.forEach(element => {
      document.getElementById(element[1]).setAttribute("var",element[0]);
    });
    if(data.advert < 1 && limit > 0) {
      removeActualSpan();
      addLinerResultEnded();
    } else if(limit > 0) {
      removeActualSpan();
      addAllAdvert(data.advert);
    } else {
      addAllAdvert(data.advert);
    }
  }).catch(function (err) {
    console.log(err)
  });
}

function addLinerNoResult() {
  let domNode = document.createElement('div');
  domNode.classList.add("liner");
  domNode.innerHTML = `
          <p>Aucun resultat</p>
  `;
  document.getElementById("display_event").appendChild(domNode);
}

function addLinerResultEnded() {
    let domNode = document.createElement('div');
    domNode.classList.add("liner");
    domNode.innerHTML = `<p>Fin des resultats</p>`;
    document.getElementById("display_event").appendChild(domNode);
    // removeActualSpan();
}

function addAllAdvert(data) {
  data.forEach(element => {
    createNewAtelier(element);
  });
  hiddenSpanToLoad();

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
          tooltip.innerHTML = e.target.id + '\n'
          if(e.target.getAttribute("var") !== null) {
            let $nbRes = e.target.getAttribute("var");
            tooltip.innerHTML += "( " + e.target.getAttribute("var");
            if($nbRes === 1) {
              tooltip.innerHTML += " annonce" + " )";
            } else {
              tooltip.innerHTML += " annonces" + " )";
            }
          } else {
            tooltip.innerHTML += "( 0 annonce )";
          }
          tooltip.style.left = e.pageX + 'px';
          tooltip.style.top = e.pageY + 'px';
      }, false);
  }

  setClick(document.getElementById("Rodez-1"));
  cleanAllAdvert();

  fetchAdvert(undefined,undefined,undefined,undefined,"Rodez-1");

  document.getElementById("searchAdvertBtn").addEventListener("click",()=> {
    iterator = 0;
    document.getElementById('display_event').scrollTop = 0;
    let resultInput = document.getElementById("inputSearchAdvert").value;
    let category = document.getElementById("rubric-select").value;
    let instrument = document.getElementById("insturment-select").value;
    let level = document.getElementById("level-select").value;  
    fetchAdvert(resultInput,category,instrument,level,cantonSelected);
  });

})