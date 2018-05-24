<?php
$server = "localhost";
$dbuser = "root";
$pwd = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($server, $dbuser, $pwd, $dbname);

// Check connection
if (!$conn ) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
<<<<<<< HEAD

=======
>>>>>>> 1eeab8fdf615f6df0052960713ca6da6b03b0222
?>