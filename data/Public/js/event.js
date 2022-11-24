function createNewAtelier(title, img, structureName) {
    let domNode = document.createElement('div')
    domNode.classList.add("atelier");
    domNode.innerHTML = `
            <img src="${img}"/>
            <p>${title}</p>
            <p>${structureName}</p>
    `;
    
    document.getElementById("display_event").appendChild(domNode);
}

function hiddenSpanToLoad() {
  let domNode = document.createElement('span');
  domNode.id = "testHidden"
  domNode.innerText = "Chargement de nouvelle offre ..."
  domNode.style = "height:15px"
  document.getElementById("display_event").appendChild(domNode);
}

let display_content = document.getElementById("display_event");

function cleanAllAdvert() {
  document.getElementById("display_event").innerHTML = "";
}

function fetchAdvert(canton = "Rodez-1") {
  fetch('./Controllers/controllerIndex.php',{
    method: 'POST',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({canton:canton})
  }).then(function (response) {
    console.log("test");
    return response.json();
  }).then(function (data) {
    let i = 0;
    data.forEach(element => {
      ++i;
      createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"]);
    });
    if(i < 6) {
      while(i < 6) {
        createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"]);
        ++i;
      }
    }
    hiddenSpanToLoad();

    function removeActualSpan() {
      document.getElementById("testHidden").remove();
    }
    
    let observer = new IntersectionObserver(function(entries) {
      if(entries[0].isIntersecting === true) {
     
        // fetchAdvert();
    
        removeActualSpan();
        hiddenSpanToLoad();
        observer.observe(document.querySelector("#testHidden"));
      }
    }, { threshold: [1] });
    
    observer.observe(document.querySelector("#testHidden"));

  }).catch(function (err) {
    // console.log(err)
  });
} 

let cantonSelected = "Millau-1";

window.addEventListener("load", (e) => {

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
    cantonSelected = element.id.slice(4);
  
    // document.getElementById("search_title").innerText = "Annonce :" + element.id.slice(4);
  }
  
  for (const element of elements) {
      element.addEventListener('click', (e)=> {
          setClick(e.target);

          // console.log(e.target.id);
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

  setClick(document.getElementById("1216 Rodez-1"));
  cleanAllAdvert();
  
  fetchAdvert(cantonSelected);


  // document.getElementById("1216 Rodez-1").click();

})

document.getElementById("searchAdvertBtn").addEventListener("click",()=> {
  let resultInput = document.getElementById("inputSearchAdvert").value;
  let category = document.getElementById("insturment-select").value;
  let instrument = document.getElementById("category-select").value;
  let level = document.getElementById("pet-select").value;

  // console.log(resultInput);
  // console.log(category);
  // console.log(instrument);
  // console.log(level);
  // console.log(cantonSelected);


  console.log(JSON.stringify({title:resultInput, category:category,instrument:instrument, level:level, canton:cantonSelected}));

  fetch('./Controllers/searchAdvert.php',{
    method: 'POST',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({title:resultInput, category:category,instrument:instrument, level:level, canton:cantonSelected, limit:7})
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    console.log(data);
    // data.forEach(element => {
    //   console.log(element);
    //   createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"]);
    // });
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

  }).catch(function (err) {
    console.log(err)
  });



});


// createNewAtelier();
// createNewAtelier();
// createNewAtelier();
// createNewAtelier();
// createNewAtelier();
// createNewAtelier();

// hiddenSpanToLoad();

