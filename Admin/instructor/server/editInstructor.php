<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
    $fname = $_POST['Fname'];
    $mname = $_POST['Mname'];
    $lname = $_POST['Lname'];
    $gender = $_POST['gender'];
    $Mnumber = $_POST['Mnumber'];
    $role = $_POST['role'];
    $uname = $_POST['Uname'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    
    $getIdQuery = "SELECT `roleID` FROM `role` WHERE `roleType`='$role'";
    $getIDResult = mysqli_query($con,$getIdQuery);
    $row = mysqli_fetch_array($getIDResult);
    $roleID = $row[0];
 
    $sql2 = "UPDATE instructor SET roleID='$roleID',email='$email',firstName='$fname',gender='$gender',lasstName='$lname',middleName='$mname',mobileNumber='$Mnumber',password='$pass',userName='$uname' WHERE intructorID='$id' "; 
    $result1 = mysqli_query($con,$sql2);
    header("Location: ../instructor.php?Success");
  }else
  {
   
    header("Location: ../instructor.php?Failed");
  }
  
  
  