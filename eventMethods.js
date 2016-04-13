
var vw;
var vh;
var vmin;
var vmax;
function toPx(value) {
    return value + "px";
}

function setStyles() {
    vw = window.innerWidth / 100;
    vh = window.innerHeight / 100;
    vmin = Math.min(vw, vh);
    vmax = Math.max(vw, vh);
    setCSS_header();
    setCSS_navigation();
    setCSS_logoImage();
    setCSS_textLinks();
    setCSS_form1();
    setCSS_input();
}

function setCSS_header() {
    var style = document.getElementById('header').style;
    style.top = toPx(1.25 * vmin);
    style.fontSize = toPx(2.5 * vmin);
    style.width = toPx(100 * vw);
}

function setCSS_navigation() {
    var style = document.getElementById('navigation').style;
    style.height = toPx(10 * vmin);
    style.top = toPx(2.5 * vmin);
    style.width = toPx(100 * vw);

}
function setCSS_logoImage() {
    var style = document.getElementById('logoImage').style;
    style.width = toPx(20 * vmin);
    style.top = toPx(-5 * vmin);
}
function setCSS_textLinks() {
    var style = document.getElementById('textLinks').style;
    var logo = document.getElementById('logoImage');
    style.fontSize = toPx(2.5 * vmin);
    style.left = toPx(1);
    style.right = toPx(1);
    style.bottom = toPx(3.25 * vmin);
}
function setCSS_form1() {
    var style = document.getElementById('form1').style;
    style.width = toPx(100 * vmin);

    style.top = toPx(8 * vmin);
}
function setCSS_input() {
    var inputs = document.querySelectorAll('input');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].style.fontSize =toPx(5*vmin);
        inputs[i].style.width=toPx(45*vmin);
        
      
    }

}



    