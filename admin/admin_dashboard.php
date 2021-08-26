<?php
session_start();
include("../includes/dbconnection.php");
if(!empty($_SESSION["user_id"])){
	require_once '../admin/admin_dashboard.php';
}else{
echo "<script>alert('You are not logged in, Please Log in first! ');</script>";
echo '<script language="javascript"> window.location.href="../homepage.php "</script>';}
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
			<li><a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>  Logout</a></li><br><br>
		</nav>

		<section>
			<article>
				<h1>Dashboard</h1>
				<div class="row">
					<div class="column">
						<div class="container">
							<center>
								<div><?php
								 $query="SELECT user_id FROM users WHERE role='Staff'";
								 $query_run=mysqli_query($conn,$query);
								 $row=mysqli_num_rows($query_run);
								 echo"<h1>" .$row. "</h1>";
								
								?></div>
								<p>Registered Staffs</p>
							</center>
						</div>
					</div>

					<div class="column">
						<div class="container">
							<center>
								<div><?php
								 $query="SELECT user_id FROM users WHERE role='Public'";
								 $query_run=mysqli_query($conn,$query);
								 $row=mysqli_num_rows($query_run);
								 echo"<h1>" .$row. "</h1>";
								
								?></div>
								<p>Registered Public Users</p>
							</center>
						</div>
					</div>
					
					<div class="column">
						<div class="container">
							<center>
								<div><?php
								 $query="SELECT donation_id FROM donation WHERE donation_status='Approved'";
								 $query_run=mysqli_query($conn,$query);
								 $row=mysqli_num_rows($query_run);
								 echo"<h1>" .$row. "</h1>";
								
								?></div>
								<p>Approved Donation</p>
							</center>
						</div>
					</div>
				</div>
				<br><br>
				<h1>Waiting for approval <a href="admin_donationapp.php"><i class="fas fa-edit"></i></a></h1>
				<table class="needapp">
					<tr>
						<th>No.</th>
						<th>Image</th>
						<th>Donation</th>
						<th>Region</th>
						<th>Date</th>
						<th>Details</th>
						<th>Status</th>
					</tr>
					<?php 

			        $sql="SELECT * FROM donation WHERE donation_status='Not approve yet'";
			        $result = mysqli_query($conn,$sql);
			        if ($result == TRUE) {
			            $no = 0;
			            while($row = mysqli_fetch_array($result)) {

	            	?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo '<img src = "data:image;base64,' .base64_encode($row['donation_image']).'" alt="" style="width:150px; height:130px;">'?></td>
						<td><?php echo $row['donation_title']; ?></td>
						<td><?php echo $row['donation_region']; ?></td>
						<td><?php echo $row['donation_date']; ?></td>
						<td><?php echo $row['donation_desc']; ?></td>
						<td><?php echo $row['donation_status']; ?></td>
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