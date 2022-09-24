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
    $sql2 = "UPDATE students SET batchNo='$batch',email='$email',firstName='$fname',gender='$gender',lastName='$lname',middleName='$mname',mobileNumber='$Mnumber',password='$pass' WHERE userName='$uname'"; 
    $result1 = mysqli_query($con,$sql2);
    header("Location: ../student.php?Success");
  }else
  {
   
    header("Location: ../student.php?Failed");
  }
  
  
  