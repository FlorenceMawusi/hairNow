<?php


//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require("../Controllers/customer_controller.php");



//check if login button was clicked 
if (isset($_POST['submit'])) {
	


	//check if email exist
	$getDetails = getCustomerDetails_c($_POST['cemail']);
	
	if ($getDetails) {
		//email exist, continue to password
		//get password from database

		
		$hash = $getDetails['customer_password'];
		echo $hash;
		$working = password_verify($_POST['cpass'], `$hash`);
		echo 'working',$working;

		//verify password

		if (password_verify($_POST['cpass'], $hash)) {
			
		
			//set session
			$_SESSION["user_id"] = $getDetails['customer_id'];
			$_SESSION["user_role"] = $getDetails['user_role'];
			$_SESSION["user_name"] = $getDetails['customer_name'];
			
			echo "success";
			//redirection to home page
			//header('Location: ../index.php');
			//to make sure the code below does not execute after redirection
			exit();
		} else 
		{
			//echo appropriate error
			$_SESSION['login_err'] ='incorrect username or password';
			echo "incorrect password ";
			//header('Location: login.php');
		}

	} else{
		//echo appropriate error
		$_SESSION['login_err'] = "incorrect username or password";
		echo "user not found";

		//header('Location: login.php');
	}
}

?>