<?php 
        include('config.php');
        $work_name = $_POST['subject_name'];
        $max_score = $_POST['max_score'];
        $subjectid = $_GET['editer_subjectid'];
        $sql = "SELECT `workid` 
                FROM `work_subjectdata` WHERE `workname`='$work_name' ";
        $query = mysqli_query($conn, $sql);
        if($query->num_rows!=0){
                echo '<script type="text/javascript">'.'alert("มีงานชิ้นนี้อยู่แล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
        } else {
                $sql = "SELECT `workid` 
                        FROM `work_subjectdata` WHERE `subjectid`='$subjectid' ORDER BY `workid`";
                $query = mysqli_query($conn, $sql);
                $max_seq = 0;
                while($check_seq=$query->fetch_assoc()){
                        // echo var_dump($check_seq['workid']);
                        // echo "<br>";
                        if($max_seq<substr($check_seq['workid'],3)){
                                $max_seq = substr($check_seq['workid'],3);
                        }
                }
                $seq = $max_seq + 1;
                if($max_seq>100){
                        $workid = substr($subjectid,1,3).$seq;
                } else if($max_seq>10) {
                        $workid = substr($subjectid,1,3).'0'.$seq;
                } else {
                        $workid = substr($subjectid,1,3).'00'.$seq;
                }
                $sql = "SELECT `workorder` 
                        FROM `work_subjectdata` WHERE `subjectid`='$subjectid' ORDER BY `workid`";
                $query = mysqli_query($conn, $sql);
                $workorder = 1;
                if($query->num_rows!=0){
                        while($order = $query->fetch_assoc()){
                                if($order['workorder']>$workorder){
                                        $workorder = $order['workorder']+1;
                                }
                        }
                }
                $sql = "INSERT INTO `work_subjectdata`(`workid`, `subjectid`, `workname`, `max_score`, `class`, `workorder`) 
                        VALUES ('$workid', '$subjectid', '$work_name', '$max_score', NULL, '$workorder')";
                // echo $sql;
                $query = mysqli_query($conn, $sql);
                $sql = "CREATE TABLE `work$workid`(`studentid` int(10) , `img` longblob, `imgno` int(2)) ";
                // echo $sql;
                $query = mysqli_query($conn, $sql);
                echo '<script type="text/javascript">'.'alert("เพิ่มงานชิ้นนี้สำเร็จแล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
        }
?><?php 
include('config.php');
$work_name = $_POST['subject_name'];
$max_score = $_POST['max_score'];
$subjectid = $_GET['editer_subjectid'];
$sql = "SELECT `workid` 
        FROM `work_subjectdata` WHERE `workname`='$work_name' ";
$query = mysqli_query($conn, $sql);
if($query->num_rows!=0){
        echo '<script type="text/javascript">'.'alert("มีงานชิ้นนี้อยู่แล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
} else {
        $sql = "SELECT `workid` 
                FROM `work_subjectdata` WHERE `subjectid`='$subjectid' ORDER BY `workid`";
        $query = mysqli_query($conn, $sql);
        $max_seq = 0;
        while($check_seq=$query->fetch_assoc()){
                // echo var_dump($check_seq['workid']);
                // echo "<br>";
                if($max_seq<substr($check_seq['workid'],3)){
                        $max_seq = substr($check_seq['workid'],3);
                }
        }
        $seq = $max_seq + 1;
        if($max_seq>100){
                $workid = substr($subjectid,1,3).$seq;
        } else if($max_seq>10) {
                $workid = substr($subjectid,1,3).'0'.$seq;
        } else {
                $workid = substr($subjectid,1,3).'00'.$seq;
        }
        $sql = "SELECT `workorder` 
                FROM `work_subjectdata` WHERE `subjectid`='$subjectid' ORDER BY `workid`";
        $query = mysqli_query($conn, $sql);
        $workorder = 1;
        if($query->num_rows!=0){
                while($order = $query->fetch_assoc()){
                        if($order['workorder']>$workorder){
                                $workorder = $order['workorder']+1;
                        }
                }
        }
        $sql = "INSERT INTO `work_subjectdata`(`workid`, `subjectid`, `workname`, `max_score`, `class`, `workorder`) 
                VALUES ('$workid', '$subjectid', '$work_name', '$max_score', NULL, '$workorder')";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        $sql = "CREATE TABLE `work$workid`(`studentid` int(10) , `img` longblob, `imgno` int(2)) ";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        echo '<script type="text/javascript">'.'alert("เพิ่มงานชิ้นนี้สำเร็จแล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
}
?>