var tag = document.getElementById("demo");

function onLoad_Body() {
    getLocation();
}
function getLocation() {
    var nav = navigator.geolocation;
    if (nav) {
        nav.getCurrentPosition(showPosition);
    } else {
        tag.innerHTML = "Geolocation is not supported by this browser.";
    }
}


function showPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    tag.innerHTML = "<p>";
    tag.innerHTML += "(" + lat.toFixed(2);
    tag.innerHTML += ",&nbsp;";
    tag.innerHTML += lon.toFixed(2);
    tag.innerHTML += ")</p>";
}

   