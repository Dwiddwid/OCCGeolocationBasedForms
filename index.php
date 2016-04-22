<!DOCTYPE html >
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
            a{
                text-decoration: none;
            }

            body{
                background-color: #333;
            }
            a , .caption,label,#loginLink{
                color:white;
            }
            .text:hover{
                background-color: #ee9;
            }
            .link:hover{
                background-color: #69be28;
                color: white;

            }
            .linkSet{
                text-align: center;
            }
            .textLink{
                padding-left: 5%;
                padding-right: 5%;
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
            input{
                border:solid;
                border-radius: 5px;
                border-width: 3px;
                color: #333;
                border-color: #69be28;
                width:100%;


            }



        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
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

                $('#textLinks').css({
                    "left": toPx($('#logoImage').width()),
                    "right": toPx(1),
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

            };

            login = function (str1, str2) {
                $('#loginLink').click(function () {

                    $(".dropoff,.index,#form1,#form2,#form3,#form4," + str1).fadeOut(750, function () {
                        $(str2).show(1500);
                    });


                });
            };
            init = function () {
                setStyles();
                $('.dropoff').hide();
                $('.form').hide();

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
                login();



            };



            $(document).ready(function () {
                init();

                $(window).resize(function () {
                    setStyles();
                });
                onClick();


            }
            );

        </script>
    </head>

    <body>

        <div id="header" >
            <div id="loginLink">
                <?php
                session_start();
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
            <a href="index.php">
                <image id="logoImage" src="logo.png" alt="OCC Logo">
            </a>

            <div id="textLinks" class="linkSet">
                <?php
                textLink("dropoff", "Drop-Off");
                textLink("event", "Event Check-In");
                textLink("volunteer", "Short-Term Volunteers");
                ?>
            </div>
        </div>

        <div id="main">

            <input type="submit" class="index link" id="dropoff" value="Drop-Off">
            <input type="submit" class="index link" id="event" value="Event Check-In">
            <input type="submit" class="index link" id="volunteer" value="Volunteers">
            <input type="submit" class="dropoff link" id="individual" value="Individual">
            <input type="submit" class="dropoff link" id="organization" value="Organization">
            <input type="submit" class="dropoff link" id="anon" value="Anonymous">



            <form id="form1"  class="form" action="donorForm.php" method="post">
                <label for="nameTable1">Donor Drop-Off</label>
                <table id="nameTable1">
                    <tr>
                        <td><input type="text" class="text" placeholder="First Name"></td>
                        <td><input type="text" class="text" placeholder="Middle Name"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="Last Name"></td>
                        <td><input type="text" class="text" placeholder="Suffix"></td>
                    </tr>
                </table>
                <br />
                <table id="addressTable1">
                    <tr>
                        <td><input type="text" class="text" placeholder="Mailing Address"></td>
                        <td><input type="text" class="text" placeholder="City"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="State"></td>
                        <td><input type="text" class="text" placeholder="Zip Code"></td>
                    </tr>
                </table>
                <br />
                <table id="otherTable1">
                    <tr>
                        <td><input type="tel" class="text" placeholder="Phone"></td>
                        <td><input type="email" class="text" placeholder="Email"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="Church"></td>
                        <td><input type="text" class="text" placeholder="Number of Boxes"></td>
                    </tr>

                </table>

                <input type="submit" id="form1Button" class="formSubmitButton" value="Submit">

            </form>

            <form id="form2"  class="form" action="eventForm.php" method="post">
                <image id="eventImage" src="Kitten.jpg" alt="Kitten">
                <br />
                <label>Event Check-In</label>

                <table id="nameTable2">
                    <tr>
                        <td><input type="text" class="text" placeholder="First Name"></td>
                        <td><input type="text" class="text" placeholder="Middle Name"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="Last Name"></td>
                        <td><input type="text" class="text" placeholder="Suffix"></td>
                    </tr>
                </table>
                <br />
                <table id="addressTable2">
                    <tr>
                        <td><input type="text" class="text" placeholder="Mailing Address"></td>
                        <td><input type="text" class="text" placeholder="City"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="State"></td>
                        <td><input type="text" class="text" placeholder="Zip Code"></td>
                    </tr>
                </table>
                <br />
                <table id="otherTable2">
                    <tr>
                        <td><input type="tel" class="text" placeholder="Phone"></td>
                        <td><input type="email" class="text" placeholder="Email"></td>
                    </tr>

                </table>

                <input type="submit" id="form2Button" class="formSubmitButton" value="Submit">
            </form>


            <form id="form3"  class="form" action="organizationForm.php" method="post">
                <label>Organization Drop-Off</label>
                <table id="boxTable3">
                    <tr>

                        <td><input type="text" class="text" placeholder="Number of Boxes"></td>

                    </tr>

                </table>
                <br/>
                <table id="nameTable3">
                    <tr>
                        <td><input type="text" class="text" placeholder="Organization"></td>
                        <td> 
                            <input list="churchSelect" class="text" placeholder="Are you a Church?">
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
                        <td><input type="text" class="text" placeholder="Mailing Address"></td>
                        <td><input type="text" class="text" placeholder="City"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text" placeholder="State"></td>
                        <td><input type="text" class="text" placeholder="Zip Code"></td>
                    </tr>
                </table>
                <br />
                <table id="otherTable3">
                    <tr>
                        <td><input type="tel" class="text" placeholder="Phone"></td>
                        <td><input type="email" class="text" placeholder="Email"></td>
                    </tr>

                </table>

                <input type="submit" id="form3Button" class="formSubmitButton" value="Submit">

            </form>


            <form id="form4"  class="form" action="anonForm.php" method="post">
                <label >Anonymous Drop-Off</label>

                <table id="otherTable4">
                    <tr>
                        <td><input type="text" class="text" placeholder="Number of Boxes" name="boxes"></td>
                    </tr>

                </table>

                <input type="submit" id="form4Button" class="formSubmitButton" value="Submit">

            </form>

            <form id="form5"  class="form" action="login.php" method="post">
                <label >Connect Volunteer Login</label>

                <table id="otherTable5">
                    <tr>
                        <td><input type="text" class="text" placeholder="Username" name="username"></td>
                        <td><input type="text" class="text" placeholder="Password" name="password"></td>
                    </tr>

                </table>

                <input type="submit" id="form5Button" class="formSubmitButton" value="Submit">

            </form>
            <form id="form6" class="form" action="logout.php" method="post">
                <input type="submit" id="form6Button" class="link" value="Logout">

            </form>


        </div>
    </body>
</html>