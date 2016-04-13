<!DOCTYPE html>
<?php
include './common.php';
?>
<html>
    <head>
        <title>Operation Christmas Child</title>
        <link rel="stylesheet" href="organization.css">
        <link rel="shortcut icon" href="SP_Icon.png" type="image/png">
        <script src="organizationMethods.js"></script>
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

        <form id="form1"  action="organizationForm.php" method="post">
            <label for="nameTable">Organization Drop-Off</label>
            <table id="nameTable">
                <tr>
                    <td><input type="text" placeholder="Organization"></td>

                </tr>

            </table>
            <br />
            <table id="addressTable">
                <tr>
                    <td><input type="text" placeholder="Street"></td>
                    <td><input type="text" placeholder="City"></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="State"></td>
                    <td><input type="text" placeholder="Zip Code"></td>
                </tr>
            </table>
            <br />
            <table id="otherTable">
                <tr>
                    <td><input type="tel" placeholder="Phone"></td>
                    <td><input type="email" placeholder="Email"></td>
                </tr>
                <tr>

                    <td>
                       
                        <input type="checkbox" id="Church">
                    </td>
                    <td><input type="text" placeholder="Number of Boxes"></td>
                </tr>
            </table>

            <input type="submit" id="submitButton" value="Submit">

        </form>

    </body>
</html>
