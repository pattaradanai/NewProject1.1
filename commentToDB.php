<?php
    include("config.php");
    mysqli_set_charset($conn, "utf8");
    $subjectid = $_GET['subjectid_to_db'];
    $workid = $_GET['workid_to_db'];
    $studentid = $_GET['studentid_to_db'];
    $comment = $_POST["comment"];
    $quantity = $_POST["quantity"];
    $sql = "SELECT `comment` 
            FROM `work_studentdata` 
            WHERE `studentid`='$studentid' 
            AND `workid`='$workid'";
    $query = mysqli_query($conn, $sql);
    if($query->num_rows > 0){
      $sql = "UPDATE `work_studentdata` SET  
      `comment` = '$comment',
      `score` = '$quantity'
      WHERE `workid` = '$workid'
      AND `studentid` = '$studentid'";
      // echo $sql1;
      $query = mysqli_query($conn, $sql);
    } else {
      $sql = "INSERT INTO `work_studentdata`(`workid`, `studentid`, `comment`, `score`, `portfolio`) 
      VALUES ('$workid', '$studentid', '$comment', '$quantity', '0')";
      $query = mysqli_query($conn, $sql);
    }
    
    header("Location:teacher.php");
?>