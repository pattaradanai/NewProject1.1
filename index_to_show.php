<?php 
    session_start();
    include('config.php');
    $block_no = $_GET['block_no'];
    $block_count = 1;
    $temp_workid = 0;
    $block_full = false;
    $count = 1;
    $sql = "SELECT DISTINCT `workid`, `subjectid` FROM `work_subjectdata` ORDER BY `workid` ";
    $query = mysqli_query($conn, $sql);
    while($workid_worksubdata = $query -> fetch_assoc()){
        $sql2 = "SELECT DISTINCT `work_studentdata`.`studentid`, `work{$workid_worksubdata['workid']}`.`imgno`, `work{$workid_worksubdata['workid']}`.`img`
                FROM `work_studentdata` 
                LEFT JOIN `work{$workid_worksubdata['workid']}` 
                ON `work_studentdata`.`studentid`=`work{$workid_worksubdata['workid']}`.`studentid` 
                WHERE `work_studentdata`.`workid`='{$workid_worksubdata['workid']}'
                AND `work{$workid_worksubdata['workid']}`.`imgno`='33'";
        $query2 = mysqli_query($conn, $sql2);
        while($studentid_img = $query2 -> fetch_assoc()){
            $studentid = $studentid_img['studentid'];
            $sql3 = "SELECT * FROM `student` WHERE `studentid`='$studentid'";
            $name = mysqli_query($conn, $sql);
            while($name_data = $name -> fetch_assoc()){
                $count++;
                if($block_count != $block_no){
                    $block_count++;
                } else {
                    $_SESSION['index_show_subjectid'] = $workid_worksubdata['subjectid'];
                    $_SESSION['index_show_workid'] = $workid_worksubdata['workid'];
                    $_SESSION['index_show_studentid'] = $studentid;
                    header('Location: index_show_work.php');
                    exit();
                }
                break;
            }
        }
    }