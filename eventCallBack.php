<?php

$connection = mysqli_connect("127.0.0.1", "occ", "occ470", "occ")
        OR die('Could not connect to MySQL ' . mysqli_connect_error());

mysqli_select_db($connection, "occ");

$query = 'Select * from `EventData`';
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {

    echo $row['latitude'];
    echo ',';
    echo $row['longitude'];
    echo ',';
}
mysqli_close($connection);
?>