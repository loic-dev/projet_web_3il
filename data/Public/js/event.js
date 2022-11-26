let cantonSelected = "Millau-1";
let iterator = 0;

function createNewAtelier(title, img = "/public/media/NoPic.png", structureName, id) {
    let domNode = document.createElement('a')
    domNode.classList.add("atelier");
    domNode.href = "./advert?q=" + id;

    if(img !== "/public/media/NoPic.png") {
      img = img.substring(0,img.indexOf("."))+ ".webp";
    }
    // console.log();
    domNode.innerHTML = `
            <img src="${img}"/>
            <p>${title}</p>
            <p>${structureName}</p>
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

    let domNode = document.createElement('div')
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
        if(element["Picture1"] === "") element["Picture1"] = undefined;
        createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"], element["IdAdvert"]);
      });
      hiddenSpanToLoad();
  }
}

// function fetchRandomAdvertRodez() {
//   fetch('./Controllers/searchAdvert.php',{
//     method: 'POST',
//     headers: {
//         'Accept': 'application/json',
//         'Content-Type': 'application/json',
//     },
//     body: JSON.stringify({title:resultInput, rubric:category,instrument:instrument, level:level, canton:cantonSelected.substring(1), limit:7})
//   }).then(function (response) {
//     return response.json();
//   }).then(function (data) {
//     console.log(data);
//     if(data.length < 1) {
//       let domNode = document.createElement('div')
//       domNode.innerHTML = `
//               <p>Aucun resultat pour Rodez</p>
//       `;
//       document.getElementById("display_event").appendChild(domNode);
//     }

//     data.forEach(element => {
//       console.log(element);
//       createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"], element["IdAdvert"]);
//     });

//   }).catch(function (err) {
//     console.log(err)
//   });
// }

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
    // cantonSelected = element.id.slice(5);
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

  // fetchAdvert(cantonSelected);
  // document.getElementById("1216 Rodez-1").click();

  document.getElementById("searchAdvertBtn").addEventListener("click",()=> {
    let resultInput = document.getElementById("inputSearchAdvert").value;
    let category = document.getElementById("rubric-select").value;
    let instrument = document.getElementById("insturment-select").value;
    let level = document.getElementById("level-select").value;
  
    console.log(JSON.stringify({title:resultInput, category:category,instrument:instrument, level:level, canton:cantonSelected}));
  
    fetchAdvert(resultInput,category,instrument,level,cantonSelected);
  
  });

})


























// function fetchAdvert(canton = "Rodez-1") {
//   fetch('./Controllers/controllerIndex.php',{
//     method: 'POST',
//     headers: {
//         'Accept': 'application/json',
//         'Content-Type': 'application/json',
//     },
//     body: JSON.stringify({canton:canton})
//   }).then(function (response) {
//     console.log("test");
//     return response.json();
//   }).then(function (data) {
//     let i = 0;
//     data.forEach(element => {
//       ++i;
//       createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"],element["IdAdvert"]);
//     });
//     if(i < 6) {
//       while(i < 6) {
//         createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"],element["IdAdvert"]);
//         ++i;
//       }
//     }
//     hiddenSpanToLoad();


    


//   }).catch(function (err) {
//     // console.log(err)
//   });
// } 


    // hiddenSpanToLoad();

    // function removeActualSpan() {
    //   document.getElementById("testHidden").remove();
    // }
    
    // let observer = new IntersectionObserver(function(entries) {
    //   if(entries[0].isIntersecting === true) {
     
    //     fetchAdvert();
    
    //     removeActualSpan();
    //     hiddenSpanToLoad();
    //     observer.observe(document.querySelector("#testHidden"));
    //   }
    // }, { threshold: [1] });
    
    // observer.observe(document.querySelector("#testHidden"));


// hiddenSpanToLoad();

