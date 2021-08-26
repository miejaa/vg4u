<?php 
  session_start();
  include ("../../includes/dbconnection.php");
 
  $sql = mysqli_query($conn, "DELETE FROM ngo WHERE ngo_id='".$_GET['ngo_id']."'");

  if($sql == TRUE){
    echo '<script language="javascript">';
    echo 'alert("Delete Successfully");';
    echo 'window.location.href="../staff_updatengo.php";';
    echo'</script>';

  } else {
    echo "Error to delete : ". $sql . "<br>" . $conn -> error;
  }
  
  $conn -> close();  
?>
