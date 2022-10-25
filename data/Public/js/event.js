function createNewAtelier() {
    let domNode = document.createElement('div')
    domNode.classList.add("atelier");
    domNode.innerHTML = `
            <img src="tset.jpg"/>
            <p>Atelier Trompette</p>
            <p>Nom de la structure</p>
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
// console.log("tes")

createNewAtelier();
createNewAtelier();
createNewAtelier();
createNewAtelier();
createNewAtelier();
createNewAtelier();

hiddenSpanToLoad();

function removeActualSpan() {
  document.getElementById("testHidden").remove();
}

let observer = new IntersectionObserver(function(entries) {
  if(entries[0].isIntersecting === true) {
    createNewAtelier();
    createNewAtelier();
    createNewAtelier();
    createNewAtelier();
    createNewAtelier();
    createNewAtelier();

    removeActualSpan();
    hiddenSpanToLoad();
    observer.observe(document.querySelector("#testHidden"));
  }
}, { threshold: [1] });

observer.observe(document.querySelector("#testHidden"));