<?php 
  session_start();
  include ("../../includes/dbconnection.php");

  $username = $_POST['username'];
  $fname = $_POST['fname'];
  $password = $_POST['password'];
  $region = $_POST['region'];

  $sql = mysqli_query($conn, "UPDATE users SET 
  username = '$username',
  user_fname = '$fname',
  password = '$password',
  region = '$region'

  WHERE user_id='".$_GET['user_id']."'");

  if($sql == TRUE){
    echo '<script language="javascript">';
    echo 'alert("Update Successfully");';
    echo 'window.location.href="../admin_liststaff.php";';
    echo'</script>';
  } else {
    echo "Error : ". $sql . "<br>" . $conn -> error;
  }
  $conn -> close(); 
?>
