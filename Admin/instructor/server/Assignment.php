<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $fname = $_POST['Fname'];
    $Id = $_POST['Id'];
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $date = date("Y/m/d");


    $getIdQuery = "SELECT `courseID` FROM `course` WHERE `courseName`='$course'";
    $getIDResult = mysqli_query($con,$getIdQuery);
    $row = mysqli_fetch_array($getIDResult);
    $courseId = $row[0];
    

    $sql1 = "INSERT INTO instructor_assignment (assignmentDate,batchNo,courseID,intructorID) VALUES ('$date','$batch','$courseId','$Id')";
    $result2 = mysqli_query($con,$sql1);
    if($result2==true)
    {
      echo '<script>alert("Instructor Assigned Successfully")</script>';
      header("Location: ../instructor.php?Success");
    }
  
  }else
  {
    echo "<script>alert('Instructor Assignment Failed')</script>";
    header("Location: ../instructor.php?Failed");
  }