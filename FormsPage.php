<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>This is a test of geolocation. Your location will be displayed below.</p>

    <!--    <button onclick="getLocation()">Click for location</button>-->

    <p id="demo"></p>

    <div id="map"></div>



    <script>
        var x = document.getElementById("demo");

        window.onload = function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                    "<br>Longitude: " + position.coords.longitude;
        }
    </script>
        <?php
        // put your code here
        ?>
    </body>
</html>
