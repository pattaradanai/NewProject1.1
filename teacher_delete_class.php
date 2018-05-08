<?php
    include('config.php');
    $subjectid = $_GET['editer_del_subjectid'];
    $class = $_GET['editer_del_class'];
    $sql = "DELETE FROM `subject` WHERE `subjectid`='$subjectid' AND `class`='$class'";
    $query = mysqli_query($conn, $sql);
    header("Location:teacher_editer.php");
?>