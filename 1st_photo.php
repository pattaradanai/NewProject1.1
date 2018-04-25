<?php 
    include("config.php");
    $res = file_get_contents('http://192.168.149.106/1st_photo.php');
    for($i=0;$i<32;$i++){
        $base64 = base64_decode($res);
        $save = file_put_contents('images/temp/img_form_rpi_'.$i.'.jpg', $base64);

        $img_addslashes = addslashes(file_get_contents('images/temp/img_form_rpi_'.$i.'.jpg'));
        $base64_addslashes = addslashes($base64);
        $sql = "INSERT INTO `testimg` (`image`,`no`) VALUE ('$base64_addslashes','$i')";
        if(mysqli_query($conn, $sql)){
            echo "insert success";
        } else {
            echo "insert failure";
        }
    }
?>