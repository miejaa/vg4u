<?php
//Initialise the session
	session_start();
	include_once("includes/dbconnection.php");
	$donationID = $_GET['donation_id'];
	$sql = mysqli_query($conn, "SELECT * FROM donation WHERE donation_id = '$donationID'") or die(mysqli_error());
	if ($sql->num_rows > 0) {
		$data = mysqli_fetch_array($sql);
		$name = $data['donation_title'];
		$price = $data['donation_goal'];
	}
	else {
		header("Location: donation1.php");
	}
	
	require 'stripe-php-master/init.php';
	
	\Stripe\Stripe::setApiKey('sk_test_51J2H3aEhFkNjQZmTpwdIiVQ7137yhJ4Y8Ry9hApmeYtT7APmsvntXMWCVZc5gyed25200zQj3LAOMS5aeVGW3MFO00k44nMO9y');

  $session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => $name,
        ],
        'unit_amount' => $price,
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/vg4u/success.html',
    'cancel_url' => 'http://localhost/vg4u/cancel.html',
  ]);

$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");
//Fetches a result row as an associative array
$row = mysqli_fetch_assoc($result);
if ($row == 0)
	{
		
		session_unset();
		//echo "<meta httpequiv=\"refresh\"content=\"3;URL=login.php\">";
		//header('Refresh:2; url=login.php');
		//echo "Login first";
		echo "<script> alert('Log In First!');window.location.href='login.php';</script>";
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
		<script src="../assets/scripts/jquery.min.js"></script>
</head>
	<body>
	<script src="https://js.stripe.com/v3/"></script>
	
	 <script type="text/javascript">
      // Create an instance of the Stripe object with your publishable API key
      var stripe = Stripe('pk_test_51J2H3aEhFkNjQZmTEGNAMdaRCOvyV2d8KENHRiCJ95l9dM7w6Wq9zoDVlfdfv6Qll8pvNN1ZgU5gDAad4mVmqLBY00wP5COo4O');
      var session = "<?php echo $session['donation_id']; ?>"

        // Create a new Checkout Session using the server-side endpoint you
        // created in step 3.
      
       stripe.redirectToCheckout({ sessionId: session })
       
        .then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
     
    </script>
	
		<?php
							$sql = "SELECT SUM(donation_amount) FROM donationstatus WHERE donation_id='".$_GET['donation_id']."'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$helo = $row['SUM(donation_amount)'];

							}
							?>
							
							<?php
							$sql = "SELECT donation_goal FROM donation WHERE donation_id='".$_GET['donation_id']."'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$goal = $row['donation_goal'];

							}
							?>
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
			<?php
							$sql = "SELECT * FROM donation WHERE donation_id='".$_GET['donation_id']."'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");
							
							while($row = mysqli_fetch_assoc($result))
							{

								
							?>
			
			<article>
				<div class="donatecontainer">
					<div class="row">
						
						<div class="column">
							<div class="bg">
								<center>
									<h1 id="h-PPE"><?php echo $row['donation_title']; ?></h1>
									<?php echo '<img src = "data:image;base64,' .base64_encode($row['donation_image']).'" alt="" style="width:570px; height:500px;">'; ?>
								</center>
							</div>	
						</div>

						<div class="column">

							<h1>Description </h1>
							<svg><line x1="0" y1="0" x2="100%" y2="0"/></svg>
							<p class="fstyle"><?php echo  $row['donation_desc']; ?> </p>
			
							<progress value="<?php echo $helo?>" max="<?php echo $goal?>" data-text="RM<?php echo $helo?> / RM<?php echo $goal?>"></progress>
							<br><br><br><br>
							
							<h1>Details </h1>
							<hr>
							<p class="fstyle"><b>Donation Type: </b><?php echo  $row['donation_type']; ?> </p>
							<p class="fstyle"><b>Donation Region: </b><?php echo  $row['donation_region']; ?> </p>
							<p class="fstyle"><b>Donation Start Date: </b><?php echo  $row['donation_date']; ?> </p>
							
							<button onclick="document.getElementById('donatefill').style.display='block'">Donate</button>	
							<div id="donatefill" class="modal">
							  <span onclick="document.getElementById('donatefill').style.display='none'" class="close" title="Close Modal">&times;</span>
								<?php
							$sql = "SELECT * FROM donation WHERE donation_id='".$_GET['donation_id']."'";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");
							while($row = mysqli_fetch_assoc($result))
							{
								 // echo "<a href='ppedonation.php?donation_id=".$row['donation_id']."'>";
							  echo "<form class='modal-content' action='includes/donation_action.php?donation_id=".$row['donation_id']."'  method='POST'>";
							}
								  
								  ?>

								  <?php
							$sql1 = "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'";
							$result1 = mysqli_query($conn, $sql1) or die ("Error running MySQL query");
							while($row1 = mysqli_fetch_assoc($result1))
							{
								?>
							    <div class="form-container">
								
							      	<p>Select Payment Method</p>
							     	<hr>
							        <input type="radio" id="on9" name="pay" value="Online Banking-Malaysia">
									<label for="Online Banking-Malaysia">Online Banking-Malaysia</label>
									<input type="radio" id="paypal" name="pay" value="Paypal">
									<label for="Paypal">Paypal</label><br>

									<p>Personal Info</p>
							     	<hr>
								    <label for="name"><b>Full Name &#42;</b></label>
								    <input type="text" value="<?php echo $row1['user_fname']?>" name="name" required>

								    <label for="phone"><b>Phone Number</b></label>
								    <input type="text" value="<?php echo $row1['phone']?>" name="phone">
								    
								    <label for="amount"><b>RM </b></label>
								    <input type="number" min="10" max="50" name="amount" step="any" placeholder="Custom Amount" required>

							      	<div class="clearfix">
							        <button type="button" onclick="document.getElementById('donatefill').style.display='none'" class="cancelbtn" style="background-color: IndianRed">Cancel</button>
									<!-- <button type="submit"><a href="resit.php">Donate</a></button>-->
							    	<button  class="signupbtn" type="submit" name="submit" >Donate</button>
							      </div>
							    </div>
							  </form>
							<?php } ?>

		<?php } ?>
							</div>
					
							</div>
						</div>

					</div>
				</div>
				<br><br><br>
			</article>
		</section>
		<footer>
			<p>	&copy; Virtual Gift4U, Malaysia</p>
		</footer>
	</body>
</html>
<?php
		}
//Closes specified connection
//mysql_close($conn);
?>