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
		<style>
		body {
			  margin: 0;
			  width: 100%;
			  height: 100%;
			  padding: 0px;
			  overflow-x: hidden;
			}
		</style>
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
<header class="donation-header">
	<div class="donation-pic">
    <img src="images/dheader.png" width="100%" alt=""/> </div>
</header>
<section class="filterandbox">

<aside class="filter">
<p id="list-donation">List Of Donation</p>

<input type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search for donation.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Region</th>
  </tr>
	
	<?php	
					//$result = mysqli_query($conn, $sql);
					//$resultCheck = mysqli_num_rows($result);

					$sql = "SELECT * FROM donation WHERE donation_status = 'Approved';";
					$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");

					
					//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");
					while($row = mysqli_fetch_assoc($result))
					{
	
	
					 echo "<tr>";

							echo"<td><a href='paydonation.php?donation_id=".$row['donation_id']."'>".$row['donation_title']."</td>";
							echo"<td><a href='paydonation.php?donation_id=".$row['donation_id']."'>".$row['donation_region']."</td>";

					 echo "</tr>";

	 }
  ?>
</table>
</aside>
<article>
	<center><div class="flex-container">
	<br><br><br><br>
		<div class="row">
		<div class="column">
	<?php
							
					//$result = mysqli_query($conn, $sql);
					//$resultCheck = mysqli_num_rows($result);

					$sql = "SELECT * FROM donation WHERE donation_status = 'Approved';";
					$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");

					
					//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");
					while($row = mysqli_fetch_assoc($result))
					{
						//echo "<a href='paydonation.php?donation_id=".$row['donation_id']."'>";
						echo "<div class='flex-item-left'>";
						echo '<img src = "data:image;base64,' .base64_encode($row['donation_image']).'" alt="" style="width:400px; height:400px;">';
						echo "<p><b>".$row['donation_title']."</b></p>";
						echo "<p>".$row['donation_region']."</p>";
						echo "<button><a href='paydonation.php?donation_id=".$row['donation_id']."'>Donate here</button>";
						echo "</div></a>";
						echo "<br>";
					}
//Closes specified connection
//mysql_close($conn);
?>
</div>
		</div>
	</div></center>	
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