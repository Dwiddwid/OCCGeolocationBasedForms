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
    
    <body onload="getLocation()">

    <p>This is a test of geolocation. Your location will be displayed below.</p>


    <p id="demo"></p>

    <div id="map"></div>



    <script>
    var x = document.getElementById("demo");

    function getLocation() {
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


    </body>


    <form action="PeopleAdded.php" method="post">
    First Name: <input type="text" name="first"><br>
    Last Name: <input type="text" name="last"><br>
    Suffix: <input name="suffix" type="text" size="5" maxlength="5"><br>
    Street: <input type="text" name="street"><br>
    City: <input type="text" name="city"><br>
    Zip: <input name="zip" type="text" size="5" maxlength="5"><br>
    State: <select name="State" size="1" id="State">
    <option value="AK">Alaska</option>
    </select><br>
    Mailing: <input type="text" name="mailing"><br>
    Phone: <input type="text" name="phone"><br>
    Email: <input type="text" name="email"><br>
    Church: <select name="church" size="1" id="church">
      <option value="NULL" selected="selected"></option>';
<?php
    require_once('OCCSQLI_Connect.php');

    $query = 'SELECT officialName FROM organization WHERE organizationID = 1 ORDER BY officialName/;';

    $response = mysqli_query($dbc, $query);

    if ($response) {
        while ($row = mysqli_fetch_array($response)) {
            echo '<option value="' . $row['officialName'] . '">' . $row['officialName'] . '</option>';
        }
    }
    mysqli_close($dbc);

    print '</select>';
    print '<br>';
    print '<input type="Submit">';
    print '</form>';
    ?>
</html>
