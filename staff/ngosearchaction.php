<?php 
session_start();

include("../includes/dbconnection.php");
$output='';
if(isset($_POST['search'])){
$searchq=$_POST['search'];
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);	
$query=mysqli_query($conn,"Select * from ngo where ngo_name LIKE '%$searchq%'AND user_id='".$_SESSION['user_id']."'")or die("could not search!");
$count= mysqli_num_rows($query);
if($count==0){
	$output='There was no search results!';
}else{
	while($row=mysqli_fetch_array($query)){
		$image='<img src="data:image;base64,'.base64_encode($row['ngo_image']).'"" style="width:150px; height:130px;"';
		$name=$row['ngo_name'];
		$region=$row['ngo_region'];
		$detail=$row['ngo_desc'];
		$address=$row['ngo_address'];
		$email=$row['ngo_email'];
		$tele=$row['ngo_phone']; 
$output .= '<tr>
                        <td>' .$image.'</td>
						<td>' .$name. '</td>
						<td>' .$region. '</td>
						<td>' .$detail. '</td>
						<td>' .$address. '</td>
						<td>' .$email. '</td>
						<td>' .$tele. '</td>
					</tr>'; 
				} 


}}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>List NGO</title>
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
			<li><a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>  Logout</a></li>
		</nav>

		<section>
			<article>
				<h1>List NGO</h1>
				<center>
				<form action="ngosearchaction.php" method="post" class="carian">
					<button onclick="document.location='staff_donationlist.php'" value="Show All">Show All</button>
                    <input id="search" name="search" type="text" placeholder="Search..">
                    <button id="submit" type="submit" value="Search"><i class="fa fa-search"></i></button>
					</form>
					
				</center>
				<br><br>
				<table class="needapp">
					<tr>
						<th>Image</th>
						<th>NGO name</th>
						<th>Region</th>
						<th>Details</th>
						<th>Address</th>
						<th>Email</th>
						<th>Telephone</th>
					</tr>
					<?php print("$output");?>
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