<?php 
    session_start();
    include("config.php");

    $sql = "SELECT * FROM student WHERE stuid = {$_SESSION["sid"]}";
    $query = mysqli_query($conn, $sql);
    while($data = $query->fetch_assoc())
    {
        echo "<h2> {$data["name"]} {$data["surname"]} </h2>";
    }

?>