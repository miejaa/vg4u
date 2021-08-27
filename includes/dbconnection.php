<?php

$host = "vg4u.cfjqjsjwvoi4.ap-southeast-1.rds.amazonaws.com";
$username= "admin";
$password= "vg4u1234";
$dbname = "vg4u";
$conn = mysqli_connect($host,$username, $password,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>	