<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $fname = $_POST['Fname'];
    $mname = $_POST['Mname'];
    $lname = $_POST['Lname'];
    $gender = $_POST['gender'];
    $Mnumber = $_POST['Mnumber'];
    $batch = $_POST['batch'];
    $uname = $_POST['Uname'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $userID = 2;
    $sql1 = "INSERT INTO account (userID,userName) VALUES ('$userID','$uname')";
    $sql2 = "INSERT INTO students (batchNo,email,firstName,gender,lastName,middleName,mobileNumber,password,userName) VALUES ('$batch','$email','$fname','$gender','$lname','$mname','$Mnumber','$pass','$uname');";
    $result2 = mysqli_query($con,$sql1);
    $result1 = mysqli_query($con,$sql2);
    header("Location: ../student.php?Success");
  }else
  {
   
    header("Location: ../student.php?Failed");
  }
  
