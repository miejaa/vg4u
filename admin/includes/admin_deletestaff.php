<?php 
  session_start();
  include ("../../includes/dbconnection.php");
 
  $sql = mysqli_query($conn, "DELETE FROM users WHERE user_id='".$_GET['user_id']."'");

  if($sql == TRUE){
    echo '<script language="javascript">';
    echo 'alert("Delete Successfully");';
    echo 'window.location.href="../admin_updatestaff.php";';
    echo'</script>';

  } else {
    echo "Error : ". $sql . "<br>" . $conn -> error;
  }
  
  $conn -> close();  
?>
