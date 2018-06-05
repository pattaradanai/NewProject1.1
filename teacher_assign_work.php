<?php
    include('config.php');
    $workid = $_POST['subject_work_list'];
    $class = $_GET['editer_assign_class'];
    $sql = "SELECT * FROM `work_subjectdata` 
            WHERE `workid`='$workid'";
    $query = mysqli_query($conn, $sql);
    $work_subjectdata = $query->fetch_assoc();
    if($work_subjectdata['class']==NULL){
        $sql = "UPDATE `work_subjectdata` SET `class`='$class' WHERE `workid`='$workid'";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        echo '<script type="text/javascript"> alert("สั่งงานให้ห้องนี้สำเร็จแล้ว"); window.location.href = "teacher_editer.php" </script>';
    } else {
        $sql = "SELECT * FROM `work_subjectdata` 
                WHERE `workid`='$workid'";
        $query = mysqli_query($conn, $sql);
        $work_data = $query -> fetch_assoc();
        $sql = "INSERT INTO `work_subjectdata`(`workid`, `subjectid`, `workname`, `max_score`, `class`, `workorder`) 
                VALUES ('{$work_data['workid']}', '{$work_data['subjectid']}', '{$work_data['workname']}', '{$work_data['max_score']}', '$class', '{$work_data['workorder']}')";
        $query = mysqli_query($conn, $sql);
        echo '<script type="text/javascript"> alert("สั่งงานให้ห้องนี้สำเร็จแล้ว"); window.location.href = "teacher_editer.php" </script>';
    }
?>