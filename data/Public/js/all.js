window.onbeforeunload = function () {
    window.scrollTo(0, 0);
}
  
window.addEventListener('load', () => {
    document.querySelector('body').classList.remove('preload');
})

