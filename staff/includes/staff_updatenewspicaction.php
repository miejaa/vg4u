<?php 
  session_start();
  include ("../../includes/dbconnection.php");

  $sql = mysqli_query($conn, "UPDATE news SET 
  news_image = '".$_POST['fileToUpload']."'

  WHERE news_id='".$_GET['news_id']."'");

  if($sql == TRUE){
    echo '<script language="javascript">';
    echo 'alert("Update Successfully");';
    echo 'window.location.href="../staff_listnews.php";';
    echo'</script>';
  } else {
    echo "Error : ". $sql . "<br>" . $conn -> error;
  }
  $conn -> close(); 
?>
