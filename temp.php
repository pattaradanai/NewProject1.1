<?php
    session_start();
    // include("config.php");
    // // studentid = year + sequence *reser per year*
    // // subjectid = section + year + term + year(1-6) + sequence *reset per year*
    // // teacherid = section + sequence 
    // // workid = subject_group_n + year + year(1-6) + subject_sequence + sequence *reset per term*
    // $class = ['1/1','1/2','1/3','1/4','1/5','2/1','2/2','2/3','2/4','2/5',
    // '3/1','3/2','3/3','3/4','3/5','4/1','4/2','4/3','4/4','4/5','5/1',
    // '5/2','5/3','5/4','5/5'];
    // $class_no_odd = 1;
    // $sublist = ['Ichi', 'Ni', 'San', 'Shi', 'Go', 'Roku', 'Nana', 'Hachi', 'Kyuu', 'Juu'];
    // $age = 13;
    // $sex = 1;
    // $seq = 1 ;
    // $year16 = 1;
    // $group = 1;
    // $temp1 = `class1/2.no`;
    // $temp2 = '';
    // $sql = "SELECT c.no, s.name FROM `class1/2` c LEFT JOIN student s ON c.studentid = s.stuid";
    // // $sql = "SELECT `$temp` FROM `class1/2`";
    // // $query = mysqli_query($conn,$sql);
    // // while($data = $query -> fetch_assoc()){
    // //     echo var_dump($data);
    // // }
    // // $sql = "SELECT `teacherid` FROM `teacher`";
    // // $teacherid = mysqli_query($conn,$sql);
    // // $sql = "SELECT `subjectid` FROM `subject`";
    // // $subjectid = mysqli_query($conn,$sql);
    // // while($tid = $teacherid->fetch_assoc()){
    // //     while($sid = $subjectid->fetch_assoc()){
    // //         $sql = "INSERT INTO `teachesdata` 
    // //                 (`teacherid`, `subjectid`) VALUE
    // //                 ({$tid['teacherid']},{$sid['subjectid']})";
    // //                 // echo $tid['teacherid'];
    // //         if(!mysqli_query($conn,$sql)){
    // //             echo "wrong";
    // //         }
    // //         break;
    // //     }
    // // }
    $_SESSION['submit_subjectid'] = '1612101';
    $_SESSION['submit_workid'] = '161110004';
    $_SESSION['submit_studentid'] = '61002';
    $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/{$_SESSION['submit_subjectid']}/";
        if( is_dir($dir) === false )
        {
            mkdir($dir);
        }
        $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/{$_SESSION['submit_subjectid']}/{$_SESSION['submit_workid']}/";
        if( is_dir($dir) === false )
        {
            mkdir($dir);
        }
        $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/{$_SESSION['submit_subjectid']}/{$_SESSION['submit_workid']}/{$_SESSION['submit_studentid']}/";
        if( is_dir($dir) === false )
        {
            mkdir($dir);
        }
?>
