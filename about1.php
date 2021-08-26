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
			</div>
		</nav>
		<section>
			<article>
				<div class="aboutcontainer">
				<div class="container1">
					<img src="images/abt.png">
					<br><br>
					<h1>About</h1>
					<p>Virtual Gift4U is a charity website that provides a fundraising platform and volunteering works in the Malaysian community and NGOs involved for humantarian activities.</p>
				</div>

				<div class="container2">
					<div class="border">
						<center>
							<img src="images/cc1.png">
						</center>
					</div>
					<h1>Contact Us</h1>
					<p id="caption">Have any questions? We'd love to hear from you.</p>
				</div>

				<div class="container3">
					<form action="includes/suggest.php" method="post">
						<?php $username=$_SESSION['username']; ?>
					  	<label for="username">Username :</label><br>
					  	<input type="text" id="username" name="username" value="<?php echo $username; ?> "><br><br>
					  	<label for="suggestion_details">Suggestion :</label><br>
					  	<textarea name="suggestion_details" placeholder="In my opinion, this website.."></textarea><br><br>
					  	<input type="submit" value="Submit">
					</form> 
					<p><img src="images/sgbox.png"></p>
					<h1>Any Suggestion?</h1>
					<p>Share some tips for us to improve and makes this website a better place for you.</p>
					<br>
				</div>
				</div>
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