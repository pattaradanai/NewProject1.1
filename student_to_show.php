<?php
    session_start();
    include('config.php');

    $_SESSION['student_show_studentid'] = $_GET['studentid_to_show'];
    $_SESSION['student_show_workid'] = $_GET['workid_to_show'];
    $_SESSION['student_show_subjectid'] = $_GET['subjectid_to_show'];
    header("Location:show_work_student.php");
?>