<?php
include_once './connection.php';
if(isset($_GET['dropid']))
{
    $uname = $_GET['dropid'];
    $sql2 = mysqli_query($con,"DELETE FROM instructor_assignment WHERE assignmentID = '$uname'");
    header("Location: ../instructor.php?Success");
}