<?php 
  session_start();
  include ("../../includes/dbconnection.php");

  $news_title = $_POST['news_title'];
  $news_desc = $_POST['news_desc'];
  $news_region = $_POST['news_region'];

  $sql = mysqli_query($conn, "UPDATE news SET 
  news_title = '$news_title',
  news_desc = '$news_desc',
  news_region = '$news_region'

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
