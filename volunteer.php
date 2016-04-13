<!DOCTYPE html>
<?php
include './common.php';
?>
<html>
    <head>
        <title>Operation Christmas Child</title>
        <link rel="stylesheet" href="volunteer.css">
        <link rel="shortcut icon" href="SP_Icon.png" type="image/png">
        <script src="volunteerMethods.js"></script>
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
                textLink("donor", 'Donor Drop-Off');
                textLink("volunteer", 'Short-Term Volunteers');
                ?>
            </div>
        </div>

        <form id="form1"  action="form1.php" method="post">
            <input type="submit" id="signup" value="Sign-Up">
        </form>
        <br />
        <form id="form2"  action="form2.php" method="post">
            <input type="submit" id="checkin" value="Check-In">
        </form>

    </body>
</html>
