<?php
    include("config.php");
    ini_set('max_execution_time', 500);
    /*
    teacher name+surname
    year+term+subject which that teacher teached
    class?/? which learn that subject
    work quantity in that subect
    student no(in class?/?)+name+surname+workdata(in that subject)
    */
    $tabno = 0;
    $subtabno = 0;
    $class_form = 0;
    ##### year+term+subject which that teacher teached #####
    # only subjectid #
    $sql = "SELECT * FROM `teachesdata` WHERE `teacherid`= {$_SESSION['id']}";
    $query_subjectid = mysqli_query($conn,$sql);

    while($subjectid = $query_subjectid->fetch_assoc()){
        
        # subject data(include year,term,name) # class?/? which learn that subject #
        $sql = "SELECT * FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`, `class`";
        $query_subjectdata = mysqli_query($conn,$sql);
        $temp_subjectdata = mysqli_fetch_array($query_subjectdata);

        ##### add html #####
        # add accordion lv1 with name #
        echo "<div class='tablv1'>";
        echo "<input class='input_tablv1' id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
        echo "<label class='label-tablv1' for='tabno".$tabno."-lv1'>".$temp_subjectdata["year"]."/".$temp_subjectdata["term"]." ".$temp_subjectdata["name"]."</label>";  
        # add accdion lv2 much as class#
        
        # re-query subject data #
        $sql = "SELECT * FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`, `class`";
        $query_subjectdata = mysqli_query($conn,$sql);
        while($subjectdata = $query_subjectdata->fetch_assoc())
        {
            if(!$subjectdata['class']==null){
                $workno = 1;
                echo "<div class='tablv2'>";
                echo "<input class='input_tablv2' id='tabno".$tabno."-lv2-".$subtabno."' type='checkbox' name='panel' />";
                echo "<label class='label_tablv2' for='tabno".$tabno."-lv2-".$subtabno."'> ห้อง ".$subjectdata['class']."</label>";
                # create table header #
                echo "<div class='acctable'>";
                echo "<table>
                    <tbody>
                    <tr>
                        <th class='nocol' rowSpan='2'>เลขที่</th>
                        <th rowSpan='2'>ชื่อ-นามสกุล</th>
                        <th colSpan='20'>งาน</th>
                    </tr>
                    <tr>";
                # create work col much as work quantity #
                $sql = "SELECT `workid` FROM `work_subjectdata` WHERE `subjectid`= {$subjectid['subjectid']}";
                $query_work = mysqli_query($conn,$sql);
                while($work = $query_work->fetch_assoc())
                {
                    echo "<td>$workno</td>";
                    $workno++;
                }
                echo "</tr>"; # close header row #
                # studentid + no in class #
                $sql = "SELECT * FROM `class{$subjectdata['class']}`";
                $query_studentid_no = mysqli_query($conn,$sql);
                # add student row much as student quantity #
                // $student_count = 0;
                while($studentid_no = $query_studentid_no->fetch_assoc())
                {
                    # create student row #
                    $sql = "SELECT * FROM `student` WHERE `studentid`='{$studentid_no['studentid']}'";
                    $query_studentname = mysqli_query($conn,$sql);
                    $studentname = $query_studentname->fetch_all();
                    // echo var_dump($studentname[0])."------";
                    echo "<tr>
                    <td class='nocol'>{$studentid_no['no']}</td>
                    <td class='namecol'>{$studentname[0][1]} {$studentname[0][2]}</td>";
                    
                    # create student work check #
                    $sql = "SELECT `workid` FROM `work_subjectdata` WHERE `subjectid`= {$subjectid['subjectid']}";
                    $query_check_work = mysqli_query($conn,$sql);
                    $query_check_work_all = $query_check_work->fetch_all();
                    // echo var_dump($query_work_all);
                    if($query_check_work_all==null)
                    {
                        echo "<td> No Work Assign </td>";
                    } else 
                    {
                        $sql = "SELECT `workid` FROM `work_subjectdata` WHERE `subjectid`= {$subjectid['subjectid']}";
                        $query_work = mysqli_query($conn,$sql);
                        while($work = $query_work->fetch_assoc()){
                            # student work in that subject #
                            $sql = "SELECT DISTINCT 'score' FROM `work_studentdata` WHERE `studentid`='{$studentid_no['studentid']}' AND `workid`='{$work['workid']}'";
                            $query_studentworklist = mysqli_query($conn,$sql);
                            $studentworklist = $query_studentworklist->fetch_all();
                            // echo $studentid_no['studentid']."----".isset($studentworklist[0]);
                            echo "<td>";
                            if(isset($studentworklist[0])>0){
                                echo "<a href='edit_work.php?subjectid_from_index={$subjectid['subjectid']}&workid_from_index={$work['workid']}&studentid_from_index={$studentid_no['studentid']}'><img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' /></a>";
                            } else {
                                echo "<a href='sentWork.php?subjectid_from_index={$subjectid['subjectid']}&workid_from_index={$work['workid']}&studentid_from_index={$studentid_no['studentid']}'><img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-256.png' /></a>";
                            }
                            echo "</td>";
                        }
                    }
                    # close student row #
                    echo "</tr>";
                }
                echo "</tbody>
                    </table>
                    </div>";
                # close tablv2 #
                echo "</div>";
            } else 
            {
                echo "<div class='tablv2'>";
                echo "ไม่มีข้อมูลห้อง";
                // if($class_form == 0){
                //     echo "<div>
                //     <form class='classform' action='teacher_add_new_class.php?subjectid={$temp_subjectdata['subjectid']}' method='POST'>
                //         <div>
                //             <label class='create_class_label' for='class' 
                //                 style='cursor: unset;box-shadow: none;background-color: rgb(40, 40, 40);' >Class: <input class='classinput' type='text' name='class'  placeholder='Class?/?' required></label>
                //             <div class='createacc' style='color: black'>
                //             <button type'submit'>
                //                 Add Class
                //             </button>
                //         </div>
                //         </div>
                //     </form>
                //     </div>";
                //     $class_form = 1;
                // }
                echo "</div>";
            }
            $subtabno++;
        }
        $class_form = 0;
        $tabno++;
        # close tablv1 #
        echo "</div>"; 
    }
?>