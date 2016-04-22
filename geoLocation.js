function haversine(theta) {
    return Math.pow(Math.sin(theta / 2), 2);
}
function latLongToKm(lat1, long1, lat2, long2) {
    var dlat = Math.abs(lat1 - lat2);
    var dlong = Math.abs(long1 - long2);
    var radius = 6371;
    var HDR = haversine(dlat * Math.PI / 180) +
            Math.cos(lat1 * Math.PI / 180) *
            Math.cos(lat2 * Math.PI / 180) *
            haversine(dlong * Math.PI / 180);

    return 2 * radius * Math.asin(Math.sqrt(HDR));
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getCoords);
    }
}

function getCoords(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
}
