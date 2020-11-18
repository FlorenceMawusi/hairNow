<?php

//start session
session_start();

//connnect to the controller
require("../Controllers/customer_controller.php");



//check if register button was clicked 
if (isset($_POST['submit'])) {
	
	//validate and grab inputs
	if(empty(trim($_POST["cname"]))){
		$fullname_err = "Please enter your Fullname.";
		
	}else{
		$fullname_err = "";
		//captur/ take the form input
		$rname = $_POST['cname'];
	}
	$_SESSION['fullname_err'] = $fullname_err;	

	if(empty(trim($_POST["cemail"]))){
		$email_err = "Please enter your email.";
	}else{
		//check if email already exists and alert user to change email
		
		$validateEmail = checkEmail_c($_POST['cemail']);
		if($validateEmail == true){
			$email_err = "Email already exist, please change";
		}else{
			$email_err = "";
			$remail = $_POST['cemail'];
		}
	}
	$_SESSION['email_err'] = $email_err;	

	//validate password
	if(empty(trim($_POST["cpass"]))){
		$password_err = "Please enter your password.";
	}else{
		$password_err = "";
		$rpass = $_POST['cpass'];
	}
	$_SESSION['password_err'] = $password_err;	

	if(empty(trim($_POST["ccountry"]))){
		$country_err = "Please enter your country.";
	}else{
		$country_err = "";
		$rcountry = $_POST['ccountry'];
	}
	$_SESSION['country_err'] = $country_err;	


	if(empty(trim($_POST["ccity"]))){
		$city_err = "Please enter your city.";
	}else{
		$city_err = "";
		$rcity = $_POST['ccity'];
	}
	$_SESSION['city_err'] = $city_err;	

	if(empty(trim($_POST["ccontact"]))){
		$contact_err = "Please enter your contact.";
	}else{
		$contact_err = "";
		$rcontact = $_POST['ccontact'];
	}
	$_SESSION['contact_err'] = $contact_err;	

	//Check for errors
	if (empty(trim($fullname_err)) && empty(trim($email_err)) && empty(trim($password_err)) 
	&& empty(trim($country_err)) && empty(trim($city_err)) && empty(trim($contact_err))) {
		//encrypt password
		$hash = password_hash($rpass, PASSWORD_DEFAULT);

		//insert into the controller
		$x = addCustomer_c($rname, $remail, $hash, $rcountry, $rcity, $rcontact);
		// if it returns true 
		if($x){
			echo "inserted successfully";

			//redirect to login page
			header("Location: http://localhost/E-Commerce/Lab/Login/login.php");
			exit();
		}
		else{
			echo "insertion failed";
		}

	}else {
		//redirect back to register page.
		header("Location: http://localhost/E-Commerce/Lab/Login/register.php");
		exit();
	}
	
	
	


}

?>