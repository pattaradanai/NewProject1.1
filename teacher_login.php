<?php 
    
    include("config.php");
    $teacher_id =  $_SESSION["id"];
    $sql = "SELECT * FROM `teacher` WHERE `teacherid` =   $teacher_id ";
    $query = mysqli_query($conn,$sql);
    $objResult = mysqli_fetch_array($query);
   
    
    echo "<a style = ' font-size: 18px' color : 'black' href='teacher.php'> ".$objResult['name']." ".$objResult['surname']."</a>";



?>