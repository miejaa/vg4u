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
		<section>
			<article>
				<center>
					<hr>
						<h1 id="h-PPE" style="font-size: 40px;">Welcome, <br><?php echo $_SESSION["username"]; ?></h1>
					<hr>
				<div class="logincontainer">
					<div class="row">
						<?php 
					        $sql="SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'";
					        $result = mysqli_query($conn,$sql);
					        if ($result == TRUE) {
					            $no = 0;
					            while($row = mysqli_fetch_array($result)) {
		            	?>

		            <form action="includes/update_pic.php" method="POST">
        				<div class="column">
        					<?php
								$img=$row['image'];
								if (empty($img)) {
									$img="images/placeholder.jpg";
								}
								else
									$img="images/$img";
							?>
							<img src="<?php echo $img; ?>" width="250" height="250" alt="">
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
							<button type="submit">Update Picture</button>
        				</div>
        			</form>

        				<form action="includes/update_action.php" method="post">
        				<div class="column">
        					<label for="fname">Full name</label><br>
							<input type="text" id="fname" name="fname" value="<?php echo $row['user_fname']; ?> "><br><br>
							<label for="email">Email address</label><br>
							<input type="text" id="email" name="email" value="<?php echo $row['user_email']; ?> "><br><br>
							<label for="phone">Phone number</label><br>
							<input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?> " patern="[0-9]{3}[0-9]{3}[0-9]{4}" minlength="9" maxlength="11"><br><br>	
							<button type="submit">Update Profile</button>
        				</div>
        			</form>
					<?php
						}}
						else
						{
							echo "0 result";
						}

					?>
				</div>
			</div>
				</center>
			</article>
		</section>
		<footer>
			<p>	&copy; Virtual Gift4U, Malaysia</p>
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

	</body>
</html>

<?php
		}
//Closes specified connection
//mysql_close($conn);
?>
