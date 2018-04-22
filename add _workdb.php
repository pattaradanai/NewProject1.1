<?php
    include("config.php");
    // studentid = year + sequence = 61 + 0001
    // subjectid = subject_group_no + year + year(1-6) + sequence = 1 + 61 + 1 + 01
    // teacherid = subject_group_no + sequence = 1 + 001
    // workid = subject_group_n + year + year(1-6) + subject_sequence + sequence = 1 + 61 + 1 + 1 + 0001
    $class = ['1/1','1/2','1/3','1/4','1/5','2/1','2/2','2/3','2/4','2/5',
    '3/1','3/2','3/3','3/4','3/5','4/1','4/2','4/3','4/4','4/5','5/1',
    '5/2','5/3','5/4','5/5'];
    $class_no_odd = 1;
    $sublist = ['Ichi', 'Ni', 'San', 'Shi', 'Go', 'Roku', 'Nana', 'Hachi', 'Kyuu', 'Juu'];
    $age = 13;
    $sex = 1;
    $seq = 1 ;
    $year16 = 1;
    $group = 1;
    $sql = "SELECT `workid` FROM `workdata`";
    $workid = mysqli_query($conn,$sql);
    $sql = "SELECT `subjectid`, `name` FROM `subject`";
    $subjectid = mysqli_query($conn,$sql);
    while($wid = $workid->fetch_assoc()){
        while($sid = $subjectid->fetch_assoc()){
            $sql = "INSERT INTO `work` 
                    (`workid`, `subjectid`, `name`) VALUE
                    ({$wid['workid']}, {$sid['subjectid']}, 'work {$wid['workid']} for {$sid['name']} ')";
                    // echo $sql;
            if(!mysqli_query($conn,$sql)){
                echo "wrong";
            }
            break;
        }
    }
?>
