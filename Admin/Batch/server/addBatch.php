<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $sql = "INSERT INTO student_batchs (batchNo) VALUES ('$name');";
    $result = mysqli_query($con,$sql);
    header("Location: ../batch.php?Success");
  }else
  {
    header("Location: ../batch.php?Failed");
  }
  
