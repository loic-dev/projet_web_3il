// window.addEventListener("load", (e) => {

//     let elements = document.getElementById("index_map").getElementsByTagName("path");
//     let tooltip = document.getElementById("tooltip");
    
//     function cleanAllPath () {
//         for (const element of elements) {
//             element.style = "fill : inherit;"
//         }
//     }
    
//     for (const element of elements) {
//         element.addEventListener('click', (e)=> {
//             cleanAllPath();
//             e.target.style = "fill : red;";

//             document.getElementById("search_title").innerText = "Annonce :" + e.target.id.slice(4);

//             // cleanAllAdvert();
//             // fetchAdvert("Millau-1");

//             // console.log(e.target.id);
//         }, false);
//         element.addEventListener('mouseenter', (e)=> {
//             tooltip.style.display = "block";
//         }, false);
//         element.addEventListener('mouseleave', (e)=> {
//             tooltip.style.display = "none";
//         }, false);
//         element.addEventListener('mousemove', (e)=> {
//             tooltip.innerHTML = e.target.id;
//             tooltip.style.left = e.pageX + 'px';
//             tooltip.style.top = e.pageY + 'px';
//         }, false);
//     }
// })

