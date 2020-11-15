<?php


//for header redirection
ob_start();

//start session - needed to capture login information
//session_start();

//connnect to the controller
require("../controllers/logincontroller.php");

require_once ('../settings/core.php');
//check if login button was clicked
if (isset($_POST['login_user'])){
    //grab form details
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $check_login = login_user($customer_email);
    $role = $check_login[0]['user_role'];

    if ($check_login) {
        //email exist, continue to password
        //get password from database
        $hash = $check_login[0]['customer_pass'];

        if (password_verify($customer_pass, $hash))
        {
            //create session for id, role and name
            $_SESSION["user_id"] = $check_login[0]['customer_id'];
            $_SESSION["user_role"] = $check_login[0]['user_role'];
            $_SESSION["customer_name"] = $check_login[0]['customer_name'];

            //redirection to home page
            header('Location: ../index.php');

            //to make sure the code below does not execute after redirection use exit
            exit;
        } else
        {
            //echo appropriate error

            header('Location: login.php');
        }

    } else{
        //echo appropriate error
        echo "incorrect username or password";
    }
}


if (isset($_POST['login_admin'])){
    //grab form details
    $customer_email = $_POST['admin_email'];
    $customer_pass = $_POST['admin_pass'];
//    echo $customer_email;
//    echo $customer_pass;
//
//    exit;
    $check_login = login_admin($customer_email);
//    print_r($check_login); ----- passed
//    exit;
//    print_r($check_login);
    $role = isset($check_login[0]['user_role']) ?$check_login[0]['user_role'] : null ;

//    echo $role;
//    exit;


    if ( $role == 1) {
        //email exist, continue to password
        //get password from database
        $hash = $check_login[0]['customer_pass'];


        if (password_verify($customer_pass, $hash)) {
            //create session for id, role and name
            $_SESSION["admin_id"] = $check_login[0]['customer_id'];
            $_SESSION["admin_role"] = $check_login[0]['user_role'];
            $_SESSION["admin_name"] = $check_login[0]['customer_name'];

            //redirection to home page
            header('Location: ../admin/index.php');
            exit;
        }else{
                header('Location: login_admin.php');
            }



            //to make sure the code below does not execute after redirection use exit

        }
}