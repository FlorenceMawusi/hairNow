<?php
//for header redirection
ob_start();

//start session - needed to capture login information
session_start();

//connnect to the controller
require("../controllers/logincontroller.php");

if (isset($_POST['register_user'])){


// Get form data
    $customer_email = $_POST['customer_email'];
    $customer_name = $_POST['customer_name'];
    $customer_country = $_POST['customer_country'];
    $customer_contact = $_POST['customer_contact'];
    $customer_city = $_POST['customer_city'];
    $customer_pass = $_POST['customer_pass'];
    $user_role = $_POST['user_role'];



//    $check_email = emailExist($customer_email);
//    if ($check_email){
//        header('Location: register.php');
//        $_SESSION['email-exist'] = 'Email Already exist!!';
//    }


    $hash = password_hash($customer_pass, PASSWORD_DEFAULT);
//	check if email exist
    $register = register_user($customer_name, $customer_email, $hash,$customer_country,$customer_city,$customer_contact,$user_role);
    if ($register) {

        header('Location: login.php');
        $_SESSION['register-success'] = 'Account created successfully';
    }else{
        //echo failure
//		echo "error";
        header('Location: register.php');
        $_SESSION['register-error'] = 'Error creating account';




    }

}



if (isset($_POST['register_admin'])){


// Get form data
    $customer_email = $_POST['customer_email'];
    $customer_name = $_POST['customer_name'];
    $customer_country = $_POST['customer_country'];
    $customer_contact = $_POST['customer_contact'];
    $customer_city = $_POST['customer_city'];
    $customer_pass = $_POST['customer_pass'];
    $user_role = $_POST['user_role'];



//    $check_email = emailExist($customer_email);
//    if ($check_email){
//        header('Location: register.php');
//        $_SESSION['email-exist'] = 'Email Already exist!!';
//    }


    $hash = password_hash($customer_pass, PASSWORD_DEFAULT);
//	check if email exist
    $register = register_admin($customer_name, $customer_email, $hash,$customer_country,$customer_city,$customer_contact,$user_role);
    if ($register) {

        header('Location: login_admin.php');
        $_SESSION['register-success'] = 'Account created successfully';
    }else{
        //echo failure
//		echo "error";
        header('Location: register.php');
        $_SESSION['register-error'] = 'Error creating account';




    }

}