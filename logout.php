<?php 
    session_start();
    $_SESSION['status'].session_unset();
    header('Location: index.php');
?>