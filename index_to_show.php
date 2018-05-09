<<<<<<< HEAD
<?php 
    session_start();
    include('config.php');
    $block_no = $_GET['block_no'];
    $block_count = 1;
    $temp_workid = 0;
    $block_full = false;
    $count = 1;
    $img = "SELECT `workid`, `subjectid` FROM `work_subjectdata` ORDER BY `workid` DESC";
    $imgstd = mysqli_query($conn, $img);  
    while($workid = $imgstd -> fetch_assoc()){
        $img = "SELECT `work_studentdata`.`studentid`, `work611001`.`img` 
                FROM `work_studentdata` 
                LEFT JOIN `work611001` 
                ON `work_studentdata`.`studentid`=`work611001`.`studentid` 
                WHERE `work_studentdata`.`workid`={$workid['workid']}";
        $imgstd = mysqli_query($conn, $img);
        while($row = $imgstd -> fetch_assoc()){
            $studentid = $row['studentid'];
            $sql = "SELECT * FROM `student` WHERE `studentid`='$studentid'";
            $name = mysqli_query($conn, $sql);
            while($name_data = $name -> fetch_assoc()){
                // $_SESSION['studentid_no_1'] = $studentid;
                $count++;
               
                if($block_count != $block_no){
                    $block_count++;
                } else {
                    $_SESSION['index_show_subjectid'] = $workid['subjectid'];
                    $_SESSION['index_show_workid'] = $workid['workid'];
                    $_SESSION['index_show_studentid'] = $studentid;
                    // echo $_SESSION['status'];
                    // echo $_SESSION['index_show_subjectid']." ".$_SESSION['index_show_workid']." ".$_SESSION['index_show_studentid'];
                    header('Location: index_show_work.php');
                    exit();
                }
                break;
            }
            if($temp_workid == 0 )
            {
                $temp_workid = $workid['workid'];
            } else 
            {
                if($temp_workid == $workid['workid'])
                {
                    $block_no++;
                } else {
                    $temp_workid = $workid['workid'];
                    $block_no = 0;
                }
            }
            if($block_no == 12)
            {
                $block_full = true;
            }
        }
        if($block_full==true){
            $block_full = false;
            break;
        }
    }
