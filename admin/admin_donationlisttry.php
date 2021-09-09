<?php
session_start();
include("../includes/dbconnection.php");
if(!empty($_SESSION["user_id"])){
	require_once '../admin/admin_donationlisttry.php';
}else{
echo "<script>alert('You are not logged in, Please Log in first! ');</script>";
echo '<script language="javascript"> window.location.href="../homepage.php "</script>';}
?>
<?php
 $query = "SELECT donation_status, count(*) as number FROM donation GROUP BY donation_status ";  
 $result = mysqli_query($conn, $query);
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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
		<script src="javaku.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	</head>
	<script>
	body {
		overflow-x: hidden; /* Hide horizontal scrollbar */
	}
	</script>
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
					<a href="admin_donationlisttry.php">Donation History</a>
				</div>
			</li>
			<li><a href="admin_suggestion.php"><i class="fas fa-comments"></i>  View Suggestion</a></li>
			<li><a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>  Logout</a></li>
		</nav>

		<section>
			<article>  
                <!--<h1>Donation History</h1>-->
				<br><br>
				<div class="logincontainer">
					<div class="row">
					<h1><center>Donation History</center></h1><br><br>
				<table class="needapp" align="center" border="0" width="90%" cellpadding="10" cellspacing="0">
					<tr align="center">
						<th width="7%" style="background-color: #f7e3b5;">No.</th>
						<th width="20%" style="background-color: #f7e3b5;">Donation Title</th>
						<th width="5%" style="background-color: #f7e3b5;">Amount</th>
						<th width="20%" style="background-color: #f7e3b5;">Payment Method</th>
						<th width="20%" style="background-color: #f7e3b5;">Donor Name</th>
						<th width="20%" style="background-color: #f7e3b5;">Date</th>
					</tr>
					<?php 
					//$user_id = $row['user_id'];
					//$username = $row['username'];
			        $sql="SELECT c.user_fname, b.donation_title, a.donation_amount, a.pay, a.donation_date FROM donationstatus a, donation b , users c WHERE a.donation_id = b.donation_id
						  AND c.user_id=a.user_id";
			        $result = mysqli_query($conn,$sql);
			        if ($result == TRUE) {
			            $no = 0;
			            while($row = mysqli_fetch_array($result)) {
	            	?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo $row['donation_title']; ?></td>
						<td><?php echo $row['donation_amount']; ?></td>
						<td><?php echo $row['pay']; ?></td>
						<td><?php echo $row['user_fname']; ?></td>
						<td><?php echo $row['donation_date']; ?></td>
					</tr>
					<?php
						}}
						else
						{
							echo "0 result";
						}
					?>
				</table>
        			</div>
				</div>
				
                <!-- Portfolio Gallery Grid -->
                <!--<div class="row">-->
               
				<!--<//?php
						
					
					//$result = mysqli_query($conn, $sql);
					//$resultCheck = mysqli_num_rows($result);

					$sql = "SELECT * FROM `donation` WHERE donation_status like 'Approved';";
					$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


					//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");
					
					<!--while($row = mysqli_fetch_assoc($result))
					{
						//echo "<div class='row'>";
				<!--//MAIN (Center website)
						if ($row['donation_date'] == '%2021%'){
                //<!-- Portfolio Gallery Grid -->
							
							<!--echo"<!--<div class='column north' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							<!--echo "<!--<a href='ppedonation.php?donation_id=".$row['donation_id']."'>";
							echo '<img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:200px; height:230px;">';
							echo"<h4>".$row['ngo_name']."</h4>";
							echo"<p>".$row['ngo_desc']."</p>";
							echo"<br><b>Address: </b><p>".$row['ngo_address']."</p>";
							echo"<br><b>E-mail: </b><p>".$row['ngo_email']."</p>";
							echo"<br><b>Phone Number: </b><p>".$row['ngo_phone']."</p>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";
               // echo"<div class='column north'>";
                //echo"<div class='content'>";
               // echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
						<!--}
						else if($row['donation_date'] == '%2020%')
							
							{
							//echo "<!--<div class='row'>";
							echo"<div class='column centre' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							<!--echo '<!--<img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:200px; height:230px;">';
							echo"<h4>".$row['ngo_name']."</h4>";
							echo"<p>".$row['ngo_desc']."</p>";
							echo"<br><b>Address: </b><p>".$row['ngo_address']."</p>";
							echo"<br><b>E-mail: </b><p>".$row['ngo_email']."</p>";
							echo"<br><b>Phone Number: </b><p>".$row['ngo_phone']."</p>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";

							}
						
						else if($row['donation_date'] == '%2019%')
							
							{
							 //echo "<div class='row'>";
							echo"<div class='column eastcoast' style='width: 100%'>";
							echo"<div class='content'>";
							//echo<!--<img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">-->
							<!--echo '<!--<img src = "data:image;base64,' .base64_encode($row['ngo_image']).'" alt="" style="width:200px; height:230px;">';
							echo"<h4>".$row['ngo_name']."</h4>";
							echo"<p>".$row['ngo_desc']."</p>";
							echo"<br><b>Address: </b><p>".$row['ngo_address']."</p>";
							echo"<br><b>E-mail: </b><p>".$row['ngo_email']."</p>";
							echo"<br><b>Phone Number: </b><p>".$row['ngo_phone']."</p>";
							echo"</div>";
							echo"</div>";
							//echo"</div>";

							}
						
							//echo"</div>";
					}
					
					
					?>
			 
<!-- END GRID -->
<!--</div>-->

<!-- END MAIN -->
				<!--</div>-->
				
				<!--<center>
					<form action="admin_donationlistsearch.php" method="post" class="carian">
                    <input id="search" name="search" type="text" placeholder="Search here..">
                    <button id="submit" type="submit" value="Search"><i class="fa fa-search"></i></button>
					</form>
				</center>-->
				<!--<br><br>
				<table class="needapp">
					<tr>
						<th>No.</th>
						<th>Image</th>
						<th>Donation</th>
						<th>Region</th>
						<th>Date</th>
						<th>Details</th>
						<th>Status</th>
						<th>Goal (RM)</th>
						<th>Achievement</th>
						<!--<th>Details</th>-->
					<!--</tr>
					 <//?php 

			         $sql="SELECT * FROM donation WHERE donation_status='Approved'";
					 $result = mysqli_query($conn,$sql);
			         if ($result == TRUE) {
			             $no = 0;
			             while($row = mysqli_fetch_array($result)) {

	            	 ?>
						 
					<tr>
						<td><//?php echo ++$no; ?></td>
						<td><//?php echo '<img src = "data:image;base64,' .base64_encode($row['donation_image']).'" alt="" style="width:150px; height:130px;">'?></td>
						<td><//?php echo $row['donation_title']; ?></td>
						<td><//?php echo $row['donation_region']; ?></td>
						<td><//?php echo $row['donation_date']; ?></td>
						<td><//?php echo $row['donation_desc']; ?></td>
						<td><//?php echo $row['donation_status']; ?></td>
						<td><//?php echo $row['donation_goal']; ?></td>
						<td><//?php echo $row['donation_achievement']; ?></td>
						<!--<td>
							<button class="sah"><a href="admin_donationdetails.php?donation_id=<//?php echo $row['donation_id']?>">Click</a></button>
						</td>-->
					</tr>
					<//?php
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
		
		<?//php
			// $conn->close();
		// ?>
	</body>
</html>