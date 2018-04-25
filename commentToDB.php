<?php
    include("config.php");
    mysqli_set_charset($conn, "utf8");
    $subjectid = $_GET['subjectid_from_index'];
    $workid = $_GET['workid_from_index'];
    $studentid = $_GET['studentid_from_index'];
    $imgno = '1';
    $comment = $_POST["comment"];
    $quantity = $_POST["quantity"];
    $sql1 = "UPDATE workdata SET  
      comment = '$comment',
      score = '$quantity'
      WHERE workid = '$workid'
      AND studentid = '$studentid'
      AND `subjectid` = '$subjectid'";
    //   echo $sql1;
    $result = mysqli_query($conn, $sql1);
    header("Location:teacher.php");
?>