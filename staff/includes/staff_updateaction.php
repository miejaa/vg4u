<?php 
	session_start();
	include ("../../includes/dbconnection.php");

	$user_id=$_SESSION['user_id'];

	
	$sql = mysqli_query($conn, "UPDATE users SET 
		user_fname = '".$_POST['fname']."',
		user_email = '".$_POST['email']."',
		phone = '".$_POST['phone']."'
		
		WHERE user_id='$user_id'");



	if($sql == TRUE){
		echo '<script language="javascript">';
		echo 'alert("Update Successfully");';
		echo 'window.location.href="../staff_profile.php";';
		echo'</script>';
	} else {
		echo "Error : ". $sql . "<br>" . $conn -> error;
	}
	$conn -> close();
	
?>
