<?php
session_start();
include("../includes/dbconnection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update News</title>
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
				<h1>List News</h1>
				<center>
					<form class="carian" action="/action_page.php">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</center>
				<br><br>
				<table class="needapp">
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>News</th>
						<th>Region</th>
						<th>Date</th>
						<th>Details</th>
						<th>Action</th>
					</tr>
					<?php 
			            $sql="SELECT * FROM news WHERE user_id='".$_SESSION['user_id']."'";
			            $result = $conn->query($sql);
			            if ($result->num_rows>0) {
			            while($row = $result->fetch_assoc()) {
			        ?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo '<img src = "data:image;base64,' .base64_encode($row['news_image']).'" alt="" style="width:150px; height:130px;">'?></td>
						<td><?php echo $row['news_title']; ?></td>
						<td><?php echo $row['news_region']; ?></td>
						<td><?php echo $row['news_date']; ?></td>
						<td><?php echo $row['news_desc']; ?></td>
						<td>
							<button class="sah" type="submit"><a href="staff_updatenewss.php?news_id=<?php echo $row['news_id']?>">Update</a></button>

							<button class="reject" type="submit"><a href="includes/staff_deletenewsaction.php?news_id=<?php echo $row['news_id']?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></button>
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