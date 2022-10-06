<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $id = $_POST['id'];
    

    $sql = "UPDATE department SET departmentID='$id',departmentName='$name' WHERE departmentID='$id' ";
    $result = mysqli_query($con,$sql);
    header("Location: ../department.php?Success");
  }else
  {
   
    header("Location: ../department.php?Success");
  }
  

  
  