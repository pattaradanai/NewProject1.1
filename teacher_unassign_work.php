<?php
    include('config.php');
    $subjectid = $_GET['editer_unassign_subjectid'];
    $class = $_GET['editer_unassign_class'];
    $workid = $_GET['editer_unassign_workid'];
    $sql = "SELECT `workid` 
            FROM `work_subjectdata` 
            WHERE `subjectid`='$subjectid' 
            -- AND`class`='$class' 
            ";
    $query = mysqli_query($conn, $sql);
    // echo $query->num_rows;
    if($query->num_rows==1){
        $sql = "UPDATE `work_subjectdata` SET `class`=NULL WHERE `subjectid`='$subjectid' ";
        $query = mysqli_query($conn, $sql);
    } else {
        $sql = "DELETE FROM `work_subjectdata` WHERE `subjectis`='$subjectid' AND `class`='$class' ";
        $query = mysqli_query($conn, $sql);
    }
    echo '<script type="text/javascript"> alert("ยกเลิกงานสำเร็จแล้ว"); window.location.href = "teacher_editer.php" </script>';
?>