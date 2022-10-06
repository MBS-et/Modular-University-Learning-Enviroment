<?php
  include_once './connection.php';
  include_once './connection2.php';
 
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
    $status = "Inactive now";
    $ran_id = rand(time(), 100000000);
    $userID = 2;
    $sql1 = "INSERT INTO account (userID,userName) VALUES ('$userID','$uname');";
    $sql3 = "INSERT INTO users (fname,lname,email,password,status,unique_id) VALUES('$fname','$lname','$email','$pass','$status',' $ran_id')";
    $sql2 = "INSERT INTO students (batchNo,email,firstName,gender,lastName,middleName,mobileNumber,password,userName) VALUES ('$batch','$email','$fname','$gender','$lname','$mname','$Mnumber','$pass','$uname');";
    $result2 = mysqli_query($con,$sql2);
    $result1 = mysqli_query($con,$sql1);
    $result3 = mysqli_query($conn,$sql3);
    header("Location: ../student.php?Success");
  }else
  {
   
    header("Location: ../student.php?Failed");
  }
  
