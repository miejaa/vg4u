<?php
if (empty($_GET['donation_id'])) {
	# code...
	header("Location: ppedonation.php");
	exit;
}
include_once('includes/dbconnection.php');
$donation_id = $_GET['donation_id'];
$sql = mysqli_query($con, "SELECT * FROM donation WHERE donation_id = '$donation_id'") or die(mysqli_error());
if ($sql->num_rows > 0) {
	# code...
	$data = mysqli_fetch_array($sql);
	$donation_title = $data['donation_title'];
}
else{
	header("Location: ppedonation.php");
}

require 'stripe-php-master/init.php';
\Stripe\Stripe::setApiKey('sk_test_51J2H3aEhFkNjQZmTpwdIiVQ7137yhJ4Y8Ry9hApmeYtT7APmsvntXMWCVZc5gyed25200zQj3LAOMS5aeVGW3MFO00k44nMO9y');

  $session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => $donation_title,
        ],
        'unit_amount' => 2000,
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/vg4u/success.html',
    'cancel_url' => 'http://localhost/vg4u/cancel.html',
  ]);

?>
	<html>
	<head>
		<title>Stripe Server Side Integration</title>
		
	</head>
	<body>
		<script src="https://js.stripe.com/v3/"></script>
		 <script type="text/javascript">
      // Create an instance of the Stripe object with your publishable API key
      var stripe = Stripe('pk_test_51J2H3aEhFkNjQZmTEGNAMdaRCOvyV2d8KENHRiCJ95l9dM7w6Wq9zoDVlfdfv6Qll8pvNN1ZgU5gDAad4mVmqLBY00wP5COo4O');
		var session = "<?php echo $session['donation_id'];?>"
		
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

	</body>	
	</html>