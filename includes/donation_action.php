<?php
session_start();
include "../includes/dbconnection.php";
    $name = $_POST['name'];
	$amount = $_POST['amount'];
	$pay = $_POST['pay'];
	$phone = $_POST['phone'];
	
	$donationID = $_GET['donation_id'];
	
	//require '../stripe-php-master/init.php';
	
	//\Stripe\Stripe::setApiKey('sk_test_51J2H3aEhFkNjQZmTpwdIiVQ7137yhJ4Y8Ry9hApmeYtT7APmsvntXMWCVZc5gyed25200zQj3LAOMS5aeVGW3MFO00k44nMO9y');

  // $session = \Stripe\Checkout\Session::create([
    // 'payment_method_types' => ['card'],
    // 'line_items' => [[
      // 'price_data' => [
        // 'currency' => 'usd',
        // 'product_data' => [
          // 'name' => $name,
        // ],
        // 'unit_amount' => $amount,
      // ],
      // 'quantity' => 1,
    // ]],
    // 'mode' => 'payment',
    // 'success_url' => 'http://localhost/vg4u/success.html',
    // 'cancel_url' => 'http://localhost/vg4u/cancel.html',
  // ]);


$query = "SELECT user_id from users WHERE user_id='".$_SESSION['user_id']."'";
$results = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($results))
  {
    $user_id = $row['user_id'];
    
  }

$sql =("INSERT INTO donationstatus (donation_amount, donation_id, user_id, pay, name, phone) VALUES ('$amount', '".$_GET['donation_id']."','$user_id','$pay', '$name', '$phone')")  or die ("Error inserting data into table");
mysqli_query($conn, $sql);

$sql1 =("INSERT INTO transaction_history (user_id, , donation_id, donation_amount) VALUES ('$user_id', '".$_GET['donation_id']."', '$amount')")  or die ("Error inserting data into table");
mysqli_query($conn, $sql1);

//Closes specified connection

echo "<script>alert('Donation Successful');</script>";
header('Refresh:0; url=../resit.php?donation_id="'.$_GET['donation_id'].'"');

mysqli_close($conn);
?>