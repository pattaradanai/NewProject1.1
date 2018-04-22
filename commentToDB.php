<?php
    include("config.php");
    mysqli_set_charset($conn, "utf8");
    echo $_POST["comment"];
?>