<?php 
    session_start();
    include('config.php');
    $subjectid = $_GET['subjectid'];
    # check no data class #
    $sql = "SELECT `class` FROM `subject` WHERE `subjectid`='$subjectid'";
    $query = mysqli_query($conn, $sql);
    $classdata = $query -> fetch_assoc();
    if($classdata['class']==$_POST['class'])
    {
        echo '<script type="text/javascript"> alert("มีห้องนี้อยู่แล้ว"); if(window.confirm) {"teacher.php"} </script>';
    }    
    if($classdata['class']==null)
    {
        // echo "no class";
        $sql = "UPDATE `subject` SET `class`='{$_POST['class']}' WHERE `subjectid`='$subjectid'";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        header("Location:teacher.php");
    } else 
    {
        // echo "have class";
        $sql = "SELECT * FROM `subject` WHERE `subjectid`='$subjectid'";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        $subjectdata = $query -> fetch_assoc();
        $sql = "INSERT INTO `subject` (`subjectid`, `name`, `year`, `term`, `section`, `class`)
         VALUE ('{$subjectdata['subjectid']}', '{$subjectdata['name']}', '{$subjectdata['year']}', '{$subjectdata['term']}', '{$_POST['class']}', $subjectid)";
        header("Location:teacher.php");
    }
    
?>