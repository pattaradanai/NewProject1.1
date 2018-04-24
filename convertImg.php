<!DOCTYPE HTML>
<html>
    <?php
    // mkdir('C:\xampp\htdocs\NewProject1.2\images', 07570532 ,true);
    include 'config.php';
    // change the name below for the folder you want
 
    mysqli_set_charset($conn, "utf8");

    $id =  "SELECT DISTINCT `studentid` FROM `workdata` WHERE 1";
    $sql = "SELECT `img` FROM `workdata` WHERE 1";
    $data = mysqli_query($conn, $sql);
    $stu = mysqli_query($conn,$id);

    

   while($idstu = mysqli_fetch_array($stu) ){
                 $idstu  =  (string)($idstu[0]);
                $dir = 'images/'.$idstu;
                echo   $idstu ;
                echo ' ';
                if( is_dir($dir) === false )
                {
                    mkdir($dir);
                } 

        while($imageData = $data -> fetch_assoc()){
            $count = 1;
            if($count > 9){
                     $countName = $count;
                  
                    (String)$countName;
                    $nameimg = '0'.$countName;
                    echo  $nameimg;
                    $success = file_put_contents('C:/xampp/htdocs/NewProject1.2/images/'.$nameimg, $imageData['img']);
                    $count ++;
                    echo ' ';
                                           
                    
                    
        }  else{
                    $nameimg =  '00'.$count;
                   
                  
                    
                    $name = (String)$nameimg;
                    echo   $name;
                    echo ' ';
                           
                    $success = file_put_contents('C:/xampp/htdocs/NewProject1.2/images/'.$name, $imageData['img']);
                    $count ++;
         
        }
    }
}
    
    ?>
</html>
