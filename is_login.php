<?php 
    
    
    if(isset($_SESSION['username'])){
        //  echo "Welcome {$_SESSION['username']}";
    } else {
        echo "<script type='text/javascript'>window.confirm('กรุณาเข้าใช้งานระบบ');window.location.href = 'index.php'</script>";
         
    }
?>