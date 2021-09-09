<?php
include_once 'includes/dbconnection.php';
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
	//$username = $_POST['username'];
    //$result = mysqli_query($conn,"SELECT * FROM users where username='" . $_POST['username'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['user_id'];
	//$email_id=$row['email_id'];
	$password=$row['password'];
	if($email==$fetch_user_id) {
				$to = $email;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: password@studentstutorial.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid userid';
				}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email:</td><td><input type='text' name='email'/></td></tr>
<tr><td>Username:</td><td><input type='text' name='username'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>