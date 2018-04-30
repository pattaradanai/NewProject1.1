<?php 
    session_start();
    $_SESSION['status'].session_unset();
    header('Location:http://localhost/NewProject1.1/index.php');
?>