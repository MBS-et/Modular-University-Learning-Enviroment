<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $sql = "INSERT INTO department (departmentID,departmentName) VALUES ('$id','$name');";
    $result = mysqli_query($con,$sql);
    header("Location: ../department.php?Success");
  }else
  {
    header("Location: ../department.php?Failed");
  }
  
