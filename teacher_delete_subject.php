<?php
    include('config.php');
    $subjectid = $_GET['editer_del_subjectid'];
    $sql = "DELETE FROM `teachesdata` WHERE `subjectid`='$subjectid'";
    $query = mysqli_query($conn,$sql);
    $sql = "DELETE FROM `work_subjectdata` WHERE `subjectid`='$subjectid'";
    $query = mysqli_query($conn,$sql);
    echo '<script type="text/javascript">'.'alert("ลบวิชานี้สำเร็จแล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
    // header("Location:teacher_editer.php");
?>
