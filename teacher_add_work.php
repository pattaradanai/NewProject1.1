<?php 
    include('config.php');
    $work_name = $_POST['subject_name'];
    $max_score = $_POST['max_score'];
    $subjectid = $_GET['editer_subjectid'];
    $sql = "SELECT `workid` 
            FROM `work_subjectdata` WHERE 1 ORDER BY `workid` DESC";
    $query = mysqli_query($conn, $sql);
    $last_workid = $query->fetch_array();
    $last_seq = substr($last_workid['workid'],3);
    $seq = $last_seq+1;
    $workid = substr($subjectid,1,3).$last_seq;
    $sql = "INSERT INTO `work_subjectdata`(`workid`, `subjectid`, `workname`, `max_score`, `class`) 
            VALUES ('$workid', '$subjectid', '$work_name', '$max_score', NULL)";
    // echo $sql;
    $query = mysqli_query($conn, $sql);
    // echo var_dump($query);
    header("Location:teacher_editer.php");
?>