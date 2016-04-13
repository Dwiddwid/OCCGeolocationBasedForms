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
    setCSS_imageLinks();
    setCSS_donorImage();
    setCSS_eventImage();
    setCSS_volunteerImage();

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
    style.left = toPx(logo.width);
    style.right = toPx(1);
    style.bottom = toPx(3.25 * vmin);
}
function setCSS_imageLinks() {
    var style = document.getElementById('imageLinks').style;
    style.fontSize = toPx(2.5 * vmin);
    style.top = toPx(10 * vmin);
    style.width = toPx(100 * vw);
}
function setCSS_donorImage() {
    var style = document.getElementById('dropoffImage').style;
    style.height = toPx(25 * vmin);
    style.width = toPx(25 * vmin);
}

function setCSS_eventImage() {
    var style = document.getElementById('eventImage').style;
    style.height = toPx(25 * vmin);
    style.width = toPx(25 * vmin);
}
function setCSS_volunteerImage() {
    var style = document.getElementById('volunteerImage').style;
    style.height = toPx(25 * vmin);
    style.width = toPx(25 * vmin);
}




