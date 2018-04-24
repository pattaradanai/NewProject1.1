<?php
    include("config.php");
    session_start();

    $sql = "SELECT `subjectid` FROM `subject` WHERE `name`='{$_POST['subname']}' AND `year`='{$_POST['year']}' AND `term`='{$_POST['term']}' AND `section`='{$_POST['section']}'";
    $query = mysqli_query($conn,$sql);
    $subjectid = $query->fetch_all();
    if(isset($subjectid[0])==null){
        # no data #
        $sql = "SELECT `subjectid` FROM `subject` WHERE `year`='{$_POST['year']}' AND `term`='{$_POST['term']}' ORDER BY subjectid DESC";
        $query = mysqli_query($conn,$sql);
        $last_subjectid = $query->fetch_all();
        $last_seq = substr($last_subjectid[0][0],5);
        $last_seq+=1;
        $subyear = substr($_POST["year"],2);
        $sql = "INSERT INTO `subject` (`subjectid`, `name`, `year`, `term`, `section`, `class`) VALUES ('{$_POST["section"]}$subyear{$_POST["term"]}{$_POST["year1-6"]}$last_seq', '{$_POST["subname"]}', '{$_POST["year"]}', '{$_POST["term"]}', '{$_POST["section"]}', '')";
        $query = mysqli_query($conn,$sql);
        $sql = "INSERT INTO `teachesdata` (`teacherid`, `subjectid`) VALUES ('{$_SESSION['id']}', '{$_POST["section"]}$subyear{$_POST["term"]}{$_POST["year1-6"]}$last_seq')";
        $query = mysqli_query($conn,$sql);
        echo '<script type="text/javascript">'.'alert("รายวิชานี้ได้ถูกเพิ่มสำเร็จแล้ว");'.'window.location.href = "teacher.php"'.'</script>';
    } else {
        # already have #
        echo '<script type="text/javascript">'.'alert("มีรายวิชานี้อยู่แล้ว");'.'window.location.href = "teacher.php"'.'</script>';
    }
?>