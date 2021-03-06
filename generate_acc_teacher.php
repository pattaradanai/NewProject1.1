<?php 
    include('config.php');
    ini_set('max_execution_time', 500);
    # ต้องแสดงรายวิชาคล้ายกับตอนโชว์ 
    # tab แรกยังคงเป็นรายวิชา 
    # ส่วนข้อมูล tab ที่สอง จะมีรายการงานที่สั่ง เพื่อเอาไปใส่ในห้องต่างๆข้างล่าง
    # ข้างล่างจะมีรายชื่อห้องที่เรียนในวิชานี้
    # ภายในแต่ละห้องจะใส่รายการงานที่กำหนดไว้ข้างบน
    $tabno = 0;
    $subtabno = 0;
    $sql = "SELECT * FROM `teachesdata` WHERE `teacherid`= {$_SESSION['id']}";
    $query_subjectid = mysqli_query($conn,$sql);
    $alert_delwork = 1;
    $alert_delsub = 1;
    while($subjectid = $query_subjectid->fetch_assoc())
    {
        echo "<div style='display:flex;'>";
        $sql = "SELECT * FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`, `class`";
        $query_subjectdata = mysqli_query($conn,$sql);
        $temp_subjectdata = mysqli_fetch_array($query_subjectdata);
        echo "<div class='tablv1'>";
        echo  "<input class='input_tablv1' id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
        echo  "<label class='label-tablv1' for='tabno".$tabno."-lv1'>ปี".$temp_subjectdata["year"]."/".$temp_subjectdata["term"]." วิชา".$temp_subjectdata["name"]."</label>";  
        echo  "<div class='tablv2'>";
        ## เริ่มส่วนของงาน ##
        echo   "<div class='workdata'>";
        # เริ่มส่วนของตารางแสดงรายการงาน #
        echo    "<div class='work_table'>";
        echo     "<p class='tablv2-p1'>รายชื่องานที่มอบหมาย</p>";
        echo      "<table>";
        echo       "<tbody>";
        echo        "<tr>";
        echo         "<th>ชื่องาน</th>";
        echo         "<th>คะแนนเก็บ</th>";
        echo         "<th></th>";
        echo        "</tr>";
        $sql = "SELECT DISTINCT `workid`,`workname`, `max_score` FROM `work_subjectdata` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`";
        $query = mysqli_query($conn,$sql);
        if(!$query->num_rows>0)
        {
                echo "<tr><td colSpan='2'>ยังไม่มีข้อมูลงาน</td></tr>";
        } else
        {
                while($workdata = $query->fetch_assoc())
                {
                        echo "<tr>";
                        echo  "<td>";
                        echo   "<p>{$workdata['workname']}</p>";
                        echo  "</td>";
                        echo  "<td>";
                        echo   "<p>{$workdata['max_score']}</P>";
                        echo  "</td>";
                        echo  "<td>";
                        // echo   "<a class='a-link' onclick='del_work(\"{$workdata['workname']}\")'>ลบงานนี้</a>";
                        echo "<a data-toggle='modal' data-target='#alert_delwork_$alert_delwork' style='cursor:pointer; color:rgb(206, 69, 69)'>ลบงานนี้</a>
                        <div class='modal fade' id='alert_delwork_$alert_delwork' role='dialog' >
                        <div class='modal-dialog'>
                        <div class='modal-content'>
                                <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>แจ้งเตือน</h4>
                                </div>
                                <div class='modal-body'>
                                <p>ต้องการที่จะลบงาน {$workdata['workname']} หรือไม่</p>
                                </div>
                                <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal' onclick='del_work(\"{$workdata['workid']}\")' style='background-color:rgb(158, 208, 252);'>ตกลง</button>
                                <button type='button' class='btn btn-default' data-dismiss='modal' style='background-color:rgb(216, 217, 218);'>ยกเลิก</button>
                                </div>
                        </div>
                        </div>
                        </div>";
                        echo  "</td>";
                        echo "</tr>";
                        $alert_delwork++;
                }
        }
        echo    "</tbody>";
        echo   "</table>";
        echo  "</div>"; # work_table
        # จบส่วนของตารางแสดงรายการงาน #
        # เริ่มตารางฟอร์มของการเพิ่มงาน #
        echo  "<form class='work_form' action='teacher_add_work.php?editer_subjectid={$subjectid['subjectid']}' method='POST'>";
        echo   "<div>";
        echo    "<table>";
        echo     "<tbody>";
        echo      "<tr>";
        echo       "<th class='th-name'>ชื่องาน</th>";
        echo       "<th class='th-maxscore'>คะแนนเก็บ</th>";
        echo      "</tr>";
        echo      "<tr>";
        echo       "<td>";
        echo        "<input type='text' name='subject_name' placeholder='ชื่องาน' required>";  
        echo       "</td>";
        echo       "<td>";
        echo        "<input type='text' name='max_score' placeholder='คะแนนเก็บ 1-99' pattern='[0-9]{1,2}' required>";
        echo       "</td>";
        echo      "</tr>";
        echo     "</tbody>";
        echo    "</table>";
        echo   "</div>";
        echo   "<div class='btn_submit_work'>";
        echo    "<button type'submit'>";
        echo     "เพิ่มงานของวิชานี้";
        echo    "</button>";
        echo   "</div>";
        echo  "</form>";
        # จบตารางฟอร์มของการเพิ่มงาน #
        echo "</div>"; # workdata
        ## จบส่วนของงาน ##
        ## เริ่มส่วนของห้อง ##
        echo "<div class='classdata'>";
        # เริ่มส่วนของข้อมูลห้อง #
        echo  "<div class='class_list'>";
        $year = substr($subjectid['subjectid'],4,1);
        echo  "<h4>ห้องที่เรียนวิชานี้(ป.$year)</h4>";
        echo   "<ul>";
        $sql = "SELECT `class` FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `class`";
        $query = mysqli_query($conn,$sql);
        while($classdata = $query->fetch_assoc())
        {
                if($classdata['class']==NULL)
                {
                        echo "<li>ไม่มีข้อมูลห้อง</li>";
                } else 
                {
                        // echo "<form>";
                        echo "<li>ป.{$classdata['class']}  <a class='a-link' href='teacher_delete_class.php?editer_del_class={$classdata['class']}&editer_del_subjectid={$subjectid['subjectid']}'>ลบห้องนี้</a> ";
                        // echo "<select  name='subject_work_list' required>";
                        // echo  "<option value='' selected>--เลือกงานที่จะสั่ง--</option>";
                        // $sql0 = "SELECT `workname` FROM `work_subjectdata` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `class`";
                        // $query0 = mysqli_query($conn,$sql0);
                        // $value = 1;
                        // while($subject_work_list = $query0->fetch_assoc())
                        // {
                        //         echo  "<option value='$value'>{$subject_work_list['workname']}</option>";
                        // }
                        // echo "</select>";
                        // echo "<button type='submit' style='margin-left:5px;'><a class='a-link' href=''>เพิ่มงานให้ห้องนี้<a/></button>";
                        echo "</li>";
                        // echo "</form>";
                        # เริ่มงานของแต่ละห้อง #
                        echo  "<ul>";
                        $sql1 = "SELECT DISTINCT `workname`, `class`, `workid`
                                FROM `work_subjectdata` 
                                WHERE `subjectid`= {$subjectid['subjectid']} 
                                AND `class`='{$classdata['class']}' 
                                ORDER BY `workorder`";
                        $query1 = mysqli_query($conn,$sql1);
                        // echo var_dump($query1);
                        if($query1->num_rows == 0){
                                echo "<li>ยังไม่ได้สั่งงานให้ห้องนี้</li>";
                        } else {
                                while($class_work = $query1->fetch_assoc())
                                {
                                        // echo var_dump($class_work);
                                        echo "<li>{$class_work['workname']}<a class='a-link' style='margin-left:5px;' href='teacher_unassign_work.php?editer_unassign_subjectid={$subjectid['subjectid']}&editer_unassign_class={$classdata['class']}&editer_unassign_workid={$class_work['workid']}'>ยกเลิกงานนี้</a></li>";
                                }
                        }
                        echo   "</ul>";
                        # จบงานของแต่ละห้อง #
                        # เริ่มลิสของงานที่จะเพิ่มในห้องนี้ #
                        // echo "<li>";
                        echo   "<div>";
                        echo "<form name='add_work_to_class' action='teacher_assign_work.php?editer_assign_class={$classdata['class']}' method='POST'>";
                        echo "<select  name='subject_work_list' required>";
                        echo  "<option value='' selected>--เลือกงานที่จะสั่ง--</option>";
                        $sql0 = "SELECT DISTINCT `workid`, `workname`, `class` 
                                FROM `work_subjectdata` 
                                WHERE `subjectid`= {$subjectid['subjectid']} 
                                ORDER BY `workorder`";
                        $query0 = mysqli_query($conn,$sql0);
                        $value = 1;
                        while($subject_work_list = $query0->fetch_assoc())
                        {
                                if($classdata['class']!=$subject_work_list['class'])
                                {
                                        echo  "<option value='{$subject_work_list['workid']}'>{$subject_work_list['workname']}</option>";
                                        $value++;
                                }
                        }
                        echo "</select>";
                        echo "<button type='submit' style='margin-left:5px;'>สั่งงานให้ห้องนี้</button>";
                        echo "</form>";
                        echo "</div>";
                        // echo "</li>";
                        # จบลิสของงานที่จะเพิ่มในห้องนี้ #
                }
        }
        echo     "</ul>";
        # เริ่มฟอร์มเพิ่มห้อง #
        echo "<div>";
        echo "<form name='add_class_to_subject' action='teacher_add_class.php?editer_add_subjectid={$subjectid['subjectid']}' method='POST'>";
        echo  "<label>ห้อง: </label>";
        // echo  "<input type='text' name='class' placeholder='เลขห้อง เช่น 1/2, 2/5 ' pattern='[1-6]{1}/[1-6]{1}' style='margin-left:5px;' required/>";
        echo  "<select name='class' requried>";
        echo   "<option value='' selected>--เลือกห้อง--</option>";
        echo   "<option value='1'>ป.$year/1</option>";
        echo   "<option value='2'>ป.$year/2</option>";
        echo   "<option value='3'>ป.$year/3</option>";
        echo   "<option value='4'>ป.$year/4</option>";
        echo   "<option value='5'>ป.$year/5</option>";
        echo   "<option value='6'>ป.$year/6</option>";
        echo  "</select>";
        echo  "<button type='submit' style='margin-left:5px;'>เพิ่มห้องที่เรียนวิชานี้</button>";
        echo "</form>";
        echo "</div>";
        # จบฟอร์มเพิ่มห้อง #
        echo    "</div>"; # class_list
        # จบส่วนของข้อมูลห้อง #
        echo   "</div>"; # classdata
        ## จบส่วนของห้อง ##
        echo  "</div>"; # tablv2
        echo "</div>"; # tablv1
        # เริ่มส่วนของปุ่มลบวิชา #
        echo "<div style=' margin:0.8% 0px 0px 1%; width: 56px;'>";
        // echo  "<a class='a-link' href='teacher_delete_subject.php?editer_del_subjectid={$subjectid['subjectid']}' style='color:rgb(206, 69, 69);'>";
        // echo   "ลบวิชานี้";
        // echo  "</a>";
        echo "<a class='a-link' data-toggle='modal' data-target='#alert_delsub_$alert_delsub' style='cursor:pointer; color:rgb(206, 69, 69)'>ลบวิชานี้</a>
                <div class='modal fade' id='alert_delsub_$alert_delsub' role='dialog' >
                <div class='modal-dialog'>
                <div class='modal-content'>
                        <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4 class='modal-title'>แจ้งเตือน</h4>
                        </div>
                        <div class='modal-body'>
                        <p>ต้องการที่จะลบวิชา {$temp_subjectdata["name"]} หรือไม่</p>
                        </div>
                        <div class='modal-footer'>
                        <button type='button' class='btn btn-default' data-dismiss='modal' style='background-color:rgb(158, 208, 252);'>ตกลง</button>
                        <button type='button' class='btn btn-default' data-dismiss='modal' style='background-color:rgb(216, 217, 218);'>ยกเลิก</button>
                        </div>
                </div>
                </div>
                </div>";
        echo "</div>";
        echo "</div>";
        $alert_delsub++;
        $tabno++;
    }
?>