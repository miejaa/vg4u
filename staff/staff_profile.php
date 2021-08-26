<?php
session_start();
include("../includes/dbconnection.php");
if(!empty($_SESSION["user_id"])){
	require_once '../staff/staff_profile.php';
}else{
echo "<script>alert('You are not logged in, Please Log in first! ');</script>";
echo '<script language="javascript"> window.location.href="../homepage.php "</script>';}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
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
				<h1>Profile</h1>
				<div class="add">
					<form action="includes/staff_updateactionpic.php" method="POST">
                            <center>
        					<?php
								$img1=$row['image'];
								if (empty($img1)) {
									$img1="../images/placeholder.jpg";
								}
								else
									$img1="../images/$img1";
							?>
							<img src="<?php echo $img1; ?>" width="250" height="250" alt="">
							<br>
							<!--<label for="fileToUpload">Upload Profile Picture</label><br>-->
							<!-- actual upload which is hidden -->
							<input type="file" id="actual-btn" name="fileToUpload" accept="image/gif, image/jpeg, image/png, image/jpg" onchange="loadFile(event)" hidden/>
							<!-- custom upload button -->
							<label for="actual-btn" id="custom"><i class="fas fa-upload"></i> Choose File</label>
							<!-- name of file chosen -->
							<br>
							<span id="file-chosen">No file chosen</span>
							<br>
							<img id="thumbnail" style="width: 300px" />
							<input type="submit" value="Update Picture">
						</center>

        			</form>

					<form action="includes/staff_updateaction.php" method="post">
   
						<br>
					  	<label for="fname">Full name</label><br>
					  	<input type="text" id="fname" name="fname" value="<?php echo $row['user_fname']; ?> "><br><br>
					  	<label for="email">Email address</label><br>
					  	<input type="text" id="email" name="email" value="<?php echo $row['user_email']; ?> "><br><br>
					  	<label for="phone">Phone number</label><br>
					  	<input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?> " patern="[0-9]{3}[0-9]{3}[0-9]{4}" minlength="9" maxlength="11"><br><br>
						<input type="submit" value="Update Profile">
						<?php
						}}
						else
						{
							echo "0 result";
						}
						$conn-> close();

						?>
						
					</form>
				</div>
			</article>
		</section>
		<footer>
		</footer>
		<script>
			const actualBtn = document.getElementById('actual-btn');
			const fileChosen = document.getElementById('file-chosen');

			actualBtn.addEventListener('change', function(){
 			fileChosen.textContent = this.files[0].name
			})
		</script>
		<script>
			/*preview uploaded image*/
			var loadFile = function(event) {
				var image = document.getElementById('thumbnail');
				image.src = URL.createObjectURL(event.target.files[0]);
			};
		</script>
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