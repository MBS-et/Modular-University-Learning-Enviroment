<?php

include_once './connection.php';
if(isset($_GET['updateid']))
{
    $id = $_GET['updateid'];
    $uname = $_GET['username'];

    $sql1 = mysqli_query($con,"DELETE FROM account WHERE userName = '$uname'");
    $sql2 = mysqli_query($con,"DELETE FROM instructor_assignment WHERE intructorID='$id'");
    $sql3 = mysqli_query($con,"DELETE FROM uploaded_files WHERE intructorID='$id'");
    $sql4 = mysqli_query($con,"DELETE FROM instructor WHERE intructorID = '$id'");
    
    header("Location: ../instructor.php?Success");
}