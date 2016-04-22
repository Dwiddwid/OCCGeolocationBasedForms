<?php

include './database.php';
$connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
        OR die('Could not connect to MySQL ' . mysqli_connect_error());

mysqli_select_db($connection, "occ");

$query = selectFrom('*', 'Volunteer');
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {
    if ($_POST['username'] == $row['userName']) {
        if ($_POST['password'] == $row['password']) {
            session_start();
            $_SESSION['username'] = $_POST['username'];

            header("Location:index.php");

            exit();
        } else {
            echo 'failure';
        }
    }
}

mysqli_close($connection);
?>