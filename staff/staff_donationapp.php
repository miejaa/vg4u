<?php
session_start();
include("../includes/dbconnection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Donation Approval</title>
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
			<?php 
		        $sql="SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'";
		        $result = mysqli_query($conn,$sql);
		        if ($result == TRUE) {
		            $no = 0;
		            while($row = mysqli_fetch_array($result)) {
            ?>
			<li>
				<center>
					<br><br>
					<?php
						$img=$row['image'];
						if (empty($img)) {
							$img="../images/placeholder.jpg";
						}
						else
							$img="../images/$img";
					?>
					<img src="<?php echo $img; ?>" width="130" height="140" alt="">
					<h2>Welcome, <br><?php echo $_SESSION["username"]; ?></h2>
				</center>
			</li>
			<li><a href="staff_dashboard.php"><i class="fas fa-home"></i>  Dashboard</a></li>
			<li><button class="dropdown-btn"><i class="fas fa-donate"></i>  Manage Donation<i class="fas fa-angle-down"></i></button>
				<div class="dropdown-container">
				    <a href="staff_donationadd.php">Add Donation</a>
				    <a href="staff_donationapp.php">Donation Approval</a>
				    <a href="staff_donationlist.php">List Donation</a>
				</div>
			</li>
			<li><button class="dropdown-btn"><i class="far fa-user-circle"></i>  Manage News<i class="fas fa-angle-down"></i></button>
				<div class="dropdown-container">
				    <a href="staff_addnews.php">Add News</a>
				    <a href="staff_updatenews.php">Update News</a>
				    <a href="staff_listnews.php">List News</a>
				</div>
			</li>
			<li><button class="dropdown-btn"><i class="far fa-user-circle"></i>  Manage NGO<i class="fas fa-angle-down"></i></button>
				<div class="dropdown-container">
				    <a href="staff_addngo.php">Add NGO</a>
				    <a href="staff_updatengo.php">Update NGO</a>
				    <a href="staff_listngo.php">List NGO</a>
				</div>
			</li>
			<li><a href="staff_profile.php"><i class="fas fa-user-edit"></i> Update Profile</a></li>
			<li><a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>  Logout</a></li><br><br>
		</nav>

		<section>
			<article>
				<h1>Waiting for approval</h1>
				<table class="needapp">
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Donation</th>
						<th>Region</th>
						<th>Date</th>
						<th>Details</th>
						<th>Status</th>
					</tr>
					<?php 

			        $sql="SELECT * FROM donation WHERE user_id='".$_SESSION['user_id']."' AND donation_status='Not approve yet'";
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
				<br><br>
				<h1>Donation Approval</h1>
				<br><br>
				<table class="needapp">
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Donation</th>
						<th>Region</th>
						<th>Date</th>
						<th>Details</th>
						<th>Status</th>
					</tr>
					<?php 

			        $sql="SELECT * FROM donation WHERE user_id='".$_SESSION['user_id']."' AND donation_status='Approved' OR user_id='".$_SESSION['user_id']."' AND donation_status='Rejected'";
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
		<?php
			}}
			else
			{
				echo "0 result";
			}
			$conn-> close();

		?>
	</body>
</html>