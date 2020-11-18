<?php
//start session
session_start();

//import the category controller file
require('../Controllers/cart_controller.php');



    if(checkProdExist_c($_GET['product_id'],$_SESSION['user_id'], $_SERVER['REMOTE_ADDR'] )){
        $_SESSION['cart_err'] = "Oops, product is already in your cart. Go to cart to increase quantity.";
        
        header('Location: ../View/all_product.php');

        return;
    }

    if(empty($_SESSION['user_id'])){
        $c_id = null;
    }else{
        $c_id = $_SESSION['user_id'];
    }

    $p_id = $_GET['product_id'];
    $qty = $_GET['qty'];
    $ip_add = $_SERVER['REMOTE_ADDR'];

    
    $x = addCart_c($p_id, $ip_add,$c_id,$qty);

    if(!$x){
        $_SESSION['cart_err'] = "Add to cart failed";
        header('Location: ../View/all_product.php');
        
    }else{
        $_SESSION['cart_success'] = "Product added succesfully";
        header('Location: ../View/all_product.php');
        
    }

        

?>
