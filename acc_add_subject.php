<?php
    include("config.php");

    session_start();

    $sql = "SELECT `teachesData` FROM teachesdata WHERE `subject`='".$_POST["subname"]."' ";
    $query = mysqli_query($conn,$sql);
    // echo var_dump($query);
    if($query->num_rows > 0){
        echo '<script type="text/javascript">'.'alert("รายวิชานี้ได้ถูกเพิ่มแล้ว");'.'window.location.href = "teacher.php"'.'</script>';
        echo "already add";
        exit();
    } else {
        $sql = "SELECT DISTINCT teachesData FROM teachesdata ORDER BY teachesData DESC";
        $query = mysqli_query($conn,$sql);
        $last = 0;
        while($data = $query->fetch_assoc())
        {
            $last = $data['teachesData']+1;
            $sql = "INSERT INTO teachesdata (teachesData, year, term, subject) VALUES ('".$last."', '".$_POST["year"]."', '".$_POST["term"]."', '".$_POST["subname"]."')";
            echo $sql;
            $query = mysqli_query($conn,$sql);
            exit();
        }
    }
?>