<?php

include './database.php';

$connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
        OR die('Could not connect to MySQL ' . mysqli_connect_error());

mysqli_select_db($connection, $db_name);

$query = selectFrom('*', 'Volunteer');
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($result)) {
    if ($_POST['user'] == $row['userName']) {
        if ($row['password'] == $_POST['pass']) {
            echo 'Success';
            break;
        } else {
            header("Location:login.php");
            exit();
        }
    } else {
        header("Location:login.php");
        exit();
    }
}

mysqli_close($connection);
?>