<?php

  //start session
session_start();

//import the category controller file
require('../Controllers/cart_controller.php');


if(!empty($_SESSION['user_id'])){
    $c_id = $_SESSION['user_id'];
} else{
    $c_id = null;
}

$p_id = $_GET['p_id'];

$ip_add = $_SERVER['REMOTE_ADDR'];

$x = deleteCart_c($c_id, $ip_add,$p_id);

    if(!$x){
        $_SESSION['del_cart_err'] = "Failed to delete.";
        header('Location: http://localhost/E-Commerce/HairNow/View/cart.php');
        
    }else{
        $_SESSION['del_cart_success'] = "Product deleted successfully.";
        header('Location: http://localhost/E-Commerce/HairNow/View/cart.php');
        
    }
?>