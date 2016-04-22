<!DOCTYPE html>
<?php
include './database.php';
$connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
        OR die('Could not connect to MySQL ' . mysqli_connect_error());

mysqli_select_db($connection, "occ");
$query = insertInto('DropOff', ['locationID', 'boxes'], ['C99504', $_POST['boxes']]);
mysqli_query($connection, $query);
mysqli_close($connection);
?>
<html>
    <body>
        <?php
        echo $number;
        ?>

    </body>
</html>