<?php
session_start();
include("../includes/dbconnection.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Manager - Virtual Gift4U.com</title>
		<link rel="icon" href="../images/olive.png">
		<link rel="stylesheet"href="../css/style2.css"type="text/css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header>
			<!--<img src="../images/log.png">-->
		</header>

		<nav>
			<li>
				<center>
					<br><br><br>
					<i class="fas fa-user-cog"></i>
					<h2>Welcome, <br>Manager</h2>
					<br>
				</center>
			</li>
			<li><a href="admin_dashboard.php"><i class="fas fa-home"></i>  Dashboard</a></li>
			<li><button class="dropdown-btn"><i class="far fa-user-circle"></i>  Manage Staff<i class="fas fa-angle-down"></i></button>
				<div class="dropdown-container">
				    <a href="admin_addstaff.php">Add Staff</a>
				    <a href="admin_updatestaff.php">Update Staff</a>
				    <a href="admin_liststaff.php">List Staff</a>
				</div>
			</li>
			<li><button class="dropdown-btn"><i class="fas fa-donate"></i>  Manage Donation<i class="fas fa-angle-down"></i></button>
				<div class="dropdown-container">
				    <a href="admin_donationapp.php">Donation Approval</a>
				    <a href="admin_donationlist.php">List Donation</a>
					<a href="admin_donationlisttry.php">Donation History</a>
				</div>
			</li>
			<li><a href="admin_suggestion.php"><i class="fas fa-comments"></i>  View Suggestion</a></li>
			<li><a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>  Logout</a></li>
		</nav>

		<section>
			<article>
				<h1>Staff List</h1>
				<!--<center>
					<form class="carian" action="/action_page.php">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</center>-->
				<br><br>
				<table class="needapp">
					<tr>
						<th>No.</th>
						<th>Image</th>
						<th>Username</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Region Assigned</th>
						<th>Date Joined</th>
					</tr>
					<?php 

			        $sql="SELECT * FROM users WHERE role='Staff'";
			        $result = mysqli_query($conn,$sql);
			        if ($result == TRUE) {
			            $no = 0;
			            while($row = mysqli_fetch_array($result)) {
			            	$img=$row['image'];
						if (empty($img)) {
							$img="../images/placeholder.jpg";
						}
						else
							$img="../images/$img";

	            	?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><img src="<?php echo $img; ?>" width="120" height="130" alt=""></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['user_fname']; ?></td>
						<td><?php echo $row['user_email']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><?php echo $row['region']; ?></td>
						<td><?php echo $row['date_joined']; ?></td>
					</tr>
					<?php
						}}
						else
						{
							echo "0 result";
						}
					?>
				</table>
			</article>
		</section>
		<footer>
		</footer>

		<script>
			
			var dropdown = document.getElementsByClassName("dropdown-btn");
			var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener("click", function() {
			  this.classList.toggle("active");
			  var dropdownContent = this.nextElementSibling;
			  if (dropdownContent.style.display === "block") {
			  dropdownContent.style.display = "none";
			  } else {
			  dropdownContent.style.display = "block";
			  }
			  });
			}
		</script>

	</body>
</html>