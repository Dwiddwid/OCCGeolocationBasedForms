<?php

$connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
        OR die('Could not connect to MySQL ' . mysqli_connect_error());

mysqli_select_db($connection, $db_name);

$query = "call insertperson('" . $_POST["firstName"] . "',"
        . "'" . $_POST["firstName"] . "',"
        . "'" . $_POST["middleName"] . "',"
        . "'" . $_POST["lastName"] . "',"
        . "'" . $_POST["suffix"] . "',"
        . "'" . $_POST["street"] . "',"
        . "'" . $_POST["city"] . "',"
        . "'" . $_POST["state"] . "',"
        . "'" . $_POST["zip"] . "',"
        . "'" . $_POST["phone"] . "',"
        . "'" . $_POST["email"] . "',"
        . "'" . $_POST["church"] . "')";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
?>