<?php

include ("dbconnection.php");
session_start();
    $suggestion_details = $_POST['suggestion_details'];

$query = "SELECT user_id from users WHERE user_id='".$_SESSION['user_id']."'";
$results = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($results))
  {
    $user_id = $row['user_id'];
    
  }

$sql = "INSERT INTO suggestion (suggestion_details, user_id) VALUES ('$suggestion_details', '$user_id')";

   if(mysqli_query($conn, $sql)) {
  echo '<script language="javascript">';
  echo 'alert("Your suggestion has been added");';
  echo 'window.location.href="../about1.php";';
  echo'</script>';
  }

  else
  {
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  
?>