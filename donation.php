<?php
	//Initialise the session
	session_start();
	include("includes/dbconnection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Virtual Gift4U.com</title>
	<link rel="icon" href="images/olive.png">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="javaku.js"></script>
</head>

<body>
	<nav>
		<div class="topnav" id="myTopnav">
			<a href="homepage.php">Home</a>
			<a href="about.php">About</a>
			<a href="donation.php">Donation</a>
			<a href="news.php">News</a>
			<a href="ngo.php">NGOs</a>
			<a  href="login.php" style="float:right"><img src="images/userc.png" width="20" height="20" alt=""/></a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
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
					echo"<td><a href='ppedonation.php?donation_id=".$row['donation_id']."'>".$row['donation_title']."</td>";
					echo"<td><a href='ppedonation.php?donation_id=".$row['donation_id']."'>".$row['donation_region']."</td>";
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
					//echo "<a href='ppedonation.php?donation_id=".$row['donation_id']."'>";
					echo "<div class='flex-item-left'>";
					echo '<img src = "data:image;base64,' .base64_encode($row['donation_image']).'" alt="" style="width:400px; height:400px;">';
					echo "<p><b>".$row['donation_title']."</b></p>";
					echo "<p>".$row['donation_region']."</p>";
					echo "<button><a href='ppedonation.php?donation_id=".$row['donation_id']."'>Donate here</button>";
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
	 <!--<article>
		  <form method="post">
			<!--<div class="row">-->
			  
			  <?php 
								//include ('dbconnection.php');
								$sql = "SELECT * FROM donation WHERE donation_status = 'Approved'";
								$result = mysqli_query($conn,$sql);
								
								if ($result == TRUE) {
									$no = 0;
									while($row = mysqli_fetch_array($result)){
							?>
					
		<!--<div class="col-md-3 col-sm-6">
			<div class="container">
				<div class="row">
					  <span style="margin: 0 20px"></span><?php echo '<img id="myImg" src = "data:image;base64,' .base64_encode($row['donation_image']).'" alt="product" style="width:20%; height:240px; style="margin: 0px 1px;">'?></td>
					  <!-- The Modal -->
						<!--<div id="myModal" class="modal">
						  <span class="close">&times;</span>
						  <img class="modal-content" id="img01">
						  <div id="caption"></div>
						</div>
					  <h3><span style="margin: 0 30px"></span><?php echo $row['donation_title']; ?></h3>
					  <p class="price"><span style="margin: 0 30px"></span> &#82;&#77; <?php echo $row['donation_goal']; ?></p>
					  <!--<p><span style="margin: 0 30px"></span><a href="manage.php" class="btn btn-primary">Edit</a></p>-->
				<!--</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			</div>
		</div>
				
		<?php 
							}
						} else {
								echo "0 Results";
							}
							$conn -> close ();
						?>	
	</article>-->
	</section>
	
	<footer>
		<p>	&copy; Virtual Gift4U, Malaysia</p>
	</footer>	
</body>
</html>