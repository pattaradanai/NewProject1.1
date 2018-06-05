<?php 
    include("config.php");
    $teacher_id =  $_SESSION["id"];
    $sql = "SELECT * FROM `teacher` WHERE `teacherid` =   $teacher_id ";
    $query = mysqli_query($conn,$sql);
    $objResult = mysqli_fetch_array($query);
    echo "<a style = ' font-size: 20px' color : 'black' href='teacher.php'> ".$objResult['name']." ".$objResult['surname']."</a>";
    echo "<br>";
    echo "	<ul class='fh5co-social'>
                <li>
                <a style = 'padding : 10px 10px ; font-size: 15px' href='logout.php'>ออกจากระบบ</a>
                </li>
            </ul>";
?>