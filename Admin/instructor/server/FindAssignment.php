<?php
  include_once './connection.php';
  if(isset($_POST['submit']))
  {
   $id = $_POST['InID'];

   $sql = "SELECT firstName FROM instructor WHERE intructorID='$id';";
   $result = mysqli_query($con,$sql);
   if($result== null)
   {
   }else{
    $row = mysqli_fetch_array($result);
       
           header("Location: ../InstructorAssignment.php?user=". $id ."");
       
   }
  }