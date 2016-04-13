<!DOCTYPE html>
<?php
include './common.php';
?>
<html>
    <head>
        <title>Operation Christmas Child</title>
        <link rel="stylesheet" href="dropoff.css">
        <link rel="shortcut icon" href="SP_Icon.png" type="image/png">
        <script src="dropoffMethods.js"></script>
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

        <form id="form1"  action="donor.php" method="post">
            <input type="submit" id="donor" value="Individual">
        </form>
        <br />
        <form id="form2"  action="organization.php" method="post">
            <input type="submit" id="organization" value="Organization">
        </form>

    </body>
</html>
