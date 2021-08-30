<?php
//Initialise the session
session_start();
include("includes/dbconnection.php");
$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
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
		{
?>	

	


<!DOCTYPE html>
<html>
	<head>
		<title>Virtual Gift4U.com</title>
		<link rel="icon" href="images/olive.png">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="javaku.js"></script>
</head>
	<body>
		<nav>
			<div class="topnav" id="myTopnav">
			  	<a href="homepage1.php">Home</a>
			  	<a href="about1.php">About</a>
			 	<a href="donation1.php">Donation</a>
			  	<a href="news1.php">News</a>
			  	<a href="ngo1.php">NGOs</a>
			  	<!--<a  href="login.php"><i class="fas fa-user-circle"></i></a> -->
				<a style="float: right" type="button" class="logoutbtn" onclick="window.location.href='includes/logout.php'">Log Out</button></a>
				
				<a style="float: right" href="profile.php"><?php echo $_SESSION["username"]; ?></a>
				<!--<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    <i class="fa fa-bars"></i></a>-->
			</div>
		</nav>
		<section>
			<article>
				<center>
					<hr>
						<h1 id="h-PPE" style="font-size: 40px;">Welcome, <br><?php echo $_SESSION["username"]; ?></h1>
					<hr>
				<div class="logincontainer">
					<div class="row">
					<h2><center>Donation History</center></h2>
				<table class="needapp" align="center" border="0" width="90%" cellpadding="10" cellspacing="0">
					<tr align="center">
						<th width="7%" style="background-color: #f7e3b5;">No.</th>
						<th width="20%" style="background-color: #f7e3b5;">Donation Title</th>
						<th width="5%" style="background-color: #f7e3b5;">Amount</th>
						<th width="20%" style="background-color: #f7e3b5;">Payment Method</th>
						<th width="20%" style="background-color: #f7e3b5;">Date</th>
					</tr>
					<?php 
					$user_id = $row['user_id'];
					$username = $row['username'];
			        $sql="SELECT b.donation_title, a.donation_amount, a.pay, a.donation_date FROM donationstatus a, donation b WHERE a.donation_id = b.donation_id";
			        $result = mysqli_query($conn,$sql);
			        if ($result == TRUE) {
			            $no = 0;
			            while($row = mysqli_fetch_array($result)) {
	            	?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo $row['donation_title']; ?></td>
						<td><?php echo $row['donation_amount']; ?></td>
						<td><?php echo $row['pay']; ?></td>
						<td><?php echo $row['donation_date']; ?></td>
					</tr>
					<?php
						}}
						else
						{
							echo "0 result";
						}
					?>
				</table>
						<button style="float: center" onclick="document.location='profile.php'">Back</button>
        			</div>
				</div>
			</div>
				</center>
				<br><br><br><br><br>
			</article>
		</section>
		<footer>
			<p>	&copy; Virtual Gift4U, Malaysia</p>
		</footer>
	</body>
</html>

<?php
		}
//Closes specified connection
//mysql_close($conn);
?>
