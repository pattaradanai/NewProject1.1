<?php 
    // session_start();
    include("config.php");
    if(isset($_SESSION["id"])){
        $sql = "SELECT * FROM student WHERE studentid = {$_SESSION["id"]}";
        $query = mysqli_query($conn, $sql);
        while($data = $query->fetch_assoc())
        {
            echo "<a href='student.php'> {$data["name"]} {$data["surname"]} </a>";
            echo "</div>
			<ul class='fh5co-social'>
                <li>
                  <a style = 'padding : 10px 10px ; font-size: 15px' href='logout.php'>Logout</a>
                </li>
            </ul>";
        }
    }else{
        echo "</div>
                <div id='fh5co-logo'><a href='Login.html'>Login</a></div>
                ";
    }
?>