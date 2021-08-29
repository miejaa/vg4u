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
		<header>
			<img src="images/virtualgift4u.png" width="100%">
		</header>
		<section>
			<article>
				<center>
				<h1 id="h-PPE">OUR FEATURED</h1>
				<hr>
				<div class="icons">
					<div class="row">
						<div class="column">
							<img src="images/donatec.png">
							<div class="container">
						    	<button onclick="document.location='donation1.php'">Donate</button>
						   		<p>"Participation more. Changes more."</p>
							</div>
						</div>
						
						<div class="column">
							<img src="images/newsc.png">
							<div class="container">
						    	<button onclick="document.location='news1.php'">News</button>
						   		<p>Information about campaigns in Malaysia including latest news.</p>
							</div>
						</div>	

						<div class="column">
							<img src="images/orgc.png">
							<div class="container">
						    	<button onclick="document.location='ngo1.php'">NGO</button>
						    	<p>Non-Governmental Organization (NGO) in Malaysia provides help and supports to people in need. Here list of NGOs in Malaysia.</p>
							</div>
						</div>
					</div>				
				</div>
				</center>
			</article>
		</section>
		<section>
			<article>
				<center>
				<h1 id="h-PPE">DONATION RECEIVED</h1>
				<hr>
				<div class="icons">
					<div class="row">
							<?php
												
								//$result = mysqli_query($conn, $sql);
								//$resultCheck = mysqli_num_rows($result);

								$sql = "SELECT SUM(donation_amount) FROM donationstatus;";
								$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");
							
								//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");
								while($row = mysqli_fetch_assoc($result))
								{				
									$helo = $row['SUM(donation_amount)'];
									
									echo "<div class='flex-item-left-sum'>";
									echo "<center><p><b>RM&nbsp;" .$helo."</b></p></center>";
									echo "</div></a>";
									echo "<br>";
								}
								//Closes specified connection
								//mysql_close($conn);
							?>
							<div class="lastupdated">
								<p><i>last updated:<p id="demo"></p></i></p>
								<script>
									const d = new Date();
									document.getElementById("demo").innerHTML = d;
								</script>
							</div>
					</div>				
				</div>
				</center>
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
