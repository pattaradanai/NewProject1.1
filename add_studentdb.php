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
    $no = 1 ;
    for(; $class_no<25 ; $class_no++){
        for($i = 0 ; $i < 10 ; $i++){
            // echo $class_no;
            if($no<10){
                $student = "INSERT INTO `student` 
                (`studentid`, `name`, `surname`, `class`, `sex`, `no`, `age`) VALUES 
                ('6100$no', 'student', '61no00$no', '{$class[$class_no]}', '{}', '', '{$age}')";
            } else if($no<100){
                $student = "INSERT INTO `student` 
                (`studentid`, `name`, `surname`, `class`, `sex`, `no`, `age`) VALUES 
                ('610$no', 'student', '61no0$no', '{$class[$class_no]}', '{}', '', '{$age}')";
            } else {
                $student = "INSERT INTO `student` 
                 (`studentid`, `name`, `surname`, `class`, `sex`, `no`, `age`) VALUES 
                ('61$no', 'student', '61no$no', '{$class[$class_no]}', '{}', '', '{$age}')";        
            }
            // $query = mysqli_query($conn,$student);
            if(!mysqli_query($conn,$student)){
                echo "wrong";
            }
            // echo $student."/r/n";
            $no++;
        }
    }
    
?>