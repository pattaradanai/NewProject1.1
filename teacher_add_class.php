<?php 
    include('config.php');
    $class = $_POST['class'];
    $subjectid = $_GET['editer_add_subjectid'];
    # check no data class #
    $sql = "SELECT `class` FROM `subject` WHERE `subjectid`='$subjectid'";
    $query = mysqli_query($conn, $sql);
    $classdata = $query -> fetch_all();
    // echo var_dump($classdata);
    if($classdata[0][0]==$class)
    {
        echo '<script type="text/javascript"> alert("มีห้องนี้อยู่แล้ว"); window.location.href = "teacher_editer.php" </script>';
        // header("Location:teacher_editer.php");
    }    
    if($classdata[0][0]==null)
    {
        // echo "no class";
        $sql = "UPDATE `subject` SET `class`='$class' WHERE `subjectid`='$subjectid'";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        echo '<script type="text/javascript"> alert("เพิ่มห้องสำเร็จแล้ว"); window.location.href = "teacher_editer.php" </script>';
        // header("Location:teacher_editer.php");
    } else 
    {
        // echo "have class";
        $sql = "SELECT * FROM `subject` WHERE `subjectid`='$subjectid'";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        $subjectdata = $query -> fetch_assoc();
        $sql = "INSERT INTO `subject` (`subjectid`, `name`, `year`, `term`, `section`, `class`)
         VALUE ('{$subjectdata['subjectid']}', '{$subjectdata['name']}', '{$subjectdata['year']}', '{$subjectdata['term']}', {$subjectdata['section']}, '$class')";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        echo '<script type="text/javascript"> alert("เพิ่มห้องสำเร็จแล้ว"); window.location.href = "teacher_editer.php" </script>';
        // header("Location:teacher_editer.php");
    }
?>