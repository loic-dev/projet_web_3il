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

function fetchAdvert(canton = "Millau-1") {
  fetch('./Controllers/controllerIndex.php',{
    method: 'POST',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({canton:canton})
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    data.forEach(element => {
      console.log(element)
      createNewAtelier(element["Title"],element["Picture1"],element["MailStructure"]);
    });
    hiddenSpanToLoad();


    function removeActualSpan() {
      document.getElementById("testHidden").remove();
    }
    
    let observer = new IntersectionObserver(function(entries) {
      if(entries[0].isIntersecting === true) {
     
        fetchAdvert();
    
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
fetchAdvert();




// createNewAtelier();
// createNewAtelier();
// createNewAtelier();
// createNewAtelier();
// createNewAtelier();
// createNewAtelier();

// hiddenSpanToLoad();

