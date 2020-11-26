<?php


//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require_once("../Controllers/customer_controller.php");
require_once("../Controllers/cart_controller.php");



//check if login button was clicked 
if (isset($_POST['submit'])) {
	


	//check if email exist
	$getDetails = getCustomerDetails_c($_POST['cemail']);
	
	if ($getDetails) {
		//email exist, continue to password
		//get password from database

		
		$hash = $getDetails['customer_password'];

		if (password_verify($_POST['cpass'], $hash)) {
			
		
			//set session
			$_SESSION["user_id"] = $getDetails['customerID'];
			$_SESSION["user_role"] = $getDetails['user_role'];
			$_SESSION["user_name"] = $getDetails['customer_name'];
			$_SESSION["email"] = $_POST['cemail'];
			
			//update the cart table with user id where his ip address is.
			updateCartWithUser_c($_SESSION['user_id'], $_SERVER['REMOTE_ADDR']);

			//redirection to home page
			header('Location: http://localhost/E-Commerce/HairNow/View/index.php');
			//to make sure the code below does not execute after redirection
			exit();
		} else 
		{
			//echo appropriate error
			$_SESSION['login_err'] ='incorrect username or password';
			
			echo "incorrect password ";
			header('Location: http://localhost/E-Commerce/HairNow/Login/login.php');
		}

	} else{
		//echo appropriate error
		$_SESSION['login_err'] = "incorrect username or password";
		echo "user not found";

		header('Location: http://localhost/E-Commerce/HairNow/Login/login.php');
	}
}

?>