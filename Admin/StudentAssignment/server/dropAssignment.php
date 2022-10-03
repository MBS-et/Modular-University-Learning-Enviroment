<?php
include_once './connection.php';
if(isset($_GET['dropid']))
{
    $uname = $_GET['dropid'];
    $sql2 = mysqli_query($con,"DELETE FROM batch_assignment WHERE assignmentID = '$uname'");
    header("Location: ../assignment.php?Success");
}