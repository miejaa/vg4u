<?php

include ("../../includes/dbconnection.php");
session_start();
    $news_title = $_POST['news_title'];
    $news_desc = $_POST['news_desc'];
    $news_region = $_POST['news_region'];
    $news_image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));

$query = "SELECT user_id from users WHERE user_id='".$_SESSION['user_id']."'";
$results = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($results))
  {
    $user_id = $row['user_id'];
    
  }

$sql = "INSERT INTO news (news_title, news_desc, news_region, news_image, user_id) VALUES ('$news_title','$news_desc','$news_region','$news_image', '$user_id')";

   if(mysqli_query($conn, $sql)) {
  echo '<script language="javascript">';
  echo 'alert("Insert Successfully");';
  echo 'window.location.href="../staff_listnews.php";';
  echo'</script>';
  }

  else
  {
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  
?>