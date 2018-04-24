<?php
    session_start();
    include('config.php');

    $sql = "INSERT INTO `user` (`username`, `password`, `status`, `id`) VALUE ('pukdee_p', '55555', '1', '61002')";
    $query = mysqli_query($conn, $sql);

    $sql = "INSERT INTO `user` (`username`, `password`, `status`, `id`) VALUE ('apisake', '12345', '0', '101')";
    $query = mysqli_query($conn, $sql);
?>