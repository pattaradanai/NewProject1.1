<?php 
    // session_start();
    include("config.php");

    $sql = "SELECT * FROM student WHERE studentid = {$_SESSION["id"]}";
    $query = mysqli_query($conn, $sql);
    while($data = $query->fetch_assoc())
    {
        echo "<a  style = 'font-size: 18px' href='student.php'> {$data["name"]} {$data["surname"]} </a>";
    }

?>