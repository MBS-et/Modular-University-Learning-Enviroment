<?php 

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "mule";

$conn = mysqli_connect($server, $dbuser, $dbpass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$base_url = "http://localhost/M.U.L.E/Modular-University-Learning-Enviroment/Instructor/course/"; // Website url

?>