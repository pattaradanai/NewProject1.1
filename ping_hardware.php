<?php
    $ip = '192.168.149.106';
    exec("ping -n 3 $ip", $output, $status);
    echo $status;
?>