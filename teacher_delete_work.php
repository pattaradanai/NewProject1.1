<?php
    include("config.php");
    $workid = $_GET['editer_del_workid'];
    $sql = "DELETE FROM `work_subjectdata` WHERE `workid`='$workid'";
    $query = mysqli_query($conn, $sql);
    $sql = "DROP TABLE `work$workid`";
    $query = mysqli_query($conn, $sql);
    echo '<script type="text/javascript">'.'alert("ลบงานชิ้นนี้สำเร็จแล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
    // header("Location:teacher_editer.php");
?>