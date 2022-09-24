<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $courseName = $_POST['name'];
    $courseID = $_POST['id'];
    $departmentName= $_POST['dep'];
    $sql3="SELECT departmentID FROM department WHERE departmentName='$departmentName' ";
    $result2=mysqli_query($con,$sql3);
    $row=mysqli_fetch_assoc($result2);
    $depID=$row['departmentID'];
    $sql2 = "UPDATE course SET courseName='$courseName', departmentID='$depID' WHERE courseID='$courseID'"; 
    $result1 = mysqli_query($con,$sql2);
    header("Location: ../course.php?Success");
  }else
  {
   
    header("Location: ../course.php?Failed");
  }
  

  
  