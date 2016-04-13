<!DOCTYPE html >
<?php
include './common.php';
?>
<html>

    <head>
        <title>Operation Christmas Child</title>
        <link rel="stylesheet" href="index.css">
        <link rel="shortcut icon" href="SP_Icon.png" type="image/png">
        <script src="indexMethods.js"></script>

    </head>

    <body onload="setStyles()"  onresize="setStyles()">

        <div id="header" >
            <div id="loginLink">
                <?php
                textLink("login", "Login");
                ?>
            </div>
        </div>

        <div id="navigation">
            <image id="logoImage" src="logo.png">
            <div id="textLinks" class="linkSet">
                <?php
                textLink("dropoff", "Drop-Off");
                textLink("event", "Event Check-In");
                textLink("volunteer", "Short-Term Volunteers");
                ?>
            </div>
        </div>

        <div id="main">
            <table id = "imageLinks" class="linkSet">
                <tr>
                    <td>
                        <?php
                        imageLink("dropoff", "Drop-Off", "https://pixabay.com/static/uploads/photo/2013/07/13/14/05/location-162102_960_720.png");
                        ?>
                    </td>
                    <td>
                        <?php
                        imageLink("event", "Event Check-In", "http://photos1.blogger.com/blogger/3504/1968/400/BookSigning.png");
                        ?>
                    </td>
                    <td>
                        <?php
                        imageLink("volunteer", "Short-Term Volunteers", "http://i.vimeocdn.com/video/505078333_1280x720.jpg");
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>