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

    while($subjectid = $query_subjectid->fetch_assoc())
    {
        $sql = "SELECT * FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`, `class`";
        $query_subjectdata = mysqli_query($conn,$sql);
        $temp_subjectdata = mysqli_fetch_array($query_subjectdata);
        echo "<div class='tablv1'>";
        echo  "<input class='input_tablv1' id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
        echo  "<label class='label-tablv1' for='tabno".$tabno."-lv1'>".$temp_subjectdata["year"]."/".$temp_subjectdata["term"]." ".$temp_subjectdata["name"]."</label>";  
        # เริ่มส่วนของตารางแสดงรายการงาน #
        echo   "<div class='work_table'>";
        echo    "<table>";
        echo     "<tbody>";
        echo      "<tr>";
        echo       "<th>ชื่องาน</th>";
        echo       "<th>คะแนนเต็ม</th>";
        echo       "<th></th>";
        echo      "</tr>";
        $sql = "SELECT `workname`, `max_score` FROM `work_subjectdata` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`";
        $query = mysqli_query($conn,$sql);
        while($workdata = $query->fetch_assoc())
        {
            echo "<tr>";
            echo  "<td>";
    //                   <div>
            echo   "<p>{$workdata['workname']}</p>";
    //                   </div>
            echo  "</td>";
            echo  "<td>";
    //                   <div>
            echo   "<p>{$workdata['max_score']}</P>";
    //                   </div>
            echo  "</td>";
            echo  "<td>";
    //                   <div>
            echo   "<button>ลบงานนี้</button>";
    //                   </div>
            echo  "</td>";
            echo "</tr>";
            
        }
        echo    "</tbody>";
        echo   "</table>";
        echo  "</div>";
        # จบส่วนของตารางแสดงรายการงาน #
        # เริ่มตารางฟอร์มของการเพิ่มงาน #
        echo  "<form class='work_form' action='' method='POST'>";
        echo   "<div>";
        echo    "<table>";
        echo     "<tbody>";
        echo      "<tr>";
        echo       "<th>ชื่องาน</th>";
        echo       "<th>คะแนนเต็ม</th>";
        echo      "</tr>";
        echo      "<tr>";
        echo       "<td>";
                    // <div>
        echo        "<input type='text' name='subject_name' placeholder='ชื่องาน' required>";  
                    // </div>
        echo       "</td>";
        echo       "<td>";
                    // <div>
        echo        "<input type='text' name='score' placeholder='คะแนนเต็ม' required>";
                    // </div>
        echo       "</td>";
        echo      "</tr>";
        echo     "</tbody>";
        echo    "</table>";
        echo   "</div>";
        echo   "<div class='btn_submit_work'>";
        echo    "<button type'submit'>";
        echo     "เพิ่มงาน";
        echo    "</button>";
        echo   "</div>";
        echo  "</form>";
        # จบตารางฟอร์มของการเพิ่มงาน #
        # เริ่มข้อมูลของแต่ละห้อง #
        $sql = "SELECT `class` FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `class`";
        $query = mysqli_query($conn,$sql);
        while($workdata = $query->fetch_assoc())
        {

        }
        # จบข้อมูลของแต่ละห้อง #
        echo "</div>"; 
    }


    // <div class='tablv1'>
    //     <input class='input_tablv1' id='tabno-lv1' type='checkbox' name='panel' />
    //     <label class='label-tablv1' for='tabno-lv1'>asd</label>
    //     <div class='edit_box'>
    //       <form class="work_form" action="" method="POST">
    //         <div class='form_table'>
    //           <table>
    //           <tbody>
    //             <tr>
    //               <th>ชื่องาน</th>
    //               <th>คะแนนเต็ม</th>
    //             </tr>
    //             <?php 
    //               echo "
    //               <tr>
    //                 <td>
    //                   <div>
    //                     <p>Subject name</p>
    //                   </div>
    //                 </td>
    //                 <td>
    //                   <div>
    //                     <p>my score</P>  
    //                   </div>
    //                 </td>
    //               </tr>";
    //             <tr>
    //               <td>
    //                 <div>
    //                   <input type="text" name="subject_name" placeholder="ชื่องาน" required>  
    //                 </div>
    //               </td>
    //               <td>
    //                 <div>
    //                   <input type="text" name="score" placeholder="คะแนนเต็ม" required>  
    //                 </div>
    //               </td>
    //             </tr>
    //           </tbody>
    //           </table>
    //         </div>
    //       <div class="createacc">
    //         <button type"submit">
    //           เพิ่มงาน
    //         </button>
    //       </div>
    //       </form>
    //     </div>
    //     <div class='edit_box'>
    //         <div class='form_table'>
    //           <ul style='padding-left: 1em; list-style-type: none;'>
    //           <li>
    //             <div>
    //               <p style='margin-bottom: 0px;'>ห้อง 1/1</p>
    //             </div>
    //             <div>
    //               <ul style='padding-left: 3px; list-style-type: none;'>
    //                 <li>
    //                   งานที่ หนึ่ง
    //                 </li>
    //                 <li>
    //                   <form style='margin-bottom:5px;'>
    //                     <select name="ห้อง" style='margin-left:5px; color: black; height: 100%'>
    //                       <option value="1">งานที่ 1</option>
    //                       <option value="2">งานที่ 2</option>
    //                     </select>
    //                     <button type"submit" style='color: black;'>
    //                       เพิ่มห้อง
    //                   </button>
    //                   </form>
    //                 </li> 
    //               </ul>
    //             </div>
    //           </li>
    //           <div>
    //             <input type="text" name="subject_name" placeholder="ห้อง" required>  
    //           </div>
    //           </ul>
    //         </div>
    //       <div class="createacc" style='margin-left:1em;'>
    //         <button type"submit" style='color: black;'>
    //           เพิ่มห้อง
    //         </button>
    //       </div>
    //     </div>
    //   </div>
?>