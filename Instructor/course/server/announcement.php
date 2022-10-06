<?php

  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $batch = $_POST['batch'];
    $id = $_POST['id'];
    $message = $_POST['message'];
    $date = $date = date("Y/m/d");
    $sql = "SELECT * FROM students where batchNo='$batch'";
    $result = mysqli_query($con, $sql);
    while ($row = $result->fetch_array()) {
    $Stusername = $row['userName'];
    $sql2 = "INSERT INTO instructor_announcement (announcementDate,batchNo,studentUsername,intructorID,message) VALUES ('$date','$batch','$Stusername','$id','$message')"; 
    $result2 = mysqli_query($con,$sql2);
    }

    header("Location: ./course/course.php?success");
  }else
  {
    header("Location: ../course.php?Failed");
  }
  
