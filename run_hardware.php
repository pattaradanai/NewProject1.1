<?php 
    include("config.php");
    ini_set('max_execution_time', 300);

    for($i=1;$i<33;$i++){
        $res = file_get_contents('http://192.168.149.106/1st_photo.php');
        $base64 = base64_decode($res);
        $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/{$_GET['subjectid_from_index']}/";
        if( is_dir($dir) === false )
        {
            mkdir($dir);
        }
        $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/{$_GET['subjectid_from_index']}/{$_GET['workid_from_index']}/";
        if( is_dir($dir) === false )
        {
            mkdir($dir);
        }
        $dir = "C:/xampp/htdocs/NewProject1.1/images/img_data/{$_GET['subjectid_from_index']}/{$_GET['workid_from_index']}/{$_GET['studentid_from_index']}/";
        if( is_dir($dir) === false )
        {
            mkdir($dir);
        }
        if($i<10){
            $save = file_put_contents($dir."00".$i.".jpg", $base64);
            $img_addslashes = addslashes(file_get_contents($dir."00".$i.".jpg"));
            $base64_addslashes = addslashes($base64);
            // $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$i')";
            $sql = "INSERT INTO `workdata`(`workid`, `subjectid`, `studentid`, `comment`, `score`, `img`, `imgno`) 
                VALUE ('{$_GET['workid_from_index']}', '{$_GET['subjectid_from_index']}', '{$_GET['studentid_from_index']}', 'none comment', '50', '{$base64_addslashes}', $i)";
        if(mysqli_query($conn, $sql)){}
        } else {
            $save = file_put_contents($dir."0".$i.".jpg", $base64);
            $img_addslashes = addslashes(file_get_contents($dir."0".$i.".jpg"));
            $base64_addslashes = addslashes($base64);
            // $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$i')";
            $sql = "INSERT INTO `workdata`(`workid`, `subjectid`, `studentid`, `comment`, `score`, `img`, `imgno`) 
                VALUE ('{$_GET['workid_from_index']}', '{$_GET['subjectid_from_index']}', '{$_GET['studentid_from_index']}', 'none comment', '50', '{$base64_addslashes}', $i)";
            if(mysqli_query($conn, $sql)){}
        }
        $res = file_get_contents('http://192.168.149.106/2nd_photo.php');
        $plus_32 = $i + 32;
        $base64 = base64_decode($res);
        $save = file_put_contents($dir."0".$plus_32.".jpg", $base64);
        $img_addslashes = addslashes(file_get_contents($dir."0".$plus_32.".jpg"));
        $base64_addslashes = addslashes($base64);
        // $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$plus_32')";
        $sql = "INSERT INTO `workdata`(`workid`, `subjectid`, `studentid`, `comment`, `score`, `img`, `imgno`) 
            VALUE ('{$_GET['workid_from_index']}', '{$_GET['subjectid_from_index']}', '{$_GET['studentid_from_index']}', 'none comment', '50', '{$base64_addslashes}', $plus_32)";
        if(mysqli_query($conn, $sql)){}
    }
    echo "<script  type='text/javascript'>window.alert('ถ่ายภาพเสร็จแล้ว');window.location.href='sentWork.php?subjectid_from_index={$_GET['subjectid_from_index']}&workid_from_index={$_GET['workid_from_index']}&studentid_from_index={$_GET['studentid_from_index']}'</script>";
    // echo "ALL DONE!!";
?>