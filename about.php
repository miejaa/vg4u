<!DOCTYPE html>
<html>
	<head>
		<title>Virtual Gift4U.com</title>
		<link rel="icon" href="images/olive.png">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="javaku.js"></script>
</head>
	<body>
				<nav>
<div class="topnav" id="myTopnav">
 <a href="homepage.php">Home</a>
  <a href="about.php">About</a>
  <a href="donation.php">Donation</a>
  <a href="news.php">News</a>
  <a href="ngo.php">NGOs</a>
  <a  href="login.php" style="float:right"><img src="images/userc.png" width="20" height="20" alt=""/></a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</nav>
		<section>
			<article>
				<div class="aboutcontainer">
				<div class="container1">
					<img src="images/Abt.png">
					<br><br>
					<h1>About</h1>
					<p>Virtual Gift4U is a charity website that provides a fundraising platform and volunteering works in the Malaysian community and NGOs involved for humantarian activities.</p>
				</div>

				<div class="container2">
					<div class="border">
						<center>
							<img src="images/cc1.png">
						</center>
					</div>
					<h1>Contact Us</h1>
					<p id="caption">Have any questions? We'd love to hear from you.</p>
				</div>

				<div class="container3">
					<form action="login.php">
					  	<label for="fname">Username :</label><br>
					  	<input type="text" id="username" placeholder="Username"><br><br>
					  	<label for="fname">Suggestion :</label><br>
					  	<textarea id="suggest" placeholder="In my opinion, this website.."></textarea><br><br>
					  	<input onClick="myFunction()" type="submit" value="Submit">
						<!--<button type="submit" onClick="myFunction()">Submit</button>-->
						
						<script>
						function myFunction() {
							alert("To leave a suggestion, Please log in first!");
						}
						</script>
						
					</form> 
					<p><img src="images/sgbox.png"></p>
					<h1>Any Suggestion?</h1>
					<p>Share some tips for us to improve and makes this website a better place for you.</p>
					<br>
				</div>
				<div class="container4">
						<center>
							<p class="map"><iframe src="https://www.google.com/maps/d/u/0/embed?mid=1bgXU1ik24HdrqnvFeMCK_GLoJYp_LrTL" width="640" height="450"></iframe></p>
							<h1>Distribution Locater</h1>
							<p class="text">Help in distributing donations to the <br> respective organization.</p>
						</center>
				</div>
				</div>
			</article>
		</section>
				<footer>
			<p>	&copy; Virtual Gift4U, Malaysia</p>
		</footer>
	</body>
</html>