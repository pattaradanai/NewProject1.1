<?php
session_start();
include("config.php");
    /*
    teacher name+surname
    year+term+subject which that teacher teached
    class?/? which learn that subject
    work quantity in that subect
    student no(in class?/?)+name+surname+workdata(in that subject)
    */
    $tabno = 0;
    $subtabno = 0;
    $workno = 1;

    ##### teacher name+surname #####
    $sql = "SELECT * FROM `teacher` WHERE `teacherid`= {$_SESSION['id']}";
    $query_teacherdata = mysqli_query($conn,$sql);
    $teacherdata = $query_teacherdata->fetch_assoc();

    ##### year+term+subject which that teacher teached #####
    # only subjectid #
    $sql = "SELECT * FROM `teachesdata` WHERE `teacherid`= {$_SESSION['id']}";
    $query_subjectid = mysqli_query($conn,$sql);
    $subjectid = $query_subjectid->fetch_assoc();
    # subject data(include year,term,name) # class?/? which learn that subject #
    $sql = "SELECT * FROM `subject` WHERE `subjectid`= {$subjectid['subjectid']} ORDER BY `subjectid`, `class`";
    $query_subjectdata = mysqli_query($conn,$sql);
    $subjectdata = $query_subjectdata->fetch_assoc();

    ##### work quantity in that subject #####
    $sql = "SELECT DISTINCT `workid` FROM `workdata` WHERE `subjectid`= {$subjectid['subjectid']}";
    $query_work = mysqli_query($conn,$sql);
    $work = $query_work->fetch_all();

    ##### student no(in class?/?)+name+surname+work(in that subject) #####
    # studentid + no in class #
    $sql = "SELECT * FROM `class{$subjectdata['class']}`";
    $query_studentid_no = mysqli_query($conn,$sql);
    $studentid_no = $query_studentid_no->fetch_all();
    # student name + surname #
    $sql = "SELECT * FROM `student` WHERE `studentid`='{$studentid_no[0][3]}'";
    $query_studentname = mysqli_query($conn,$sql);
    $studentname = $query_studentname->fetch_all();
    # student work in that subject #
    $sql = "SELECT DISTINCT * FROM `workdata` WHERE `studentid`='{$studentid_no[0][3]}' AND `subjectid`='{$subjectid['subjectid']}'";
    $query_studentworklist = mysqli_query($conn,$sql);
    $studentworklist = $query_studentworklist->fetch_all();
?>