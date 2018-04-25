<?php
    // session_start();
    include("config.php");
    // echo $_SESSION['id'];
    // echo "<br>{$_SESSION['status']}";
    $sql = "SELECT DISTINCT `subjectid` FROM `workdata` WHERE `studentid`= {$_SESSION['id']} ORDER BY `subjectid` DESC";
    $query = mysqli_query($conn,$sql);
    $tabno = 0;
    $subtabno = 0;
    // if($query->num_rows > 0)
    // {
        while($data = $query->fetch_assoc())
        {
            // echo $data['subjectid'].":";
            $sql2 = "SELECT DISTINCT `workid` FROM `workdata` WHERE `studentid`= {$_SESSION['id']}";
            $query2 = mysqli_query($conn,$sql2);
            echo "<div class='tablv1'>";
            echo "<input id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
            
            $sql0 = "SELECT DISTINCT `year`,`term`,`name` FROM `subject` WHERE `subjectid`= {$data['subjectid']}";
            $query0 = mysqli_query($conn,$sql0);
            $objResult = mysqli_fetch_array($query0);
            // echo var_dump($objResult);
            echo "<label for='tabno".$tabno."-lv1'>".$objResult["year"]."/".$objResult["term"]." ".$objResult["name"]."</label>";  
            
            $subtabno = 0;
            // if($query2->num_rows > 0)
            // {
                while($workid = $query2->fetch_assoc())
                {
                    $sql3 = "SELECT * FROM `work` WHERE workid='{$workid["workid"]}'";
                    $query3 = mysqli_query($conn,$sql3);
                    if($query3 == true)
                    {
                        while($work = $query3->fetch_assoc())
                        {
                            echo "<div class='tablv2'>";
                            echo "<div class='worklist'>
                            <ul>";
                            echo "<li><a href='show_work_student.php?subjectid_from_index={$data['subjectid']}&workid_from_index={$workid["workid"]}&studentid_from_index={$_SESSION['id']}'> {$work['name']} </a></li>";
                        }
                    } else {}
                    echo "
                    </ul>
                    </div>
                    </div>";
                    $subtabno++;
                }
            // }
            echo "</div>";
            $tabno++; 
        }
    // }

    // $tabno = 0;
    // $subtabno = 0;
    // if($query->num_rows > 0)
    // {
    //     while($data = $query->fetch_assoc())
    //     {
            // echo "<div class='tablv1'>";
            // echo "<input id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
            // echo "<label for='tabno".$tabno."-lv1'>subject01</label>";
    //         if($query2->num_rows > 0)
    //         {
    //             while($data = $query2->fetch_assoc())
    //             {
                    // echo "<div class='tablv2'>";
                    // echo "<input id='tabno".$tabno."-lv2-".$subtabno."' type='checkbox' name='panel' />";
            
    //             }
    //         }

    //         echo "</div>";
    //         $tabno++;
    //     }
    // }
    session_write_close();
    mysqli_close($conn);
?>