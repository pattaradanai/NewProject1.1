<?php
    session_start();
    include('config.php');
    $sql = "SELECT DISTINCT `workid` FROM `work_subjectdata` ORDER BY `workid` ";
    $query = mysqli_query($conn, $sql);
    while($workid_worksubdata = $query -> fetch_assoc()){

        echo "งานรหัส {$workid_worksubdata['workid']}";
        echo "<br>";

        $sql2 = "SELECT DISTINCT `work_studentdata`.`studentid`, `work{$workid_worksubdata['workid']}`.`imgno`, `work{$workid_worksubdata['workid']}`.`img`
                FROM `work_studentdata` 
                LEFT JOIN `work{$workid_worksubdata['workid']}` 
                ON `work_studentdata`.`studentid`=`work{$workid_worksubdata['workid']}`.`studentid` 
                WHERE `work_studentdata`.`workid`='{$workid_worksubdata['workid']}'
                AND `work{$workid_worksubdata['workid']}`.`imgno`='33'";
               
        // echo $sql2;
        $query2 = mysqli_query($conn, $sql2);
        while($studentid_img = $query2 -> fetch_assoc()){

            echo "นักเรียนรหัส {$studentid_img['studentid']} ภาพที่ {$studentid_img['imgno']} <br>";
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $studentid_img['img'] ).'"  width="200" height="200" /><br>'; 
        }
    }
?>
