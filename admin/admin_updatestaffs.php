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
				<h1>Update Staff</h1>
				<?php 
                $sql="SELECT * FROM users WHERE user_id='".$_GET['user_id']."'";
                $result = mysqli_query($conn,$sql);
                if ($result == TRUE) {
                $no = 0;
                while($row = mysqli_fetch_array($result)) {
                ?>

				<div class="add">
					<form method="post" action="includes/admin_updatestaffaction.php?user_id=<?php echo $row['user_id']?>">
						<br>
						<br><br>
						<label for="username">Username</label><br>
					  	<input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br><br>
					  	<label for="fname">Name</label><br>
					  	<input type="text" id="fname" name="fname" value="<?php echo $row['user_fname']; ?>"><br><br>
					  	<label for="password">Password</label><br>
					  	<input type="password" id="password" name="password" value="<?php echo $row['password']; ?>"><br><br>						
					  	<label for="region">Region</label><br>
					  	<select name="region" id="region">
							<option value="North Region" <?php if($row['region']=="North Region") echo 'selected="selected"'; ?>>North Region</option>
							<option value="Central Region" <?php if($row['region']=="Central Region") echo 'selected="selected"'; ?>>Central Region</option>
							<option value="East Region" <?php if($row['region']=="East Region") echo 'selected="selected"'; ?>>East Region</option>
							<option value="Southern Region" <?php if($row['region']=="Southern Region") echo 'selected="selected"'; ?>>Southern Region</option>
							<option value="Sabah and Sarawak" <?php if($row['region']=="Sabah and Sarawak") echo 'selected="selected"'; ?>>Sabah and Sarawak</option>
						</select><br><br>
						
						<?php
							}}
							else
							{
								echo "0 result";
							}
							$conn->close();

						?>
						<input type="submit" name="update" value="Update Staff">
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
		<script type="text/javascript"> 
	        window.history.forward(); 
	        function noBack() { 
	            window.history.forward(); 
	        } 
	    </script> 

	</body>
</html>