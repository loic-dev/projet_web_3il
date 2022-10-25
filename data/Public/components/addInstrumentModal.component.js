import {regex_input_text} from '../js/regex.js'
import EventBus from "../js/eventBus.class.js";

const template = document.createElement('template');
template.innerHTML = `
<link rel="stylesheet" href="Public/components/addInstrumentModal.style.css">
<div class="overlay-modal">
  <div class="modal">
    <div class="header-container">
        <span>Ajouter un instrument</span>
        <em id="close-icon" class="fa-times svg-primary-grey icon-30"> </em>
        
    </div>
    <div class="body-container">
        <input type="text" name="instrument" id="inst-input" placeholder="Trompette" required>
        <small id="error"></small>
    </div>
    
    <div class="footer-container">
        <button>Ajouter</button>
    </div>
  </div>
</div>`;

export default class AddInstrumentModal extends HTMLElement{
 constructor(){
     super();
     this.attachShadow({ mode: 'open'});
     this.shadowRoot.appendChild(template.content.cloneNode(true)); 
 } 

 close(e){
    this.shadowRoot.querySelector(".modal").classList.add("close");
    setTimeout(() => {
        this.remove();
    }, 300); 
 }

 addInstrument = () => {
    let value = this.shadowRoot.querySelector("input").value;
    if(regex_input_text(value)){
        EventBus.fire("addInstrument",{value});
        this.close();
    } else {
        console.log("c'est pas bon")
    }
 }






 connectedCallback(){
    this.shadowRoot.querySelector("#close-icon").addEventListener("click", (e) => this.close(e));
    this.shadowRoot.querySelector("button").addEventListener("click", (e) => this.addInstrument(e));
 }

 disconnectedCallback(){
    console.log("unmount")
 }

 
}
window.customElements.define('modal-instrument', AddInstrumentModal);
 