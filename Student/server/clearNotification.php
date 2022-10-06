<?php
include_once './connection.php';
if(isset($_GET['user']))
{
    $id = $_GET['user'];
    $sql2 = mysqli_query($con,"DELETE FROM instructor_announcement WHERE studentUsername = '$id'");
    header("Location: ../index.php?user=".$id."");
}