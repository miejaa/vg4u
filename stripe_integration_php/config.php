<?php 
// Product Details 
// Minimum amount is $0.50 US 
$itemName = "Demo Product"; 
$itemNumber = "PN12345"; 
$itemPrice = 25; 
$currency = "USD"; 
 
// Stripe API configuration  
define('STRIPE_API_KEY', 'sk_test_51J2H3aEhFkNjQZmTpwdIiVQ7137yhJ4Y8Ry9hApmeYtT7APmsvntXMWCVZc5gyed25200zQj3LAOMS5aeVGW3MFO00k44nMO9y'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51J2H3aEhFkNjQZmTEGNAMdaRCOvyV2d8KENHRiCJ95l9dM7w6Wq9zoDVlfdfv6Qll8pvNN1ZgU5gDAad4mVmqLBY00wP5COo4O'); 
  
// Database configuration  
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'munity');