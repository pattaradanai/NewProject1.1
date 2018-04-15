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

?>