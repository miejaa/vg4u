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
					<a href="admin_donationlisttry.php">Donation Report</a>
				</div>
			</li>
			<li><a href="admin_suggestion.php"><i class="fas fa-comments"></i>  View Suggestion</a></li>
			<li><a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>  Logout</a></li>
		</nav>

		<section>
			<article>
				
				<h1>Waiting for approval</h1>
				<table class="needapp">
					<tr>
						<th>No.</th>
						<th>Image</th>
						<th>Donation</th>
						<th>Region</th>
						<th>Date</th>
						<th>Details</th>
						<th>Staff's Name</th>
						<th>Action</th>
					</tr>
					<?php 

			        $sql="SELECT d.donation_id, d.donation_image, d.donation_title, d.donation_region, d.donation_date, d.donation_desc, d.user_id, u.user_id, u.user_fname FROM donation d INNER JOIN users u ON d.user_id=u.user_id WHERE d.donation_status='Not approve yet'";
			        $result = mysqli_query($conn,$sql);
			        if ($result == TRUE) {
			            $no = 0;
			            while($row = mysqli_fetch_array($result)) {
			            	$_SESSION['donation_id']=$row['donation_id'];

	            	?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo '<img src = "data:image;base64,' .base64_encode($row['donation_image']).'" alt="" style="width:150px; height:130px;">'?></td>
						<td><?php echo $row['donation_title']; ?></td>
						<td><?php echo $row['donation_region']; ?></td>
						<td><?php echo $row['donation_date']; ?></td>
						<td><?php echo $row['donation_desc']; ?></td>
						<td><?php echo $row['user_fname'];?></td>
						<td>
							<form action="includes/admin_donationappaction.php?donation_id='$donation_id'" method="post">
							<button class="sah" type="submit" name="app" onClick="return confirm('Are you sure you want to approve?')">Approve</button>

							<button class="reject" type="submit" name="rej" onClick="return confirm('Are you sure you want to reject?')">Reject</button>
							</form>
						</td>
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
		<?
			$conn-> close();
		?>
	</body>
</html>