<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $fname = $_POST['Fname'];
    $mname = $_POST['Mname'];
    $lname = $_POST['Lname'];
    $gender = $_POST['gender'];
    $Mnumber = $_POST['Mnumber'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    $uname = $_POST['Uname'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $userID = 1;

    $getIdQuery = "SELECT `roleID` FROM `role` WHERE `roleType`='$role'";
    $getIDResult = mysqli_query($con,$getIdQuery);
    $row = mysqli_fetch_array($getIDResult);
    $roleId = $row[0];


    $sql1 = "INSERT INTO account (userID,userName) VALUES ('$userID','$uname')";
    $sql2 = "INSERT INTO instructor (email,firstName,gender,intructorID,lasstName,middleName,mobileNumber,password,roleID,userName) VALUES ('$email','$fname','$gender','$id','$lname','$mname','$Mnumber','$pass','$roleId','$uname');";
    $result2 = mysqli_query($con,$sql1);

    $result1 = mysqli_query($con,$sql2);
    header("Location: ../instructor.php?Success");
  }else
  {
   
    header("Location: ../instructor.php?Failed");
  }
  