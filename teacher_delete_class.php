<?php
    include('config.php');
    $subjectid = $_GET['editer_del_subjectid'];
    $class = $_GET['editer_del_class'];
    $sql = "SELECT `class` FROM `subject` WHERE `subjectid`='$subjectid'";
    $query = mysqli_query($conn, $sql);
    if($query->num_rows==1){
        $sql = "UPDATE `subject` SET `class`= NULL WHERE `subjectid`='$subjectid'";
        $query = mysqli_query($conn, $sql);
    }else{
        $sql = "DELETE FROM `subject` WHERE `subjectid`='$subjectid' AND `class`='$class'";
        $query = mysqli_query($conn, $sql);
    }
    header("Location:teacher_editer.php");
?>