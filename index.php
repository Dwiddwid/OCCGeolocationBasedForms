<!DOCTYPE html >
<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

function insertInto($table, $columns, $values) {
    $query = "INSERT INTO `$table` VALUES (";
    for ($i = 0; $i < count($columns); $i++) {
        if ($i == 0) {
            $query .= "`$columns[$i]`";
        } else {
            $query .= ",`$columns[$i]`";
        }
    }
    $query .= ")(";
    for ($i = 0; $i < count($values); $i++) {
        if ($i == 0) {
            $query .= "\"$values[$i]\"";
        } else {
            $query .= ",\"$values[$i]\"";
        }
    }
    $query .=");";
    return $query;
}

function selectFrom($field, $table) {
    return "SELECT $field FROM `$table`;";
}

function deleteFrom($table, $field, $value) {
    return "DELETE FROM $table WHERE $field='$value';";
}

if (isset($_POST['f8DeleteButton'])) {
    $connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
            OR die('Could not connect to MySQL ' . mysqli_connect_error());

    mysqli_select_db($connection, "occ");

    $query = 'delete from `Event` where eventID=' . $_POST['f8DeleteID'] . ';';
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    unset($_POST['f8DeleteButton']);
    unset($_POST['f8DeleteID']);
}
if (isset($_POST['loginSubmitButton'])) {
    $connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
            OR die('Could not connect to MySQL ' . mysqli_connect_error());

    mysqli_select_db($connection, "occ");

    $query = selectFrom('*', 'Volunteer');
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        if ($_POST['username'] == $row['userName']) {
            if ($_POST['password'] == $row['password']) {
                $_SESSION['username'] = $_POST['username'];
            }
        }
    }

    mysqli_close($connection);
}
if (isset($_POST['logoutSubmitButton'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location:index.php");
}
if (isset($_POST['logoValue'])) {
    header("Refresh:0");
    unset($_POST['logoValue']);
}
if (isset($_POST['anonSubmitButton'])) {
    $connection = mysqli_connect("localhost", "occ", "occ470", "occ")
            OR die('Could not connect to MySQL ' . mysqli_connect_error());

    mysqli_select_db($connection, 'occ');
    $query = "call anonymousDropOff('C99504'," . $_POST['boxes'] . ");";
    mysqli_query($connection, $query);
    mysqli_close($connection);
    unset($_POST['anonSubmitButton']);
}
if (isset($_POST['donorSubmitButton'])) {
    $connection = mysqli_connect("localhost", "occ", "occ470", "occ")
            OR die('Could not connect to MySQL ' . mysqli_connect_error());

    mysqli_select_db($connection, 'occ');
    $query = "call personDropOff("
            . "'" . $_POST['firstName'] . "',"
            . "'" . $_POST['middleName'] . "',"
            . "'" . $_POST['lastName'] . "',"
            . "'" . $_POST['suffix'] . "',"
            . "'" . $_POST['street'] . "',"
            . "'" . $_POST['city'] . "',"
            . "'" . $_POST['zip'] . "',"
            . "'" . $_POST['state'] . "',"
            . "'" . $_POST['phone'] . "',"
            . "'" . $_POST['email'] . "',"
            . "'C99504',"
            . "'" . $_POST['boxes'] . "');";


    mysqli_query($connection, $query);
    mysqli_close($connection);
    unset($_POST['donorSubmitButton']);
    unset($_POST['firstName']);
    unset($_POST['middleName']);
    unset($_POST['lastName']);
    unset($_POST['suffix']);
    unset($_POST['street']);
    unset($_POST['city']);
    unset($_POST['zip']);
    unset($_POST['state']);
    unset($_POST['phone']);
    unset($_POST['email']);
    unset($_POST['boxes']);
}
if (isset($_POST['eventSubmitButton'])) {
    $connection = mysqli_connect("localhost", "occ", "occ470", "occ")
            OR die('Could not connect to MySQL ' . mysqli_connect_error());

    mysqli_select_db($connection, 'occ');
    $query = "call insertAttendee("
            . "'" . $_POST['firstName'] . "',"
            . "'" . $_POST['middleName'] . "',"
            . "'" . $_POST['lastName'] . "',"
            . "'" . $_POST['suffix'] . "',"
            . "'" . $_POST['street'] . "',"
            . "'" . $_POST['city'] . "',"
            . "'" . $_POST['zip'] . "',"
            . "'" . $_POST['state'] . "',"
            . "'" . $_POST['phone'] . "',"
            . "'" . $_POST['email'] . "',"
            . "'1');";


    mysqli_query($connection, $query);
    mysqli_close($connection);
    unset($_POST['eventSubmitButton']);
    unset($_POST['firstName']);
    unset($_POST['middleName']);
    unset($_POST['lastName']);
    unset($_POST['suffix']);
    unset($_POST['street']);
    unset($_POST['city']);
    unset($_POST['zip']);
    unset($_POST['state']);
    unset($_POST['phone']);
    unset($_POST['email']);
}
if (isset($_POST['orgSubmitButton'])) {
    $connection = mysqli_connect("localhost", "occ", "occ470", "occ")
            OR die('Could not connect to MySQL ' . mysqli_connect_error());

    mysqli_select_db($connection, 'occ');
    $query = "call organizationDropOff("
            . "'" . $_POST['orgName'] . "',"
            . "'" . $_POST['street'] . "',"
            . "'" . $_POST['city'] . "',"
            . "'" . $_POST['zip'] . "',"
            . "'" . $_POST['state'] . "',"
            . "'" . $_POST['phone'] . "',"
            . "'" . $_POST['email'] . "',"
            . "'C99504',"
            . "'" . $_POST['boxes'] . "',";

    if ($_POST['churchBool'] == 'yes') {
        $query.= "'1'";
    } else {
        $query.="'0'";
    }
    $query.= ");";
    mysqli_query($connection, $query);
    mysqli_close($connection);
    unset($_POST['orgSubmitButton']);
    unset($_POST['orgName']);
    unset($_POST['street']);
    unset($_POST['city']);
    unset($_POST['zip']);
    unset($_POST['state']);
    unset($_POST['phone']);
    unset($_POST['email']);
    unset($_POST['boxes']);
    unset($_POST['churchBool']);
}
if (isset($_POST['f7SubmitButton'])) {
    $connection = mysqli_connect("localhost", "occ", "occ470", "occ")
            OR die('Could not connect to MySQL ' . mysqli_connect_error());

    mysqli_select_db($connection, 'occ');
    $query = "call createEvent("
            . "'" . $_POST['f7EventName'] . "',"
            . "'" . $_POST['f7EventDate'] . "',"
            . "'" . $_POST['f7EventStartTime'] . "',"
            . "'" . $_POST['f7EventEndTime'] . "',"
            . "'" . $_POST['f7EventOrg'] . "',"
            . "'" . $_POST['f7EventStreet'] . "',"
            . "'" . $_POST['f7EventCity'] . "',"
            . "'" . $_POST['f7EventZipCode'] . "',"
            . "'" . $_POST['f7EventState'] . "',"
            . "'" . $_POST['f7EventPhone'] . "',"
            . "'" . $_POST['f7EventEmail'] . "',";
    if ($_POST['f7EventChurchBool'] == 'yes') {
        $query.= "'1'";
    } else {
        $query.="'0'";
    }
    $query.= ",NULL,"
            . "'" . $_POST['f7EventLat'] . "',"
            . "'" . $_POST['f7EventLon'] . "',"
            . "'1'";


    $query.= ");";
    mysqli_query($connection, $query);
    mysqli_close($connection);

    unset($_POST['f7SubmitButton']);
    unset($_POST['f7EventName']);
    unset($_POST['f7EventDate']);
    unset($_POST['f7EventStartTime']);
    unset($_POST['f7EventEndTime']);
    unset($_POST['f7EventOrg']);
    unset($_POST['f7EventStreet']);
    unset($_POST['f7EventCity']);
    unset($_POST['f7EventZipCode']);
    unset($_POST['f7EventState']);
    unset($_POST['f7EventPhone']);
    unset($_POST['f7EventEmail']);
    unset($_POST['f7EventChurchBool']);
    unset($_POST['f7EventLat']);
    unset($_POST['f7EventLon']);
}
?>
<html>
    <head>
        <title>Operation Christmas Child</title>
        <link rel="shortcut icon" href="SP_Icon.png" type="image/png">
        <style>
            *{
                margin: 0px;
                padding: 0px;
                font-family: sans-serif;
                position:relative;
            }
            html{
                zoom:100%;
                width:fit-content;
                margin-left:auto;
                margin-right:auto;
            }
            body{
                background-color: #333;
            }
            a , .caption,label,#loginLink,#bannerText,#eventTable{
                color:white;

            }
            .text:hover{
                background-color: #ee9;
            }
            .link:hover,.f7Link:hover{
                background-color: #69be28;
                color: white;

            }
            #bannerText{
                position:absolute;
                text-align: center;

            }
            .form{
                text-align: center;
                width: auto;
                margin-left: auto;
                margin-right:auto;
            }
            table{
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
            #submitButton{
                background: #69be28;
                color:white;
                width:fit-content;
            }
            #header{
                text-align: right;
            }
            #navigation{
                background: #69be28;
            }
            #textLinks{
                position:absolute;
            }
            #loginLink{
                padding-left: 0%;
                padding-right: 0.5%;
            }
            .formSubmitButton{

                background: #69be28;
                color:white;
            }
            #main{
                text-align: center;
                margin-left: auto;
                margin-right:auto;
            }
            #eventTable,#form7Table,#form8Table{

                text-align: center;
                border:solid;
                border-color: #69be28;
            }

            input{
                border:solid;
                border-radius: 5px;
                border-width: 3px;
                color: #333;
                border-color: #69be28;
                width:100%;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script>
            function haversine(theta) {
                return Math.pow(Math.sin(theta / 2), 2);
            }
            function latLongToKm(lat1, long1, lat2, long2) {
                dlat = Math.abs(lat1 - lat2);
                dlong = Math.abs(long1 - long2);
                radius = 6371;
                HDR = haversine(dlat * Math.PI / 180) +
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
                lat = parseFloat(position.coords.latitude);
                lon = parseFloat(position.coords.longitude);

                $.get('dropoffCallBack.php', {lat: lat, lon: lon}, function (data) {
                    var arr = String(data).split(",");
                    var result = [];
                    for (i = 0; i < arr.length - 1; i++) {
                        result[i] = parseFloat(arr[i]);
                    }
                    for (i = 0; i < result.length - 1; i = i + 2) {
                        var value = latLongToKm(lat, lon, result[i], result[i + 1]);

                        if (value < .3) {
                            $('#dropoff').show();
                        }
                    }

                });
                $.get('eventCallBack.php', {lat: lat, lon: lon}, function (data) {
                    var arr = String(data).split(",");
                    var result = [];
                    for (i = 0; i < arr.length - 1; i++) {
                        result[i] = parseFloat(arr[i]);
                    }
                    for (i = 0; i < result.length - 1; i = i + 2) {
                        var value = latLongToKm(lat, lon, result[i], result[i + 1]);
                        if (value < .3) {
                            $('#event').show();
                        }
                    }
                });
            }
            setStyles = function () {
                vw = window.innerWidth / 100;
                vh = window.innerHeight / 100;
                vmin = Math.min(vw, vh);
                vmax = Math.max(vw, vh);
                toPx = function (value) {
                    return value + "px";
                };
                $('#header').css({
                    "top": toPx(1.25 * vmin),
                    "width": toPx(100 * vw),
                    "font-size": toPx(2.5 * vmin)
                });
                $('#navigation').css({
                    "top": toPx(2.5 * vmin),
                    "width": toPx(100 * vw),
                    "height": toPx(10 * vmin)
                });
                $('#logoImage').css({
                    "top": toPx(-5 * vmin),
                    "width": toPx(20 * vmin)
                });
                $('#bannerText').css({
                    "width": toPx(100 * vw),
                    "bottom": toPx(3.25 * vmin),
                    "font-size": toPx(2.5 * vmin)
                });
                $('.link').css({
                    "top": toPx(5 * vmin),
                    "width": toPx(60 * vmin),
                    "height": toPx(20 * vmin),
                    "font-size": toPx(6 * vmin),
                    "margin": toPx(2.5 * vmin)
                });
                $('.f7Link').css({
                    "font-size": toPx(2.5 * vmin)

                });
                $('.text').css({
                    "font-size": toPx(5 * vmin),
                    "width": toPx(40 * vmin)
                });
                $('.form').css({
                    "top": toPx(8 * vmin),
                    "width": toPx(100 * vmin)

                });
                $('.formSubmitButton').css({
                    "font-size": toPx(5 * vmin),
                    "width": toPx(22 * vmin)
                });
                $('#eventImage').css({
                    "width": toPx(20 * vmin)
                });
                $('#eventTable,#form7Table,#form8Table').css({
                    "width": toPx(100 * vw),
                    "top": toPx(10 * vmin),
                    "font-size": toPx(1.5 * vw)
                });
                $('.f7,.f8').css({
                    "font-size": toPx(1.5 * vw),
                    "border": "none"
                });
            };
            login = function (str1, str2) {
                $('#loginLink').click(function () {
                    $(".admin,.dropoff,.index,#form1,#form2,#form3,#form4,.eventTable," + str1).fadeOut(750,
                            function () {
                                $(str2).show(2000);
                            });
                });
            };
            init = function () {

                setStyles();
                $('#dropoff').hide();
                $('#event').hide();
                $('.dropoff').hide();
                $('.admin').hide();
                $('.form').hide();
                $('.eventTable').hide();
                $('.locationTable').hide();
            };
            onClick = function () {
                $('#dropoff').click(function () {
                    $('.index').fadeOut(750, function () {
                        $('.dropoff').fadeIn(750);
                    });
                });

                $('#event').click(function () {
                    $('.index').fadeOut(750, function () {
                        $('#form2').fadeIn(750);
                    });
                });
                $('#individual').click(function () {
                    $(".dropoff").fadeOut(750, function () {
                        $('#form1').fadeIn(750);
                    });
                });
                $('#organization').click(function () {
                    $(".dropoff").fadeOut(750, function () {
                        $('#form3').fadeIn(750);
                    });
                });
                $('#anon').click(function () {
                    $(".dropoff").fadeOut(750, function () {
                        $('#form4').fadeIn(750);
                    });
                });
                $('#admin').click(function () {
                    $(".index").fadeOut(750, function () {
                        $('.admin').fadeIn(750);
                    });
                });
                $('#manageEvents').click(function () {
                    $('.admin').fadeOut(750, function () {
                        $('.eventTable,#form7,#form8').fadeIn(750);
                    });
                });
                $('#logoImage').click(function () {
                    $('#hiddenForm').submit();
                });
                login();
            };

            $(document).ready(function () {
                init();
                getLocation();
                $(window).resize(function () {
                    setStyles();
                });
                onClick();
            });


        </script>
    </head>

    <body>


        <div id="header" >
            <div id="loginLink">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "" . $_SESSION['username'];
                    echo '<script>';
                    echo'login("#form5","#form6");';
                    echo'</script>';
                } else {
                    echo 'Login';
                    echo '<script>';
                    echo'login("#form6","#form5");';
                    echo'</script>';
                }
                ?>

            </div>
        </div>



        <div id="navigation">

            <image id="logoImage" src="logo.png" alt="OCC Logo">
            <form action="" id="hiddenForm" method="post">
                <input type="hidden" name="logoValue" value="1">
            </form>
            <div id="bannerText">
                <?php
                echo 'Operation Christmas Child';
                ?>
            </div>

        </div>

        <div id="main">

            <input type="submit" class="index link" id="dropoff" value="Drop-Off">
            <input type="submit" class="index link" id="event" value="Event Check-In">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<input type = "submit" class = "index link" id = "admin" value = "Admin">';
            }
            ?>
            <input type="submit" class="dropoff link" id="individual" value="Individual">
            <input type="submit" class="dropoff link" id="organization" value="Organization">
            <input type="submit" class="dropoff link" id="anon" value="Anonymous">
            <input type="submit" class="admin link" id="manageEvents" value="Manage Events">
            <!--<input type="submit" class="admin link" id="manageLocations" value="Manage Locations"> 
            <input type="submit" class="admin link" id="dataLookup" value="Data Lookup">
            <input type="submit" class="admin link" id="dataEntry" value="Data Entry">-->



            <form id="form1"  class="form" action="" method="post">
                <label for="nameTable1">Donor Drop-Off</label>
                <table id="nameTable1">
                    <tr>
                        <td><input type="text" class="text" placeholder="First Name" name="firstName"></td>
                        <td><input type="text" class="text" placeholder="Middle Name" name="middleName"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="Last Name" name="lastName"></td>
                        <td><input type="text" class="text" placeholder="Suffix" name="suffix"></td>
                    </tr>
                </table>
                <br />
                <table id="addressTable1">
                    <tr>
                        <td><input type="text" class="text" placeholder="Mailing Address" name="street"></td>
                        <td><input type="text" class="text" placeholder="City" name="city"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="State" name="state"></td>
                        <td><input type="text" class="text" placeholder="Zip Code" name="zip"></td>
                    </tr>
                </table>
                <br />
                <table id="otherTable1">
                    <tr>
                        <td><input type="tel" class="text" placeholder="Phone" name="phone"></td>
                        <td><input type="email" class="text" placeholder="Email" name="email"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="Church Name" name="church"></td>
                        <td><input type="text" class="text" placeholder="Number of Boxes" name="boxes"></td>
                    </tr>

                </table>

                <input type="submit" id="form1Button" class="formSubmitButton" value="Submit" name="donorSubmitButton">

            </form>

            <form id="form2"  class="form" action="" method="post">
               <!-- <image id="eventImage" src="Kitten.jpg" alt="Kitten"> -->
                <br />
                <label>Event Check-In</label>

                <table id="nameTable2">
                    <tr>
                        <td><input type="text" class="text" placeholder="First Name" name="firstName"></td>
                        <td><input type="text" class="text" placeholder="Middle Name" name="middleName"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="Last Name" name="lastName"></td>
                        <td><input type="text" class="text" placeholder="Suffix" name="suffix"></td>
                    </tr>
                </table>
                <br />
                <table id="addressTable2">
                    <tr>
                        <td><input type="text" class="text" placeholder="Mailing Address" name="street"></td>
                        <td><input type="text" class="text" placeholder="City" name="city"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="State" name="state"></td>
                        <td><input type="text" class="text" placeholder="Zip Code" name="zip"></td>
                    </tr>
                </table>
                <br />
                <table id="otherTable2">
                    <tr>
                        <td><input type="tel" class="text" placeholder="Phone" name="phone"></td>
                        <td><input type="email" class="text" placeholder="Email" name="email"></td>
                    </tr>

                </table>

                <input type="submit" id="form2Button" class="formSubmitButton" value="Submit" name="eventSubmitButton">
            </form>


            <form id="form3"  class="form" action="" method="post">
                <label>Organization Drop-Off</label>
                <table id="boxTable3">
                    <tr>
                        <td><input type="text" class="text" placeholder="Number of Boxes" name="boxes"></td>
                    </tr>
                </table>
                <br/>
                <table id="nameTable3">
                    <tr>
                        <td><input type="text" class="text" placeholder="Organization" name="orgName"></td>
                        <td> 
                            <input list="churchSelect" class="text" placeholder="Church?" name="churchBool">
                            <datalist id="churchSelect">
                                <option value="yes">
                                <option value="no">
                            </datalist>
                        </td>

                    </tr>

                </table>
                <br />
                <table id="addressTable3">
                    <tr>
                        <td><input type="text" class="text" placeholder="Mailing Address" name="street"></td>
                        <td><input type="text" class="text" placeholder="City" name="city"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="State" name="state"></td>
                        <td><input type="text" class="text" placeholder="Zip Code" name ="zip"></td>
                    </tr>
                </table>
                <br />
                <table id="otherTable3">
                    <tr>
                        <td><input type="tel" class="text" placeholder="Phone" name="phone"></td>
                        <td><input type="email" class="text" placeholder="Email" name="email"></td>
                    </tr>

                </table>

                <input type="submit" id="form3Button" class="formSubmitButton" value="Submit" name="orgSubmitButton">

            </form>


            <form id="form4"  class="form" action="" method="post">
                <label >Anonymous Drop-Off</label>

                <table id="otherTable4">
                    <tr>
                        <td><input type="text" class="text" placeholder="Number of Boxes" name="boxes"></td>
                    </tr>

                </table>

                <input type="submit" id="form4Button" class="formSubmitButton" value="Submit" name="anonSubmitButton">

            </form>

            <form id="form5"  class="form" action="" method="post">

                <label >Connect Volunteer Login</label>

                <table id="otherTable5">
                    <tr>
                        <td><input type="text" class="text" placeholder="Username" name="username"></td>
                        <td><input type="text" class="text" placeholder="Password" name="password"></td>
                    </tr>

                </table>

                <input type="submit" id="form5Button" class="formSubmitButton" value="Submit" name="loginSubmitButton">

            </form>

            <form id="form6" class="form" action="" method="post">
                <input type="submit" id="form6Button" class="link" value="Logout" name="logoutSubmitButton">

            </form>




            <form id="form7" class="eventTable" action="" method="post">
                <table id="eventTable" class="eventTable">
                    <?php
                    $connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
                            OR die('Could not connect to MySQL ' . mysqli_connect_error());

                    mysqli_select_db($connection, "occ");

                    $query = selectFrom('*', 'EventData');
                    $result = mysqli_query($connection, $query);
                    $str = '<tr class="eventTable">';
                    $str.= '<td class="eventTable">ID</td>';
                    $str.= '<td class="eventTable">Event</td>';
                    $str.= '<td class="eventTable">Date</td>';
                    $str.= '<td class="eventTable">Starts</td>';
                    $str.= '<td class="eventTable">Ends</td>';
                    $str.= '<td class="eventTable">Organization</td>';
                    $str.= '<td class="eventTable">Street</td>';
                    $str.= '<td class="eventTable">City</td>';
                    $str.= '<td class="eventTable">State</td>';
                    $str.= '<td class="eventTable">Zip</td>';
                    $str.= '</tr>';
                    echo $str;
                    while ($row = mysqli_fetch_array($result)) {

                        $str = '<tr class="eventTable">';
                        $str.= '<td class="eventTable">' . $row['eventID'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['eventName'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['date'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['startTime'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['endTime'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['officialName'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['street'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['city'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['state'] . '</td>';
                        $str.= '<td class="eventTable">' . $row['zip'] . '</td>';
                        $str.= '</tr>';
                        echo $str;
                    }

                    mysqli_close($connection);
                    ?>


                </table>

                <table id="form7Table" class="eventTable">


                    <tr class="eventTable form7Table">
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Event Name" name="f7EventName">
                        </td>
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Event Date" name="f7EventDate">
                        </td>

                    </tr>
                    <tr class="eventTable form7Table">
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Start Time" name="f7EventStartTime">
                        </td>
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="End Time" name="f7EventEndTime">
                        </td>
                    </tr>
                    <tr class="eventTable form7Table">

                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Street" name="f7EventStreet">
                        </td>
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="City" name="f7EventCity">
                        </td>

                    </tr>
                    <tr class="eventTable form7Table">
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="State" name="f7EventState">
                        </td>
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Zip" name="f7EventZipCode">
                        </td>
                    </tr>
                    <tr class="eventTable form7Table">

                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Organization" name="f7EventOrg">
                        </td>
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Phone" name="f7EventPhone">
                        </td>

                    </tr>
                    <tr class="eventTable form7Table">
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Email" name="f7EventEmail">
                        </td>
                        <td> 
                            <input list="f7churchSelect" class="f7" placeholder="Church?" name="f7EventChurchBool">
                            <datalist id="f7churchSelect">
                                <option value="yes">
                                <option value="no">
                            </datalist>
                        </td>
                    </tr>
                    <tr class="eventTable form7Table">

                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Latitude" name="f7EventLat">
                        </td>
                        <td class="eventTable form7Table">
                            <input type="text" class="f7" placeholder="Longitude" name="f7EventLon">
                        </td>


                    </tr>
                    <tr class="eventTable form7Table">
                        <td class="eventTable form7Table">
                            <input type="submit" id="form7CreateButton" class="f7Link" value="Create Event" name="f7SubmitButton">
                        </td>
                    </tr>



                </table>



            </form>

            <br/>
            <br/>
            <br/>
            <form id="form8" class="form8Table" action="" method="post">
                <table id="form8Table" class="eventTable " >
                    <tr class="eventTable ">
                        <td class="eventTable form8Table">
                            <input type="submit" id="form8DeleteButton" class="f8Link" value="Delete Event" name="f8DeleteButton">
                        </td>
                        <td class="eventTable form8Table">
                            <input type="text"  class="f8" placeholder="Event ID" name="f8DeleteID">
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </body>
</html>
