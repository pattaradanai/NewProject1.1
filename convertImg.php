<!DOCTYPE HTML>
<html>
 
 <?php
        $path = 'bottle/'.(String)$nameimg.'.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>

</html>
