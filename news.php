<?php
//Initialise the session
session_start();
include("includes/dbconnection.php");
?>	

<!DOCTYPE html>
<html>
<head>
		<title>Virtual Gift4U.com</title>
		<link rel="icon" href="images/olive.png">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<div class="container1">
					<img src="images/n.png">
					<br><br>
					<h1>News</h1>
					<p>Virtual Gift4U shares updates about the current news related to charities by region in Malaysia.</p>
				</div>
				
				<!-- MAIN (Center website) -->
				<div class="news">
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

                <!-- Portfolio Gallery Grid -->
<div class="row">
              
				<?php
						
					
					//$result = mysqli_query($conn, $sql);
					//$resultCheck = mysqli_num_rows($result);

					$sql = "SELECT* FROM news;";
					$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


					//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");
					while($row = mysqli_fetch_assoc($result))
					{
	
				//MAIN (Center website)
						if ($row['news_region'] == 'North Region'){
                //<!-- Portfolio Gallery Grid -->
							//echo "<div class='row'>";
							echo"<div class='column north' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['news_image']).'" alt="" style="width:200px; height:250px;"></center>';
							echo"<center><h4>".$row['news_title']."</h4></center>";
							echo"<center><p>".$row['news_desc']."</p></center>";
							echo"</div>";
							echo"</div>";
               // echo"<div class='column north'>";
                //echo"<div class='content'>";
               // echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
						}
						else if($row['news_region'] == 'Central Region')
							
							{
							// echo "<div class='row'>";
							echo"<div class='column centre'style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['news_image']).'" alt="" style="width:200px; height:230px;"></center>';
							echo"<center><h4>".$row['news_title']."</h4></center>";
							echo"<center><p>".$row['news_desc']."</p></center>";
							echo"</div>";
							echo"</div>";

							}
						
						else if($row['news_region'] == 'East Region')
							
							{
							// echo "<div class='row'>";
							echo"<div class='column eastcoast' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['news_image']).'" alt="" style="width:200px; height:230px;"></center>';
							echo"<center><h4>".$row['news_title']."</h4></center>";
							echo"<center><p>".$row['news_desc']."</p></center>";
							echo"</div>";
							echo"</div>";

							}
						else if($row['news_region'] == 'Southern Region')
							
							{
							//echo "<div class='row'>";
							echo"<div class='column south' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['news_image']).'" alt="" style="width:200px; height:230px;"></center>';
							echo"<center><h4>".$row['news_title']."</h4></center>";
							echo"<center><p>".$row['news_desc']."</p></center>";
							echo"</div>";
							//echo"</div>";

							}
						else if($row['news_region'] == 'Sabah and Sarawak')
							
							{
							//echo "<div class='row'>";
							echo"<div class='column ss' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							echo '<center><img src = "data:image;base64,' .base64_encode($row['news_image']).'" alt="" style="width:200px; height:230px;"></center>';
							echo"<center><h4>".$row['news_title']."</h4></center>";
							echo"<center><p>".$row['news_desc']."</p><center>";
							echo"</div>";
							echo"</div>";

							}
						
					}
					
				
					?>
					
<!-- END GRID -->
</div>

<!-- END MAIN -->
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