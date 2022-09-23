<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $dep = $_POST['dep'];
    $getIdQuery = "SELECT `departmentID` FROM `department` WHERE `departmentName`='$dep'";
    $getIDResult = mysqli_query($con,$getIdQuery);
    $row = mysqli_fetch_array($getIDResult);
    $depId = $row[0];
    $sql = "INSERT INTO course (courseID,courseName,departmentID) VALUES ('$id','$name','$depId');";
    $result = mysqli_query($con,$sql);
    header("Location: ../course.php?Success");
    
  }else
  {
   
    header("Location: ../course.php?Failed");
  }
  
