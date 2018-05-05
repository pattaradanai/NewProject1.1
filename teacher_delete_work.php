<?php
    include("config.php");
    $workid = $_GET['editer_del_workid'];
    $sql = "DELETE FROM `work_subjectdata` WHERE `workid`='$workid'";
    $query = mysqli_query($conn, $sql);
    header("Location:teacher_editer.php");
?>