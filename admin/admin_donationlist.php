<?php
session_start();
include("../includes/dbconnection.php");
if(!empty($_SESSION["user_id"])){
	require_once '../admin/admin_donationlist.php';
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
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["donation_status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Status Donation',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>
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
                <h1>Donation Chart</h1> 
				
                <div id="piechart" style="width: 700px; height: 400px;"></div>  
    
		    <h3> Approved Donation Collection Progress </h3>
                <div style=" background-color: #cae2bc; width:400px; border: 2px solid grey;  margin: 2px; padding:2px;">
				<?php
							$sql = "SELECT SUM(donation_amount) FROM donationstatus WHERE donation_id='9'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$helo = $row['SUM(donation_amount)'];

							}
							?>
							
							<?php
							$sql = "SELECT donation_goal, donation_title FROM donation WHERE donation_id='9'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$goal = $row['donation_goal'];
								$title = $row['donation_title'];

							}
							?>
							<p style=" color:grey;"><i><?php echo $title?> : RM <?php echo $helo?> / <?php echo $goal?></i></p>
							<?php
							$sql = "SELECT SUM(donation_amount) FROM donationstatus WHERE donation_id= '10'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$helo = $row['SUM(donation_amount)'];

							}
							?>
							
							<?php
							$sql = "SELECT donation_goal, donation_title FROM donation WHERE donation_id = '10'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$goal = $row['donation_goal'];
								$title = $row['donation_title'];

							}
							?>
							<p><i><?php echo $title?> : RM <?php echo $helo?> / <?php echo $goal?></i></p>
							<?php
							$sql = "SELECT SUM(donation_amount) FROM donationstatus WHERE donation_id = '11'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$helo = $row['SUM(donation_amount)'];

							}
							?>
							
							<?php
							$sql = "SELECT donation_goal, donation_title FROM donation WHERE donation_id = '11'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$goal = $row['donation_goal'];
								$title = $row['donation_title'];

							}
							?>
							<p style=" color:grey;"><i><?php echo $title?> : RM <?php echo $helo?> / <?php echo $goal?></i></p></div>
				<h1>Donation List</h1>
				<!--<center>
					<form action="admin_donationlistsearch.php" method="post" class="carian">
                    <input id="search" name="search" type="text" placeholder="Search here..">
                    <button id="submit" type="submit" value="Search"><i class="fa fa-search"></i></button>
					</form>
				</center>-->
				<br><br>
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
					</tr>
					<?php 

			        $sql="SELECT * FROM donation";
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
						<td><?php echo $row['donation_goal']; ?></td>
						<td><?php echo $row['donation_achievement']; ?></td>
					</tr>
					<?php
						}}
						else
						{
							echo "0 result";
						}
					?>
				</table>
				</section>
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
			$conn->close();
		?>
	</body>
</html>