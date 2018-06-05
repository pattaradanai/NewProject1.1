<?php 
    if(isset($_SESSION['username'])){

            if($_SESSION["status"] == "0"){
            
              include 'teacher_login.php';
              }else{
                echo "<div style = ' font-size: 20px ' >";
                 include 'add_student_name.php'; 
              }
      //  echo " <a id='fh5co-social' style = 'padding : 10px 10px ; font-size: 15px ' href='logout.php'>Logout</a> " ;

    }else{
      echo  "<div id='fh5co-logo'><a href='Login.html'>Login</a></div>";
    }
?>