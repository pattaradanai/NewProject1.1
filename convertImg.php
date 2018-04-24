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
                
                $dir = "images/'$idstu[0]'";
                if( is_dir($dir) === false )
                {
                    mkdir($dir);
                } 

        while($imageData = mysqli_fetch_array($data)){
            $count = 1;
            if($count > 9){
                     $countName = $count;
                     
                    (String)$countName;
                    $nameimg = '0'.$countName;

                    
                    $count ++;
                    $path = "C:/xampp/htdocs/NewProject1.2/images/".$nameimg;     
                    echo $path;
                     echo ' ';                             
                    $success = file_put_contents($path, $imageData[0]);
            $count++;
        }  else{
                    $nameimg =  '00'.$count;
                    (String)$nameimg;
                   
                    $count ++;
                    $name = (String)$nameimg;
                    $path = "C:/xampp/htdocs/NewProject1.2/images/".$nameimg;         
                    $success = file_put_contents($path, $imageData[0]);
         
        }
    }
}
    
    ?>
</html>
