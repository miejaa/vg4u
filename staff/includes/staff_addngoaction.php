<?php
include("../../includes/dbconnection.php");

session_start();
    $ngo_name=$_POST['ngo_name'];
    $ngo_desc=$_POST['ngo_desc'];
    $ngo_region=$_POST['ngo_region'];
    $ngo_address=$_POST['ngo_address'];
    $ngo_email=$_POST['ngo_email'];
    $ngo_phone=$_POST['ngo_phone'];
    $ngo_image=addslashes(file_get_contents($_FILES['ngo_image']['tmp_name']));
    
$query = "SELECT user_id from users WHERE user_id='".$_SESSION['user_id']."'";
$results = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($results))
  {
    $user_id = $row['user_id'];
    
  }

$sql = "INSERT INTO ngo (ngo_name, ngo_desc, ngo_region, ngo_address, ngo_email, ngo_phone, ngo_image, user_id) VALUES ('$ngo_name','$ngo_desc','$ngo_region', '$ngo_address', '$ngo_email', '$ngo_phone','$ngo_image', '$user_id')";

   if(mysqli_query($conn, $sql)) {
  echo '<script language="javascript">';
  echo 'alert("Insert Successfully");';
  echo 'window.location.href="../staff_listngo.php";';
  echo'</script>';
  }

  else
  {
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  
?>