<?php 
  session_start();
  include ("../../includes/dbconnection.php");
 
  $sql = mysqli_query($conn, "DELETE FROM news WHERE news_id='".$_GET['news_id']."'");

  if($sql == TRUE){
    echo '<script language="javascript">';
    echo 'alert("Delete Successfully");';
    echo 'window.location.href="../staff_updatenews.php";';
    echo'</script>';

  } else {
    echo "Error : ". $sql . "<br>" . $conn -> error;
  }
  
  $conn -> close();  
?>
