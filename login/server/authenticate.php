<?php
include_once ('./connection.php');
if(isset($_POST['submit']))
  {
  $type = $_POST['type'];
  $username = $_POST['username'];
  $pass = $_POST['password'];
 

if($type== "University")
{
    header("Location: ../../Admin/index.php?Success");

}else if($type== "Student")
{
    $sql = "SELECT password FROM students WHERE userName='$username';";
    $result = mysqli_query($con,$sql);
    if($result== null)
    {

    }else{
        $row = mysqli_fetch_array($result);
        $Upassword = $row[0];
        if($Upassword==$pass)
        {
            header("Location: ../../Student/index.php?user=". $username ."");
        }else
        {

        }
       
    }

}else if($type== "Instructor")
{
    $sql = "SELECT password FROM instructor WHERE userName='$username';";
    $result = mysqli_query($con,$sql);
    if($result== null)
    {

    }else{
        $row = mysqli_fetch_array($result);
        $Upassword = $row[0];
        if($Upassword==$pass)
        {
            header("Location: ../../Instructor/index.php?user=". $username ."");
        }else
        {

        }
       
    }
}

}