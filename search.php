<?php
    session_start();
    include('config.php');
   $idstn =  $_POST['search'];
   $sql = "SELECT `studentid` FROM `student` WHERE `studentid` = $idstn";
    
   $check = mysqli_query($conn,$sql);
   //echo var_dump($check);
    if($idstn != NULL){
        
        if($check -> num_rows > 0){
            $sql1 = "SELECT `workid`  FROM `work_studentdata` WHERE `studentid` = $idstn AND `portfolio` =  1";
            $query = mysqli_query($conn,$sql1);
            $objResult = mysqli_fetch_array($query);
                    //$_SESSION["workid"] = $objResult["workid"];
                    //  $_SESSION["stdid_search"] = $idstn;
                    // $_SESSION["stdid_search"] = $objResult["studentid"];
                    // header("Location:portfolio_home.php");
                    header("Location:portfolio_home_search.php?stdid=$idstn");
                            
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