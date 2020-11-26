<?php
//start session
session_start();

//import the category controller file
require('../Controllers/cart_controller.php');


if(isset($_GET['reference'])){

    //save transaction in order table (for invoice use php_mt-rand)
    $user_id = $_SESSION['user_id'];
    $invoice_no = mt_rand();
    $order_date = date("Y/m/d");
    $order_status = 'in progress';
    $amt = $_GET['amount'];
    $currency = "GHC";

    $save_order = addOrder_c($user_id, $invoice_no, $order_date, $order_status);
    $order = findOrder_c($invoice_no);
    $order_id = $order['orderID'];

    if($save_order){
        //save payment details in payment table
        $addPayment = addPayment_c($invoice_no, $amt, $user_id, $order_id,$currency, $order_date);
        
        
        //addOrderDetails($);
        

        if($addPayment){
            echo "payment added";
            // redirect to payment_success.php
            header('Location: http://localhost/E-Commerce/HairNow/View/payment_success.php?invoice_no='.$invoice_no);


        } else {
            echo "delete unsuccessful";
        }

       // header('Location: http://localhost/E-Commerce/Lab/View/payment_failed.php');


    } else {

    }
 
} else {
    echo"failed, no reference";

    //redirect to payment_failed.php
    header('Location: http://localhost/E-Commerce/HairNow/View/payment_failed.php');

}

        

?>
