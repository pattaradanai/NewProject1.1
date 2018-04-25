<?php
session_start();
    include("config.php");

    $sql = "SELECT `subjectid` FROM `teachesdata` WHERE `teacherid`= {$_SESSION['id']} ORDER BY `subjectid` DESC";
    $query = mysqli_query($conn,$sql);
    $tabno = 0;
    $subtabno = 0;
    // if($query->num_rows > 0)
    // {
        while($data = $query->fetch_assoc())
        {
            // echo $data['teachesData'].":";
            $sql2 = "SELECT `class` FROM `subject` WHERE `subjectid`= {$data['subjectid']}";
            $query2 = mysqli_query($conn,$sql2);
            echo "<div class='tablv1'>";
            echo "<input id='tabno".$tabno."-lv1' type='checkbox' name='panel' />";
            
            $sql0 = "SELECT DISTINCT `year`,`term`,`name` FROM `subject` WHERE `subjectid`= {$data['subjectid']}";
            $query0 = mysqli_query($conn,$sql0);
            $objResult = mysqli_fetch_array($query0);
            // echo var_dump($objResult);
            echo "<label for='tabno".$tabno."-lv1'>".$objResult["year"]."/".$objResult["term"]." ".$objResult["name"]."</label>";  
            
            $subtabno = 0;
            if($query2->num_rows > 0)
            {
                while($class = $query2->fetch_assoc())
                {
                    // echo $class['class']." ";
                    $sql3 = "SELECT c.no, s.name, s.surname FROM `class{$class['class']}` c LEFT JOIN student s ON c.studentid = s.stuid";
                    $query3 = mysqli_query($conn,$sql3);
                    echo "<div class='tablv2'>";
                    echo "<input id='tabno".$tabno."-lv2-".$subtabno."' type='checkbox' name='panel' />";
                    echo "<label for='tabno".$tabno."-lv2-".$subtabno."'> Class ".$class['class']."</label>";
                    echo "<div class='acctable'>
                    <table>
                    <tbody>";
                    echo "<tr>
                        <th class='nocol' rowSpan='2'>No.</th>
                        <th rowSpan='2'>name</th>
                        <th colSpan='20'>work</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>";
                    if($query3 == true)
                    {
                        while($student = $query3->fetch_assoc())
                        {
                            // echo $student["name"];
                            echo "<tr>";
                            echo "<td class='nocol'>{$student["no"]}</td>";
                            echo "<td class='namecol'>{$student["name"]} {$student["surname"]}</td>";
                            // echo var_dump($data['subjectid']);
                            $sql11 = "SELECT `workid` FROM `work` WHERE `subjectid`='{$data['subjectid']}'";
                            $query11 = mysqli_query($conn,$sql11);
                            $sql12 = "SELECT `studentid` FROM `class{$class['class']}` WHERE `year`='{$objResult["year"]}' AND `term`='{$objResult["term"]}'";
                            $query12 = mysqli_query($conn,$sql12);
                            $work = $query11->fetch_assoc();
                                // echo $sql;
                                while($studentid = $query12->fetch_assoc())
                                {
                                    $sql = "SELECT * FROM `workdata` WHERE `workid`='{$work["workid"]}' AND `studentid`='{$studentid["studentid"]}'";
                                    $query = mysqli_query($conn,$sql);
                                    // echo var_dump($studentid);
                                    // echo var_dump($query);
                                    if($query!=null){
                                        // echo var_dump($query);
                                        while($checkwork = $query->fetch_assoc())
                                        {
                                            // echo var_dump($checkwork);
                                            echo "<td>";
                                            echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' />";
                                            echo "</td>";
                                            // break;
                                        }
                                    } else {
                                        echo "<td>";
                                        echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-256.png' />";
                                        echo "</td>";
                                    }
                                    break;
                                }
                                // echo "<td>";
                                // echo var_dump($work);
                                // echo "</td>";
                            
                            echo "</tr>";
                        }
                    } else {}
                    echo "
                    </tbody>
                    </table>
                    </div>
                    </div>";
                    $subtabno++;
                }
            }
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