<?php

// Check to see there are posted variables coming into the script
if ($_SERVER['REQUEST_METHOD'] != "POST") die ("No Post Variables");
// Initialize the $req variable and add CMD key value pair
$req = 'cmd=_notify-validate';
// Read the post from PayPal
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}
//  Post all of that back to PayPal's server using url, and validate everything with PayPal
//$url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$curl_result=$curl_err='';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "Content-Length: " . strlen($req)));
curl_setopt($ch, CURLOPT_HEADER , 0);   
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$curl_result = @curl_exec($ch);
$curl_err = curl_error($ch);
curl_close($ch);

$req = str_replace("&", "\n", $req);  

// Check that the result verifies
if (strpos($curl_result, "VERIFIED") !== false) {
    $req .= "\n\nPaypal Verified OK";
} else {
	$req .= "\n\nData NOT verified from Paypal!";
	mail("hairnow@email.com", "IPN interaction not verified", "$req", "From: hairnow@email.com" );
	exit();
}

/* PROCESSING THE TRANSACTION
1. Make sure that email returned is your business email
*/
 
$receiver_email = $_POST['receiver_email'];
if ($receiver_email != "hairnow@email.com") {
	$message = "Investigate why and how receiver email is wrong. Email = " . $_POST['receiver_email'] . "\n\n\n$req";
    mail("hairnow@email.com", "Receiver Email is incorrect", $message, "From: hairnow@email.com" );
    exit(); // exit script
}
// 2. Make sure that the transaction’s payment status is “completed”
if ($_POST['payment_status'] != "Completed") {
	// Handle how you think you should if a payment is not complete yet, a few scenarios can cause a transaction to be incomplete
}
// Connect to database ------------------------------------------------------------------------------------------------------
require_once 'db_class.php';

// 3. Make sure there are no duplicate txn_id
$this_pay = $_POST['pay_id'];
$sql = mysql_query("SELECT pid FROM `payment`WHERE pay_id='$this_pay' LIMIT 1");
$numRows = mysql_num_rows($sql);
if ($numRows > 0) {
    $message = "Duplicate transaction ID occured so we killed the IPN script. \n\n\n$req";
    mail("hairnow@email.com", "Duplicate txn_id in the IPN system", $message, "From: hairnow@email.com" );
    exit(); // exit script
} 
// 4. Make sure the payment amount matches what you charge for items. (Defeat Price-Jacking) 
$product_id_string = $_POST['customer_id'];
$product_id_string = rtrim($product_id_string, ","); // remove last comma
// Explode the string, make it an array, then query all the prices out, add them up, and make sure they match the payment_gross amount
$id_str_array = explode(",", $product_id_string); // Uses Comma(,) as delimiter(break point)
$fullAmount = 0;
foreach ($id_str_array as $key => $value) {
    
	$id_quantity_pair = explode("-", $value); // Uses Hyphen(-) as delimiter to separate product ID from its quantity
	$product_id = $id_quantity_pair[0]; // Get the product ID
	$product_quantity = $id_quantity_pair[1]; // Get the quantity
	$sql = mysql_query("SELECT price FROM products WHERE id='$product_id' LIMIT 1");
    while($row = mysql_fetch_array($sql)){
		$product_price = $row["price"];
	}
	$product_price = $product_price * $product_quantity;
	$fullAmount = $fullAmount + $product_price;
}
$fullAmount = number_format($fullAmount, 2);
$grossAmount = $_POST['mc_gross']; 
if ($fullAmount != $grossAmount) {
        $message = "Possible Price Jack: " . $_POST['payment_gross'] . " != $fullAmount \n\n\n$req";
        mail("hairnow@email.com", "Price Jack or Bad Programming", $message, "From: hairnow@email.com" );
        exit(); // exit script
} 
// END ALL SECURITY CHECKS NOW IN THE DATABASE IT GOES s
$pay_id = $_POST['pay_id'];
$pamount = $_POST['amt'];
$custom_id = $_POST['customer_id'];
$ord_id = $_POST['order_id'];
$currency = $_POST['currency'];
$pdate = $_POST['payment_date'];
// Place the transaction into the database
$sql = mysql_query("INSERT INTO `payment`(`pay_id`, `amt`,`customer_id`, `order_id`, `currency`, `payment_date`) VALUES ($pay_id,$custom_id,$ord_id,$pamount,$currency,$pdate)") or die ("unable to execute the query");

mysql_close();
// Mail yourself the details
mail("hairnow@email.com", "NORMAL IPN RESULT YAY MONEY!", $req, "From: hairnow@email.com");
?>