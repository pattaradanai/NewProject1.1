<?php
    include("config.php");
    mysqli_set_charset($conn, "utf8");
    $workid = '161110002';
    $studentid = '61002';
    $imgno = '2';
    $comment = $_POST["comment"];
    $quantity = $_POST["quantity"];

    $sql1 = "UPDATE workdata SET  
      comment = '$comment',
      score = '$quantity'
      WHERE workid = '$workid'
      AND studentid = '$studentid'
      AND imgno = '$imgno'";
    $result = mysqli_query($conn, $sql1);
    header("Location:teacher.php");
?>