<?php 
    // session_start();
    include("config.php");
    if(isset($_SESSION["id"])){
        $sql = "SELECT * FROM student WHERE studentid = {$_SESSION["id"]}";
        $query = mysqli_query($conn, $sql);
        while($data = $query->fetch_assoc())
        {
            if($data["sex"]==0){
                echo "<a href='student.php'> ด.ช.{$data["name"]} {$data["surname"]} </a>";
            } else {
                echo "<a href='student.php'> ด.ญ.{$data["name"]} {$data["surname"]} </a>";
            }
            echo "</div>
			<ul class='fh5co-social'>
                <li>
                  <a style = 'padding : 10px 10px ; font-size: 15px' href='logout.php'>ออกจากระบบ</a>
                </li>
            </ul>";
        }
    }else{
        echo "</div>
                <div id='fh5co-logo'><a href='Login.html'>เข้าสู่ระบบ</a></div>
                ";
    }
?>