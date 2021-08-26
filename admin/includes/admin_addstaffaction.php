<?php

include ("../../includes/dbconnection.php");
session_start();
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $password = $_POST['password'];
    $region = $_POST['region'];
    $role="Staff";

$sql = "INSERT INTO users (username, user_fname, password, region, role) VALUES ('$username','$fname','$password','$region','$role')";

   if(mysqli_query($conn, $sql)) {
  echo '<script language="javascript">';
  echo 'alert("Add Staff Successfully");';
  echo 'window.location.href="../admin_liststaff.php";';
  echo'</script>';
  }

  else
  {
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  
?>