<?php
require_once 'includes/dbconnection.php';
session_start();
require_once('stripe-php-master/init.php');

$username = $_GET['user_id'];


$query = "SELECT * FROM booking b JOIN submission s ON b.booking_id=s.booking_id JOIN task t ON t.task_id = b.task_id WHERE b.booking_id = $id ";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$price = $row['wordcount'] * 0.4 * 100;


\Stripe\Stripe::setApiKey("sk_test_51J1duqALIoEFXsbSVArYLfxu9FjZU8foy91e7570xSgmgdaXtZ4iTEeP7LcCS9JLSt6V3402cLVQF0rBLKxLKoWq00uJ8iLtl6");


$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'myr',
            'product_data' => [
                'name' => 'Hermes Translation Service',
            ],
            'unit_amount' => $price,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://' . $host,
    'cancel_url' => 'https://example.com/cancel',

]);

?>

<html>

<head>
    <title>Hermes - Payment</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="../assets/styles/style.min.css">
    <link rel="stylesheet" href="..\assets\plugin\bootstrap\css\bootstrap-theme.min.css">


</head>

<body align="center">
    <div id="wrapper">
        <div class="main-content">
            <button class="btn btn-info m-auto " id="checkout-button">Checkout</button>
        </div>
    </div>

    <script src="../assets/scripts/jquery.min.js"></script>
    <script src="../assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="../assets/plugin/waves/waves.min.js"></script>

    <script>
        var stripe = Stripe("pk_test_51J1duqALIoEFXsbSMWnpcP7DbEnL4rHCE2sr3x8m7x77j9uiZCmg5bjMBtlPMbotC9pZoskQVfipR9pe91stcE1L00CYU9PJAy");
        $('#checkout-button').on('click', function(e) {
            e.preventDefault();

            stripe.redirectToCheckout({
                sessionId: "<?php echo $session->id; ?>"
            })
        })
    </script>
</body>

</html>