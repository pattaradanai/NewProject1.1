<?php 
echo '<script type="text/javascript"> alert("เพิ่มงานสำเร็จแล้ว"); window.location.href = "student.php" </script>';
    $status = $_POST['status'];
    $workid = $_POST['workid'];
    if($status==0){
        $sql = "UPDATE `work_studentdata` 
                SET `portfolio`='1'
                WHERE `studentid`='{$_SESSION['id']}' 
                AND `workid`='$workid'";
        $query = mysqli_query($conn,$sql);
    } else {
        $sql = "UPDATE `work_studentdata` 
                SET `portfolio`='0'
                WHERE `studentid`='{$_SESSION['id']}' 
                AND `workid`='$workid'";
        $query = mysqli_query($conn,$sql);
    }
?>