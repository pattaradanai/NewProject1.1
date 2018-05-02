<?php
    session_start();
    include('config.php');
   $idstn =  $_POST['search'];
   $sql = "SELECT `studentid` FROM `student` WHERE `studentid` = $idstn ";
   $check = mysqli_query($conn,$sql);
    if($idstn != NULL){
        if($check -> num_rows > 0){
            $sql = "SELECT `workid`  FROM `work_studentdata` WHERE `studentid` AND `portfolio` =  1";
            $query = mysqli_query($conn,$sql);
            $objResult = mysqli_fetch_array($query);
                    $_SESSION["workid"] = $objResult["workid"];
                    $_SESSION["stdid_search"] = $objResult["studentid"];	
                   header("Location:index_portfolio.php");
                            
           }else{
                    echo '<script type="text/javascript">'; 
                    echo 'alert("ไม่มีรหัสนักเรียนนี้");';
                    echo 'window.location.href = "index.php"';
                    echo '</script>';
                    exit(); 
           }
         

    }else{

        header("Location:index.php");

    }
 
   
    

	
	session_write_close();
?>