<?php 
  session_start();
  include ("../../includes/dbconnection.php");

  $ngo_name = $_POST['ngo_name'];
  $ngo_desc = $_POST['ngo_desc'];
  $ngo_region = $_POST['ngo_region'];
  $ngo_address=$_POST['ngo_address'];
  $ngo_email=$_POST['ngo_email'];
  $ngo_phone=$_POST['ngo_phone'];

  $sql = mysqli_query($conn, "UPDATE ngo SET 
  ngo_name = '$ngo_name',
  ngo_desc = '$ngo_desc',
  ngo_region = '$ngo_region',
  ngo_address='$ngo_address',
  ngo_email='$ngo_email',
  ngo_phone='$ngo_phone'

  WHERE ngo_id='".$_GET['ngo_id']."'");

  if($sql == TRUE){
    echo '<script language="javascript">';
    echo 'alert("Update Successfully");';
    echo 'window.location.href="../staff_listngo.php";';
    echo'</script>';
  } else {
    echo "Error : ". $sql . "<br>" . $conn -> error;
  }
  $conn -> close(); 
?>
