





export const createModal = (title, body, footer) => {
    console.log(title)

    const close = (e) => {
        document.querySelector("#close-icon").removeEventListener("click", (e) => close(e));

        document.querySelector(".modal").classList.add("close");
        setTimeout(() => {
            document.querySelector('.overlay-modal').remove();
        }, 300); 
     }

    const template = `
        <div class="overlay-modal">
            <div class="modal">
                <div class="header-container">
                    <span>${title}</span>
                    <em id="close-icon" class="fa-times svg-primary-grey icon-30"> </em>
                </div>
                <div class="body-container">
                    ${body}
                </div>
                
                <div class="footer-container">
                    ${footer}
                </div>
            </div>
        </div>`
    document.querySelector('body').prepend(document.createRange().createContextualFragment(template));
    document.querySelector("#close-icon").addEventListener("click", (e) => close(e));

}