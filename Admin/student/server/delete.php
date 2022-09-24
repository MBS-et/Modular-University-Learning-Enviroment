<?php

include_once './connection.php';
if(isset($_GET['updateid']))
{
    $uname = $_GET['updateid'];
    $sql1 = mysqli_query($con,"DELETE FROM account WHERE userName = '$uname'");
    $sql2 = mysqli_query($con,"DELETE FROM students WHERE userName = '$uname'");
    header("Location: ../student.php?Success");
}