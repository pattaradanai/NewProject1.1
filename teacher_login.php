<?php 
    
    include("config.php");
    $teacher_id =  $_SESSION["id"];

    $sql = "SELECT * FROM `teacher` WHERE `teacherid` =   $teacher_id ";
    $query = mysqli_query($conn,$sql);
    $objResult = mysqli_fetch_array($query);
    
    echo "<div style = ' font-size: 20px' color : 'black' > ".$objResult['name']." ".$objResult['surname']."</div>";



?>