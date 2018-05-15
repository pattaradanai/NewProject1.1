<?php 
    
    if(isset($_SESSION['username'])){
       echo " <div id='fh5co-logo'><a href='logout.php'>Logout</a></div> " ;
    }else{
      echo  "<div id='fh5co-logo'><a href='Login.html'>Login</a></div>";
    }
?>