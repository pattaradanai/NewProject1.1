<?php 
    session_start();
    include('config.php');
    $status = $_POST['portfolio_status'];
    $workid = $_POST['portfolio_workid'];
    if($status==0){
        $sql = "UPDATE `work_studentdata` 
                SET `portfolio`='1'
                WHERE `studentid`='{$_SESSION['id']}' 
                AND `workid`='$workid'";
        $query = mysqli_query($conn,$sql);
    } else {
        $sql = "UPDATE `work_studentdata` 
                SET `portfolio`='0'
                WHERE `studentid`='{$_SESSION['id']}' 
                AND `workid`='$workid'";
        $query = mysqli_query($conn,$sql);
    }
?>