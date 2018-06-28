<?php
    include("config.php");
    $workid = $_GET['wid'];
    $sql = "DELETE FROM `work_subjectdata` WHERE `workid`='$workid'";
    $query = mysqli_query($conn, $sql);
    $sql = "DROP TABLE `work$workid`";
    $query = mysqli_query($conn, $sql);
?>