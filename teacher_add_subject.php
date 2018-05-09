<?php
    include("config.php");
    session_start();

    $sql = "SELECT `subjectid` FROM `subject` WHERE `name`='{$_POST['subname']}' AND `year`='{$_POST['year']}' AND `term`='{$_POST['term']}' AND `section`='{$_POST['section']}'";
    $query = mysqli_query($conn,$sql);
    $subjectid = $query->fetch_all();
    if(isset($subjectid[0])==null){
        # no data #
        $sql = "SELECT `subjectid` FROM `subject` WHERE `year`='{$_POST['year']}' AND `term`='{$_POST['term']}' ORDER BY `subjectid` ";
        $query = mysqli_query($conn,$sql);
        $last_subjectid = $query->fetch_array();
        // echo var_dump($last_subjectid);
        if($last_subjectid==NULL)
        {
            $subyear = substr($_POST["year"],2);
            $newid = $_POST['section'].$subyear.$_POST['term'].$_POST['year1-6']."01";
            // echo var_dump($last_seq);
            $sql = "INSERT INTO `subject` (`subjectid`, `name`, `year`, `term`, `section`, `class`) VALUES ('$newid', '{$_POST["subname"]}', '{$_POST["year"]}', '{$_POST["term"]}', '{$_POST["section"]}', '')";
            $query = mysqli_query($conn,$sql);
            $sql = "INSERT INTO `teachesdata` (`teacherid`, `subjectid`) VALUES ('{$_SESSION['id']}', '$newid')";
            $query = mysqli_query($conn,$sql);
        } else {
            $max_seq = 0;
            while($check_seq=$query->fetch_assoc()){
                // echo var_dump($check_seq['subjectid']);
                // echo "<br>";
                if($max_seq<substr($check_seq['subjectid'],5)){
                    $max_seq = substr($check_seq['subjectid'],5);
                }
            }
            // echo var_dump($last_subjectid);
            $subyear = substr($_POST["year"],2);
            if($max_seq<10){
                $last_seq = $max_seq + 1;
                $newid = $_POST["section"].$subyear.$_POST["term"].$_POST["year1-6"].'0'.$last_seq;
                $sql = "INSERT INTO `subject` (`subjectid`, `name`, `year`, `term`, `section`, `class`) VALUES ('$newid', '{$_POST["subname"]}', '{$_POST["year"]}', '{$_POST["term"]}', '{$_POST["section"]}', '')";
                $query = mysqli_query($conn,$sql);
                $sql = "INSERT INTO `teachesdata` (`teacherid`, `subjectid`) VALUES ('{$_SESSION['id']}', '$newid')";
                $query = mysqli_query($conn,$sql);
            } else {
                $last_seq = $max_seq + 1;
                $newid = $_POST["section"].$subyear.$_POST["term"].$_POST["year1-6"].$last_seq;
                $sql = "INSERT INTO `subject` (`subjectid`, `name`, `year`, `term`, `section`, `class`) VALUES ('$newid', '{$_POST["subname"]}', '{$_POST["year"]}', '{$_POST["term"]}', '{$_POST["section"]}', '')";
                $query = mysqli_query($conn,$sql);
                $sql = "INSERT INTO `teachesdata` (`teacherid`, `subjectid`) VALUES ('{$_SESSION['id']}', '$newid')";
                $query = mysqli_query($conn,$sql);
            }
        }
        // echo '<script type="text/javascript">'.'alert("รายวิชานี้ได้ถูกเพิ่มสำเร็จแล้ว");'.'</script>';
        echo '<script type="text/javascript">'.'alert("รายวิชานี้ได้ถูกเพิ่มสำเร็จแล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
    } else {
        # already have #
        echo '<script type="text/javascript">'.'alert("มีรายวิชานี้อยู่แล้ว");'.'window.location.href = "teacher_editer.php"'.'</script>';
    }
?>