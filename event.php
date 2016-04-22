<!DOCTYPE html>
<?php

function textLink($id, $text) {
    $output = "<span id=\"$id" . "Link\" class=\"textLink\">";
    $output.="<a href=\"$id" . ".php\">";
    $output.=$text;
    $output.="</a>";
    $output.="</span>";
    echo $output;
    unset($output);
}
?>
<html>
    <head>
        <title>Operation Christmas Child</title>
        <link rel="stylesheet" href="event.css">
        <link rel="shortcut icon" href="SP_Icon.png" type="image/png">
        <script src="eventMethods.js"></script>
    </head>
    <body  onload="setStyles()"  onresize="setStyles()">
        <div id="header" >
            <div id="loginLink"  >
                <?php
                textLink("login", "Login");
                ?>
            </div>
        </div>
        <div id="navigation">
            <a href="index.php">
                <image id="logoImage" src="logo.png">
            </a>
            <div id="textLinks" class="linkSet">
                <?php
                textLink("event", 'Event Check-In');
                textLink("volunteer", 'Short-Term Volunteers');
                ?>
            </div>
        </div>

        <form id="form1"  action="eventForm.php" method="post">
            <label for="nameTable">Event Check-In</label>
            <table id="nameTable">
                <tr>
                    <td><input type="text" placeholder="First Name" name="firstName"></td>
                    <td><input type="text" placeholder="Middle Name" name="middleName"></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Last Name" name="lastName"></td>
                    <td><input type="text" placeholder="Suffix" name="suffix"></td>
                </tr>
            </table>
            <br />
            <table id="addressTable">
                <tr>
                    <td><input type="text" placeholder="Street/Apt." name="street"></td>
                    <td><input type="text" placeholder="City" name="city"></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="State" name="state"></td>
                    <td><input type="text" placeholder="Zip Code" name="zip"></td>
                </tr>
            </table>
            <br />
            <table id="otherTable">
                <tr>
                    <td><input type="tel" placeholder="Phone" name="phone"></td>
                    <td><input type="email" placeholder="Email" name="email"></td>
                </tr>
               
            </table>

            <input type="submit" id="submitButton" value="Submit">

        </form>

    </body>
</html>
