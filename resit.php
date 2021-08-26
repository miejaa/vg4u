<?php
//Initialise the session
session_start();
include("includes/dbconnection.php");
$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."' AND user_id='".$_SESSION['user_id']."' ";
$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");
//Fetches a result row as an associative array
$row = mysqli_fetch_assoc($result);
if ($row == 0)
	{
		echo "Login Fail";
		session_unset();
		//echo "<meta httpequiv=\"refresh\"content=\"3;URL=login.php\">";
		header('Refresh:2; url=login.php');
	}
		else
		{}	

?>	
<!DOCTYPE html>
<html>
<head>
		<title>Virtual Gift4U.com</title>
		<link rel="icon" href="images/olive.png">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="javaku.js"></script>
    </head>

<body>
<section class="resithead">
<h1>Thank You For Donating <br><?php echo $_SESSION["username"]; ?></h1>
<img id="tangann" src="images/olive.png" width="100" height="100" alt="bannerresit"/> 
</section>

<div class="resitsuccess" style="background-color: white;">
<h1 id="trimas" style="text-align: center; background-color: white;">Your Donation Has Done Successfully</h1>

<div class="logincontainer">

<button onclick="window.print()"><i class="fa fa-download"></i> Download</button>
<a href="donation1.php"><button style="background-color: IndianRed"> Return</button></a>
<br><br>
</div>
</div>

</body>
</html>

// <?php
		// }
//Closes specified connection
//mysql_close($conn);
// ?>
