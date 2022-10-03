<?php
  include_once './connection.php';
 
  if(isset($_POST['submit']))
  {
    $batch = $_POST['name'];
    $sql = "UPDATE student_batchs SET batchno='$batch' WHERE batchno='$batch'"; 
    $result = mysqli_query($con,$sql);
    header("Location: ../batch.php?Success");
  }else
  {
   
    header("Location: ../batch.php?Failed");
  }
  

  
  