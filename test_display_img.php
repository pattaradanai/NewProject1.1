<?php
    session_start();
    include("config.php");
    $sql = "SELECT `img` FROM `workdata` ";
    $query = mysqli_query($conn,$sql);
    while($result = $query->fetch_assoc()){
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'"/>';
        // echo '<img src="imagecreatefromstring(base64_decode({$result["img"]}))" />';
        // $photo = imagecreatefromstring(base64_decode($result["img"]));
        // imagejpeg($photo,"C:/xampp/htdocs/NewProject1.1/temp.jpg");
        // echo var_dump(imagecreatefromstring(base64_decode($result['img'])));
    }
?>