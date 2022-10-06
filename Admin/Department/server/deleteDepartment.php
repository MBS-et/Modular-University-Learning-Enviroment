<?php
include_once './connection.php';
if(isset($_GET['updateid']))
{
    $id = $_GET['updateid'];
    $sql2 = mysqli_query($con,"DELETE FROM department WHERE departmenID = '$id'");
    header("Location: ../student.php?Success");
}