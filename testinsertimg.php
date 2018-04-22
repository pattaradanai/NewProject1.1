<!DOCTYPE HTML>
<html>

<?php
 
 include 'config.php';
 $count = 1;

 while($count <= 64){
       
                if($count > 9){
                    $countName = $count;
                    (String)$countName;
                    $nameimg = '0'.$countName;
                    echo  $nameimg;
                    echo "  " ;
                    gettype ($nameimg);
                    $count ++;
                    
                }else{
                    $nameimg =  '00'.$count;
                    (String)$nameimg;
                    echo $nameimg;
                    echo gettype ((String)$nameimg);
                    $count ++;
                    $name = (String)$nameimg;
                    echo "  " ;
                 
                }

                $path = 'bottle/'.(String)$nameimg.'.jpeg';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                $work = '1111';
                $id = '22222';
                $img =  $base64;
                $sub = '2222';

                $sql = "INSERT INTO workdata (workData,stuid,img,'subject')
                VALUES ('$work', '$id', '$img','$sub')";
                mysqli_query($sql);
                
                
                echo "<script>alert('Successfully Added!!!'); window.location='index.php'</script>";
               
                




 }

 


?>




</html>
