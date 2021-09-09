<?php
//Initialise the session
	session_start();
	include_once("includes/dbconnection.php");
	
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
		<!-- Load Stripe.js on your website. -->
		<script src="https://js.stripe.com/v3/"></script>
</head>
	<body>
		<?php
							$sql = "SELECT SUM(donation_amount) FROM donationstatus";
							$result = mysqli_query($conn, $sql) or die ("Error running MySQL query");


							//$result = mysqli_query("SELECT * FROM user") or die ("Error running MySQL query");

							while($row = mysqli_fetch_assoc($result))
							{

								$helo = $row['SUM(donation_amount)'];

							}
							?>
							
							<?php
							$sql = "SELECT donation_goal FROM donation";
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
							<center>
							<button style="width: 30%" data-checkout-mode="payment" data-price-id="price_1JQ59sEhFkNjQZmT5txaZmvs">Donate RM 5</button>
							<button style="width: 30%" data-checkout-mode="payment" data-price-id="price_1JQ59sEhFkNjQZmTOpFwswa4">Donate RM 10</button>
							<button style="width: 30%" data-checkout-mode="payment" data-price-id="price_1JQ59sEhFkNjQZmTTHICn11S">Donate RM 50</button>
							</center>
							<?php } ?>
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
		<script>
      // Replace with your own publishable key: https://dashboard.stripe.com/test/apikeys
      var PUBLISHABLE_KEY = 'pk_test_51J2H3aEhFkNjQZmTEGNAMdaRCOvyV2d8KENHRiCJ95l9dM7w6Wq9zoDVlfdfv6Qll8pvNN1ZgU5gDAad4mVmqLBY00wP5COo4O';
      // Replace with the domain you want your users to be redirected back to after payment
      var DOMAIN = location.href.replace(/[^/]*$/, '');

      if (PUBLISHABLE_KEY === 'pk_test_51J2H3aEhFkNjQZmTEGNAMdaRCOvyV2d8KENHRiCJ95l9dM7w6Wq9zoDVlfdfv6Qll8pvNN1ZgU5gDAad4mVmqLBY00wP5COo4O') {
        console.log(
          'Replace the hardcoded publishable key with your own publishable key: https://dashboard.stripe.com/test/apikeys'
        );
      }

      var stripe = Stripe(PUBLISHABLE_KEY);

      // Handle any errors from Checkout
      var handleResult = function (result) {
        if (result.error) {
          var displayError = document.getElementById('error-message');
          displayError.textContent = result.error.message;
        }
      };

      document.querySelectorAll('button').forEach(function (button) {
        button.addEventListener('click', function (e) {
          var mode = e.target.dataset.checkoutMode;
          var priceId = e.target.dataset.priceId;
          var items = [{ price: priceId, quantity: 1 }];

          // Make the call to Stripe.js to redirect to the checkout page
          // with the sku or plan ID.
          stripe
            .redirectToCheckout({
              mode: mode,
              lineItems: items,
              successUrl:
                DOMAIN + 'resit.php?session_id={CHECKOUT_SESSION_ID}',
              cancelUrl:
                DOMAIN + 'donation.php?session_id={CHECKOUT_SESSION_ID}',
            })
            .then(handleResult);
        });
      });
    </script>
	</body>
</html>
<?php
		}
//Closes specified connection
//mysql_close($conn);
?>