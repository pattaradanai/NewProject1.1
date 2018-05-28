<?php
    // session_start();
    include("config.php");
    // echo $_SESSION['id'];
    // echo "<br>{$_SESSION['status']}";
    # เช็คว่านักเรียนคนนี้เรียนกี่วิชา #
    $sql = "SELECT DISTINCT `work_subjectdata`.subjectid 
            FROM `work_studentdata` 
            LEFT JOIN `work_subjectdata` 
            ON `work_studentdata`.workid = `work_subjectdata`.workid 
            WHERE `work_studentdata`.studentid = '{$_SESSION['id']}'
            ORDER BY `work_subjectdata`.subjectid DESC";
    $query = mysqli_query($conn,$sql);
    // echo $sql;
    $is_subjectid = $query->fetch_assoc();
    $tabno = 0;
    $subtabno = 0;
    // if($query->num_rows > 0)
    // {
    $sql = "SELECT DISTINCT `work_subjectdata`.subjectid 
        FROM `work_studentdata` 
        LEFT JOIN `work_subjectdata` 
        ON `work_studentdata`.workid = `work_subjectdata`.workid 
        WHERE `work_studentdata`.studentid = '{$_SESSION['id']}'
        ORDER BY `work_subjectdata`.subjectid DESC";
    $query = mysqli_query($conn,$sql);
    if($is_subjectid['subjectid']!=NULL){
        # สร้าง tablv1 ตามจำนวนของวิชาที่เรียน #
        while($data = $query->fetch_assoc())
        {
            // echo $data['subjectid'];
            echo "<div class='tablv1'>";
            echo "<input id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
            # เอาข้อมูลวิชามาแสดง tablv1 #
            $sql = "SELECT DISTINCT `year`,`term`,`name` 
                    FROM `subject` 
                    WHERE `subjectid`= {$data['subjectid']}";
            $query = mysqli_query($conn,$sql);
            $objResult = mysqli_fetch_array($query);
            // echo var_dump($objResult);
            echo "<label for='tabno".$tabno."-lv1'>".$objResult["year"]."/".$objResult["term"]." ".$objResult["name"]."</label>";  
            # เช็คว่าวิชานี้มีกี่ชิ้นงาน #
            $sql = "SELECT `workid` ,`subjectid`
                     FROM `work_subjectdata` 
                     WHERE `subjectid`= {$data['subjectid']}";
            $query = mysqli_query($conn,$sql);
            $subtabno = 0;
            # เช็คว่ามีงานอยู่ไหม #
            if($query->num_rows > 0)
            {
                while($workid = $query->fetch_assoc())
                {
                    echo "<div class='tablv2'>";
                    echo "<div class='worklist'> ";
                    echo "<div style='display:-webkit-inline-box;'>";
                    echo "<div style='height:5em; width:13%;'>";
                    echo "<p style='margin-left:13px; margin-bottom: 0px; display: inline;'>หมายเหตุ:</p>";
                    echo "</div>";
                    echo "<div style='height:5em; left:87%;'>";
                    echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' style='width: 1em;  margin-right:4px;'/>หมายถึง ได้ส่งและบันทึกงานชิ้นนี้แล้ว";
                    echo "<img src='https://i.imgur.com/pDqvmwb.png' style='width: 23px; margin-right:4px; margin-left: 23px; word-wrap:break-word;'/>หมายถึง ไม่ให้งานนี้แสดงในหน้าportfolio<br> ";
                    // echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' style='width: 1em; margin-left:1em; margin-right:4px;'/>หมายถึง ได้ส่งและบันทึกงานชิ้นนี้แล้ว<br>";
                    echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-256.png' style='width: 1em; margin-right:4px; '/>หมายถึง ยังไม่ได้ส่งและบันทึกงานชิ้นนี้";
                    echo "<img src='https://i.imgur.com/zpJ2gms.png' style='width: 23px; margin-right:4px; margin-left: 1em ;'/>หมายถึง เลือกให้งานนี้แสดงในหน้าportfolio ";
                    echo "</div>";
                    echo "</div>";
                    // echo "<ul>";
                    echo "<table>";
                    echo "<tbody>";
                    # สร้าง tablv2 ตามจำนวนงาน #
                    $sql2 = "SELECT DISTINCT `workid`, `workname`, `subjectid` FROM `work_subjectdata` 
                            WHERE `subjectid`='{$data['subjectid']}'";
                    $query2 = mysqli_query($conn,$sql2);
                    while($work = $query2->fetch_assoc())
                    {
                        // echo "<li>";
                        echo "<tr>";
                        echo "<td>";
                        $sql = "SELECT `portfolio` 
                                FROM `work_studentdata` 
                                WHERE `studentid`='{$_SESSION['id']}' 
                                AND `workid`='{$work['workid']}'";
                        $query = mysqli_query($conn,$sql);
                        $portfolio = $query->fetch_assoc();
                        if($portfolio['portfolio']==1){
                            echo "<img id='portfolio_img_{$work['workid']}' class='portfolio_icon' src='https://i.imgur.com/zpJ2gms.png' onclick='changePortfolioStatus({$work['workid']})'/>";
                        } else {
                            echo "<img id='portfolio_img_{$work['workid']}' class='portfolio_icon' src='https://i.imgur.com/pDqvmwb.png' onclick='changePortfolioStatus({$work['workid']})'/>";
                        }
                        $sql = "SELECT `imgno` FROM `work{$work['workid']}` 
                            WHERE studentid='{$_SESSION['id']}'";
                        $query = mysqli_query($conn,$sql);
                        if($query->num_rows > 0)
                        {
                            echo "<a href='student_to_show.php?
                            studentid_to_show={$_SESSION['id']}
                            &workid_to_show={$work['workid']}
                            &subjectid_to_show={$work['subjectid']}' style='color:black;'>
                            <img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' style='width: 1em; margin-right: 3px; margin-bottom: 3px;'/>";
                        } else 
                        {
                            echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-256.png' style='width: 1em; margin-right: 3px; margin-bottom: 3px;'/>";
                        }
                        // echo "{$work['workname']}</a></li>";
                        echo "{$work['workname']}</a></td></tr>";
                    }
                    echo "</table>";
                    echo "</tbody>";
                    // echo "</ul>";
                    echo "</div>
                    </div>";
                }
            } else 
            {
                echo "<div class='tablv2'>";
                echo "<div class='worklist'> <ul>";
                echo "<li>ยังไม่มีงานที่สั่งในตอนนี้</li>";
                echo "</ul>
                    </div>
                    </div>";
                $subtabno++;
            }
            echo "</div>";
            $tabno++; 
            
        }
    } 
    // else {
    //     echo "<p>ยัง</p>";
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
?>