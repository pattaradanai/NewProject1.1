<?php 
    include("config.php");
    ini_set('max_execution_time', 300);
    for($i=1;$i<33;$i++){
        $res = file_get_contents('http://192.168.149.106/1st_photo.php');
        $base64 = base64_decode($res);
        $dir = "images/img_data/{$_SESSION['submit_subjectid']}/{$_SESSION['submit_workid']}/{$_SESSION['submit_studentid']}/";
        if($i<10){
            if( is_dir($dir) === false )
            {
                mkdir($dir);
            }
            $save = file_put_contents($dir."00".$i.".jpg", $base64);
            $img_addslashes = addslashes(file_get_contents($dir."00".$i.".jpg"));
            $base64_addslashes = addslashes($base64);
            $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$i')";
            if(mysqli_query($conn, $sql)){}
        } else {
            if( is_dir($dir) === false )
            {
                mkdir($dir);
            }
            $save = file_put_contents($dir."0".$i.".jpg", $base64);
            $img_addslashes = addslashes(file_get_contents($dir."0".$i.".jpg"));
            $base64_addslashes = addslashes($base64);
            $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$i')";
            if(mysqli_query($conn, $sql)){}
        }
        $res = file_get_contents('http://192.168.149.106/2nd_photo.php');
        $plus_32 = $i + 32;
        $base64 = base64_decode($res);
        $save = file_put_contents($dir."0".$plus_32.".jpg", $base64);
        $img_addslashes = addslashes(file_get_contents($dir."0".$plus_32.".jpg"));
        $base64_addslashes = addslashes($base64);
        $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$plus_32')";
        if(mysqli_query($conn, $sql)){}
    }
    echo "ALL DONE!!";
?>