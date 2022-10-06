<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $date = date("Y/m/d");


    $getIdQuery = "SELECT `courseID` FROM `course` WHERE `courseName`='$course'";
    $getIDResult = mysqli_query($con,$getIdQuery);
    $row = mysqli_fetch_array($getIDResult);
    $courseId = $row[0];
    

    $sql1 = "INSERT INTO batch_assignment (assignmentDate,batchNo,courseID) VALUES ('$date','$batch','$courseId')";
    $result2 = mysqli_query($con,$sql1);

    header("Location: ../assignment.php?Success");
  }else
  {
   
    header("Location: ../assignment.php?Failed");
  }