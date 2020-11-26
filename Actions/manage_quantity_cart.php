<?php

session_start();
//import the category controller file
require('../Controllers/cart_controller.php');


if(isset($_POST['cartqty']) && isset($_POST['p_id'])){
   
    if(!empty($_SESSION['user_id'])){
        $c_id = $_SESSION['user_id'];
    } else{
        $c_id = null;
    }

    $qty = $_POST['cartqty'];
    echo $qty;
    $p_id = $_POST['p_id'];
    $ip_add = $_SERVER['REMOTE_ADDR'];

    $x = updateCartQty_c($p_id, $ip_add,$c_id,$qty);

    if($x){
        header('Location: http://localhost/E-Commerce/HairNow/View/cart.php');
        
    }else{
        $_SESSION['cart_err'] = 'Sorry, update quantity failed';
        header('Location: http://localhost/E-Commerce/HairNow/View/cart.php');
        
    }

}

?> 