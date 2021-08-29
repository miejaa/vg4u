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
			</div>
		</nav>
		<section>
			<article>
				<div class="container1">
					<img src="images/volun.png">
					<br><br>
					<h1>NGO</h1>
					<p>Virtual Gift4U shares NGOs that offered help by region in Malaysia.</p>
				</div>
				
				<!-- MAIN (Center website) -->
				<div class="ngo">
                <div class="main">
				<center><div id="myBtnContainer">
                <button class="btn" onclick="filterSelection('all')"> Show all</button>
                <button class="btn" onclick="filterSelection('north')"> Northern Region</button>
				<button class="btn" onclick="filterSelection('centre')"> Central Region</button>
                <button class="btn" onclick="filterSelection('eastcoast')"> East Coast</button>
                <button class="btn" onclick="filterSelection('south')"> Southern Region</button>
				<button class="btn" onclick="filterSelection('ss')"> Sabah and Sarawak</button>
                </div></center>
				</div>
				<div class='row'>
				<?php
						
					
					//$result = mysqli_query($conn, $sql);
					//$resultCheck = mysqli_num_rows($result);

					$sql = "SELECT* FROM ngo;";
					$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


					//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");
					
					while($row = mysqli_fetch_assoc($result))
					{
						//echo "<div class='row'>";
				//MAIN (Center website)
						if ($row['ngo_region'] == 'North Region'){
                //<!-- Portfolio Gallery Grid -->
							
							echo"<div class='column north' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:600px; height:390px;"></center>';
							echo"<center><h4>".$row['ngo_name']."</h4></center>";
							echo"<center><p>".$row['ngo_desc']."</p></center>";
							echo"<center><br><b>Address: </b><p>".$row['ngo_address']."</p></center>";
							echo"<center><br><b>E-mail: </b><p>".$row['ngo_email']."</p></center>";
							echo"<center><br><b>Phone Number: </b><p>".$row['ngo_phone']."</p></center>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";
               // echo"<div class='column north'>";
                //echo"<div class='content'>";
               // echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
						}
						else if($row['ngo_region'] == 'Central Region')
							
							{
							//echo "<div class='row'>";
							echo"<div class='column centre' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:600px; height:390px;"></center>';
							echo"<center><h4>".$row['ngo_name']."</h4></center>";
							echo"<center><p>".$row['ngo_desc']."</p></center>";
							echo"<center><br><b>Address: </b><p>".$row['ngo_address']."</p></center>";
							echo"<center><br><b>E-mail: </b><p>".$row['ngo_email']."</p></center>";
							echo"<center><br><b>Phone Number: </b><p>".$row['ngo_phone']."</p></center>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";

							}
						
						else if($row['ngo_region'] == 'East Region')
							
							{
							 //echo "<div class='row'>";
							echo"<div class='column eastcoast' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:600px; height:390px;"></center>';
							echo"<center><h4>".$row['ngo_name']."</h4></center>";
							echo"<center><p>".$row['ngo_desc']."</p></center>";
							echo"<center><br><b>Address: </b><p>".$row['ngo_address']."</p></center>";
							echo"<center><br><b>E-mail: </b><p>".$row['ngo_email']."</p></center>";
							echo"<center><br><b>Phone Number: </b><p>".$row['ngo_phone']."</p></center>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";

							}
						else if($row['ngo_region'] == 'Southern Region')
							
							{
							//echo "<div class='row'>";
							echo"<div class='column south' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:600px; height:390px;"></center>';
							echo"<center><h4>".$row['ngo_name']."</h4></center>";
							echo"<center><p>".$row['ngo_desc']."</p></center>";
							echo"<center><br><b>Address: </b><p>".$row['ngo_address']."</p></center>";
							echo"<center><br><b>E-mail: </b><p>".$row['ngo_email']."</p></center>";
							echo"<center><br><b>Phone Number: </b><p>".$row['ngo_phone']."</p></center>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";

							}
						else if($row['ngo_region'] == 'Sabah and Sarawak')
							
							{
							//echo "<div class='row'>";
							echo"<div class='column ss' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:600px; height:390px;"></center>';
							echo"<center><h4>".$row['ngo_name']."</h4></center>";
							echo"<center><p>".$row['ngo_desc']."</p></center>";
							echo"<center><br><b>Address: </b><p>".$row['ngo_address']."</p></center>";
							echo"<center><br><b>E-mail: </b><p>".$row['ngo_email']."</p></center>";
							echo"<center><br><b>Phone Number: </b><p>".$row['ngo_phone']."</p></center>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";

							}
							//echo"</div>";
					}
					
					
					?>
				</div>
				</div>


	<script>
   filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }

  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
        </script>			
		</article>
		</section>
		<footer>
			<p>Virtual Gift4U</p>
		</footer>
	</body>
</html>

<?php
		}
//Closes specified connection
//mysql_close($conn);
?>