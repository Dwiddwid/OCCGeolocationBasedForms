<!DOCTYPE htmL>
<?php
include './database.php';

function stuff() {

    echo "<html>
    <head>

    </head>
    <body>
        <fieldset>
            <legend>
                LOG IN
            </legend>
            <form action='login.php' method='post'>
                Username <br /><input type=\"text\" name=\"user\"><br />
                Password <br /><input type=\"password\" name=\"pass\" ><br />

                <input id=\"button\" type=\"submit\" name=\"submit\" value=\"Log-In\">
            </form>
        </fieldset>

    </body>
</html>
 ";
}

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
            stuff();
            exit();
        }
    } else {
        stuff();
        exit();
    }
}

mysqli_close($connection);
?>