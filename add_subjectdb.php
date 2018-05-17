<?php
    include("config.php");
    // studentid = year + sequence = 61 + 0001
    // subjectid = subject_group_no + year + term + year(1-6) + sequence = 1 + 61 + 1 + 01
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
    $term = 2;
    $year16 = 1;
    $group = 1;
    for($i = 0; $i<10; $i++){
        if($seq<10){
            $sql = "INSERT INTO `subject`
            (`subjectid`, `name`, `year`, `term`, `class`) 
            VALUE ('$group"."61".$term.$year16."0".$seq."', 'Subject $seq $sublist[$i]', '2561', '1', '$class[$class_no_odd]')";
        } else {
            $sql = "INSERT INTO `subject`
            (`subjectid`, `name`, `year`, `term`, `class`) 
            VALUE ('$group"."61".$year16.$term.$seq."', 'Subject $seq $sublist[$i]', '2561', '1', '$class[$class_no_odd]')";
        }
        if(!mysqli_query($conn,$sql)){
            echo "wrong";
        }
        $class_no_odd+=2;
        if($class_no_odd%10==5){
            $class_no_odd+=2;
        }
        
        if($seq%2==0){
            $year16++;
        }
        $seq++;
        if($i==4){
            $group++;
        }
    }
?>