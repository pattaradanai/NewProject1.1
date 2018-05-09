<?php
    include("config.php");
    mysqli_set_charset($conn, "utf8");
    $subjectid = $_GET['subjectid_from_index'];
    $workid = $_GET['workid_from_index'];
    $studentid = $_GET['studentid_from_index'];
    $imgno = '1';
    $comment = $_POST["comment"];
    $quantity = $_POST["quantity"];
    $sql = "SELECT `comment` 
            FROM `work_studentdata` 
            WHERE `studentid`='$studentid' 
            AND `workid`='$workid'";
    $query = mysqli_query($conn, $sql);
    if($query->num_rows > 0){
      $sql1 = "UPDATE work_studentdata SET  
      comment = '$comment',
      score = '$quantity'
      WHERE workid = '$workid'
      AND studentid = '$studentid'";
      // echo $sql1;
      $result = mysqli_query($conn, $sql1);
    } else {
      $sql1 = "INSERT INTO `work_studentdata`(`workid`, `studentid`, `comment`, `score`, `portfolio`) 
      VALUES ('$workid', '$studentid', '$comment', '$quantity', s'0')";
    }
    
    header("Location:teacher.php");
?>