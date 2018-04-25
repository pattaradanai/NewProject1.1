<?php
    include("config.php");
    /*
    teacher name+surname
    year+term+subject which that teacher teached
    class?/? which learn that subject
    work quantity in that subect
    student no(in class?/?)+name+surname+workdata(in that subject)
    */
    $tabno = 0;
    $subtabno = 0;
    $workno = 1;
    
    ##### year+term+subject which that teacher teached #####
    # only subjectid #
    $sql = "SELECT * FROM `teachesdata` WHERE `teacherid`= {$_SESSION['id']}";
    $query_subjectid = mysqli_query($conn,$sql);

    while($subjectid = $query_subjectid->fetch_assoc()){
        # subject data(include year,term,name) # class?/? which learn that subject #
        $sql = "SELECT * FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`, `class`";
        $query_subjectdata = mysqli_query($conn,$sql);
        $subjectdata = mysqli_fetch_array($query_subjectdata);

        ##### add html #####
        # add accordion lv1 with name #
        echo "<div class='tablv1'>";
        echo "<input id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
        echo "<label for='tabno".$tabno."-lv1'>".$subjectdata["year"]."/".$subjectdata["term"]." ".$subjectdata["name"]."</label>";  
        # add accdion lv2 much as class#
        $sql = "SELECT DISTINCT `workid` FROM `workdata` WHERE `subjectid`= {$subjectid['subjectid']}";
        $query_work = mysqli_query($conn,$sql);
        $sql = "SELECT * FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`, `class`";
        $query_subjectdata = mysqli_query($conn,$sql);
        while($subjectdata = $query_subjectdata->fetch_assoc())
        {
            echo "<div class='tablv2'>";
            echo "<input id='tabno".$tabno."-lv2-".$subtabno."' type='checkbox' name='panel' />";
            echo "<label for='tabno".$tabno."-lv2-".$subtabno."'> Class ".$subjectdata['class']."</label>";
            # create table header #
            echo "<div class='acctable'>
                <table>
                <tbody>
                <tr>
                    <th class='nocol' rowSpan='2'>No.</th>
                    <th rowSpan='2'>name</th>
                    <th colSpan='20'>work</th>
                </tr>
                <tr>";
            # create work col much as work quantity #
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
                $sql = "SELECT * FROM `student` WHERE `stuid`='{$studentid_no['studentid']}'";
                $query_studentname = mysqli_query($conn,$sql);
                $studentname = $query_studentname->fetch_all();
                // echo var_dump($studentname[0])."------";
                echo "<tr>
                <td class='nocol'>{$studentid_no['no']}</td>
                <td class='namecol'>{$studentname[0][1]} {$studentname[0][2]}</td>";
                # student work in that subject #
                $sql = "SELECT DISTINCT * FROM `workdata` WHERE `studentid`='{$studentid_no['studentid']}' AND `subjectid`='{$subjectid['subjectid']}'";
                $query_studentworklist = mysqli_query($conn,$sql);
                $studentworklist = $query_studentworklist->fetch_all();
                // echo $studentid_no['studentid']."----".isset($studentworklist[0]);
                if(isset($studentworklist[0])>0){
                    echo "<td><img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' /></td>";
                } else {
                    echo "<td><img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-256.png' /></td>";
                }
                # close student row #
                echo "</tr>";
            }
            echo "</tbody>
                </table>
                </div>";
            # close tablv2 #
            echo "</div>";
            $subtabno++;
            
        }
        $tabno++;
        # close tablv1 #
        echo "</div>"; 
    }





    
    // echo var_dump($subjectdata);
    // while($data = $query->fetch_assoc()){
    //     echo var_dump($data);
    // }
?>