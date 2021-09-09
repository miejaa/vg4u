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
				<h1>Add Staff</h1>
				<div class="add">
					<form action="includes/admin_addstaffaction.php" method="post">
						<br>
						<center>
							<i class="fas fa-user-plus"></i>
						</center>
						<br><br>
						<label for="username">Username</label><br>
					  	<input type="text" id="username" name="username" required><br><br>
					  	<label for="fname">Full name</label><br>
					  	<input type="text" id="fname" name="fname" required><br><br>
						<label for="password">Password</label><br>
						<input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
						<label for="region">Assigned Region</label><br><br>
					  	<select name="region" id="region">
							<option value="">Select one</option>
							<option value="North Region">North Region</option>
							<option value="Central Region">Central Region</option>
							<option value="East Region">East Region</option>
							<option value="Southern Region">Southern Region</option>
							<option value="Sabah and Sarawak">Sabah and Sarawak</option>
						</select>
							
						<br><br>
						<input type="submit" value="Add Staff">
					</form>
				</div>
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