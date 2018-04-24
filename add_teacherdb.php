<?php
    include("config.php");
    // studentid = year + sequence = 61 + 0001
    // subjectid = subject_group_no + year + year(1-6) + sequence = 1 + 61 + 1 + 01
    // teacherid = subject_group_no + sequence = 1 + 001
    // workid = subject_group_n + year + year(1-6) + subject_sequence + sequence = 1 + 61 + 1 + 1 + 0001
    $class = ['1/1','1/2','1/3','1/4','1/5','2/1','2/2','2/3','2/4','2/5',
    '3/1','3/2','3/3','3/4','3/5','4/1','4/2','4/3','4/4','4/5','5/1',
    '5/2','5/3','5/4','5/5'];
    $class_no = 0;
    $age = 13;
    $sex = 1;
    $no = 1 ;
    $group = 1;
    for($i = 0; $i<10; $i++){
        $sql = "INSERT INTO `teacher`
        (`teacherid`, `name`, `surname`, `sex`, `teachesData`) 
        VALUE ('$group"."0".$no."', 'teacherno$no', 'fromgroup$group', '$sex', '')";
        if(!mysqli_query($conn,$sql)){
            echo "wrong";
        }
        $no++;
        if($i==4){
            $group++;
            $no = 1;
            $sex = 2;
        }
        echo $sql;
    }
?>
