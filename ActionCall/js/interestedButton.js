var clicks = 0;
var clicked = 1;
function UpdateClickCount(){
    clicks += clicked;
    clicked *= -1;
    document.getElementById("interested").innerHTML = clicks;
    element = document.querySelector('.container'); 
    element.style.visibility = 'visible'; 
}