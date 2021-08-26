<?php 
	session_start();
	include ("../../includes/dbconnection.php");

	$donation_id=$_SESSION['donation_id'];

	if(isset($_POST['app'])) { 
		$donation_status = 'Approved';
		$donation_achievement='On Going';
        $sql = mysqli_query($conn, "UPDATE donation SET 
		donation_status = '$donation_status',
		donation_achievement='$donation_achievement'

		WHERE donation_id='$donation_id'");

		if($sql == TRUE){
			echo '<script language="javascript">';
			echo 'alert("Update Successfully");';
			echo 'window.location.href="../admin_donationlist.php";';
			echo'</script>';
			unset($_SESSION['donation_id']);
		} else {
			echo "Error : ". $sql . "<br>" . $conn -> error;
			unset($_SESSION['donation_id']);
		}
		$conn -> close(); 
    } 
    
    if(isset($_POST['rej'])) { 
    	$donation_status = 'Rejected';
		$donation_achievement='Disapproved';
        $sql = mysqli_query($conn, "UPDATE donation SET 
		donation_status = '$donation_status',
		donation_achievement='$donation_achievement'

		WHERE donation_id='$donation_id'");

		if($sql == TRUE){
			echo '<script language="javascript">';
			echo 'alert("Update Successfully");';
			echo 'window.location.href="../admin_donationlist.php";';
			echo'</script>';
			unset($_SESSION['donation_id']);
		} else {
			echo "Error : ". $sql . "<br>" . $conn -> error;
			unset($_SESSION['donation_id']);
		}
		$conn -> close(); 
    }	
?>
