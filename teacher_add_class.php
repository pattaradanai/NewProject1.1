<?php 
    include('config.php');
    $class_number = $_POST['class'];
    $subjectid = $_GET['editer_add_subjectid'];
    $class = substr($subjectid,4,1);
    // echo $class;
    # check no data class #
    $sql = "SELECT `class` FROM `subject` WHERE `subjectid`='$subjectid'";
    $query = mysqli_query($conn, $sql);
    $temp = $class.'/'.$class_number;
    $already_have_this_class = false;
    while($classdata = $query -> fetch_assoc()){
        // echo $classdata['class'].' '.$temp;
        if($classdata['class']==$temp)
        {
            $already_have_this_class = true;
            break;
        }  
    }
    // echo var_dump($classdata);
    if($already_have_this_class == true)
    {
        echo '<script type="text/javascript"> alert("มีห้องนี้อยู่แล้ว"); window.location.href = "teacher_editer.php" </script>';
        // header("Location:teacher_editer.php");
        exit();
    }    
    $sql = "SELECT `class` FROM `subject` WHERE `subjectid`='$subjectid'";
    $query = mysqli_query($conn, $sql);
    $classdata = $query -> fetch_all();
    if($classdata[0][0]==null)
    {
        // echo "no class";
        $sql = "UPDATE `subject` SET `class`='$class/$class_number' WHERE `subjectid`='$subjectid'";
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
         VALUE ('{$subjectdata['subjectid']}', '{$subjectdata['name']}', '{$subjectdata['year']}', '{$subjectdata['term']}', {$subjectdata['section']}, '$class/$class_number')";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        echo '<script type="text/javascript"> alert("เพิ่มห้องสำเร็จแล้ว"); window.location.href = "teacher_editer.php" </script>';
        // header("Location:teacher_editer.php");
    }
?>