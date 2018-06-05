<?php 
    include("config.php");
    ini_set('max_execution_time', 300);
    #http://localhost/NewProject1.1/temp.php?subjectid_sent_work=3612212&workid_sent_work=612001&studentid_sent_work=61062
    $workid = $_GET['workid_sent_work'];
    $subjectid = $_GET['subjectid_sent_work'];
    $studentid = $_GET['studentid_sent_work'];
    // for($i=1;$i<33;$i++){
        $ip = '192.168.149.106';
        exec("ping -n 1 $ip", $output, $status);
        if($status==0){
            $res = file_get_contents('http://192.168.149.106/1st_photo.php');
            $base64 = base64_decode($res);
            $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/$subjectid/";
            if( is_dir($dir) === false )
            {
                mkdir($dir);
            }
            $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/$subjectid/$workid/";
            if( is_dir($dir) === false )
            {
                mkdir($dir);
            }
            $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/$subjectid/$workid/$studentid/";
            if( is_dir($dir) === false )
            {
                mkdir($dir);
            }
            if($i<10){
                $save = file_put_contents($dir."00".$i.".jpg", $base64);
                $img_addslashes = addslashes(file_get_contents($dir."00".$i.".jpg"));
                $base64_addslashes = addslashes($base64);
                // $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$i')";
                $sql = "INSERT INTO `work$workid`(`studentid`, `img`, `imgno`) 
                    VALUE ('$studentid', '{$base64_addslashes}','$i')";
                // $query = mysqli_query($conn, $sql);
            } else {
                $save = file_put_contents($dir."0".$i.".jpg", $base64);
                $img_addslashes = addslashes(file_get_contents($dir."0".$i.".jpg"));
                $base64_addslashes = addslashes($base64);
                // $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$i')";
                $sql = "INSERT INTO `work$workid`(`studentid`, `img`, `imgno`) 
                    VALUE ('$studentid', '{$base64_addslashes}', '$i')";
                // $query = mysqli_query($conn, $sql);
            }
            $res = file_get_contents('http://192.168.149.106/2nd_photo.php');
            $plus_32 = $i + 32;
            $base64 = base64_decode($res);
            $save = file_put_contents($dir."0".$plus_32.".jpg", $base64);
            $img_addslashes = addslashes(file_get_contents($dir."0".$plus_32.".jpg"));
            $base64_addslashes = addslashes($base64);
            // $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$plus_32')";
            $sql = "INSERT INTO `work$workid_index`(`studentid`, `img`, `imgno`) 
                VALUE ('$studentid', '{$base64_addslashes}', '$plus_32')";
            // $query = mysqli_query($conn, $sql);
        }
    // }
?>