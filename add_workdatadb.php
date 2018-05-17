<?php
    session_start();
    include("config.php");
    // studentid = year + sequence = 61 + 0001
    // subjectid = subject_group_no + year + term + year(1-6) + sequence = 1 + 61 + 1 + 01
    // teacherid = subject_group_no + sequence = 1 + 001
    // workid = subject_group_n + year + year(1-6) + subject_sequence + sequence = 1 + 61 + 1 + 1 + 0001
    $seq = 1;
    for($i=0; $i<32; $i++){
        $image = addslashes(file_get_contents('C:/Student Portfolio Project/image/bottle/tissue'.$seq.'.jpg'));
        // echo var_dump($image);
        $sql = "INSERT INTO `workdata`(`workid`, `subjectid`, `studentid`, `comment`, `score`, `img`, `imgno`) VALUE ('161110003', '1612101', '61012', 'none comment', '60', '{$image}', $seq)";
        // echo $sql;
        if(!mysqli_query($conn,$sql)){
            // echo "wrong";
            echo("Error description: " . mysqli_error($conn));
            // echo mysql_error($conn);
        }
        $seq++;
    }
?>