<?php

include ("../../includes/dbconnection.php");
session_start();
    $donation_title = $_POST['donation_title'];
    $donation_desc = $_POST['donation_desc'];
    $donation_region = $_POST['donation_region'];
    $donation_goal = $_POST['donation_goal'];
    $donation_type = $_POST['donation_type'];
    $fileToUpload = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
    $donation_status="Not approve yet";
    
$conn = mysqli_connect('localhost', 'root', '', 'munity');
if(!$conn) {
  die ("Connection Failed : " . mysqli_connect_error());
}
//echo "Connected Successfully";

$query = "SELECT user_id from users WHERE user_id='".$_SESSION['user_id']."'";
$results = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($results))
  {
    $user_id = $row['user_id'];
    
  }

$sql = "INSERT INTO donation (donation_title, donation_desc, donation_region, donation_goal, donation_type, donation_image, user_id, donation_status) VALUES ('$donation_title','$donation_desc','$donation_region','$donation_goal','$donation_type','$fileToUpload','$user_id', '$donation_status')";

   if(mysqli_query($conn, $sql)) {
  echo '<script language="javascript">';
  echo 'alert("Insert Successfully");';
  echo 'window.location.href="../staff_donationapp.php";';
  echo'</script>';
  }

  else
  {
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  
?>