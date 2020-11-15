<?php
//start session
session_start();

//import the category controller file
require('../controllers/cart_controller.php');



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

    
    $x = addItemToCart($p_id, $qty, $ip_add);

    if(!$x){
        $_SESSION['cart_err'] = "Add to cart failed";
        header('Location: ../View/all_product.php');
        
    }else{
        $_SESSION['cart_success'] = "Product added succesfully";
        header('Location: ../View/all_product.php');
        
    }

// cart quantity
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

    $x = updateCartQty($p_id, $ip_add,$c_id,$qty);

    if($x){
        header('Location: ../View/cart.php');
        
    }else{
        $_SESSION['cart_err'] = 'Sorry, update quantity failed';
        header('Location: ../View/cart.php');
        
    }

}

// remove items cart

if(!empty($_SESSION['user_id'])){
    $c_id = $_SESSION['user_id'];
} else{
    $c_id = null;
}

$p_id = $_GET['p_id'];

$ip_add = $_SERVER['REMOTE_ADDR'];

$x = removeItemFromCart($c_id, $ip_add,$p_id);

    if(!$x){
        $_SESSION['del_cart_err'] = "Failed to delete.";
        header('Location: ../View/cart.php');
        
    }else{
        $_SESSION['del_cart_success'] = "Product deleted successfully.";
        header('Location: ../View/cart.php');
        
    }
        
// delete cart

if(!empty($_SESSION['user_id'])){
    $c_id = $_SESSION['user_id'];
} else{
    $c_id = null;
}

$ip_add = $_SERVER['REMOTE_ADDR'];

$x = deleteCart($c_id, $ip_add);

    if(!$x){
        $_SESSION['del_cart_err'] = "Failed to delete.";
        header('Location: ../View/cart.php');
        
    }else{
        $_SESSION['del_cart_success'] = "Product deleted successfully.";
        header('Location: ../View/cart.php');
        
    }

//view cart
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
    // Start PayPal Checkout Button
    $pp_checkout_btn .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="you@youremail.com">';
    // Start the For Each loop
    $i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
        $item_id = $each_item['item_id'];
        $sql = mysql_query("SELECT * FROM products WHERE id='$item_id' LIMIT 1");
        while ($row = mysql_fetch_array($sql)) {
            $product_name = $row["product_name"];
            $price = $row["price"];
            $details = $row["details"];
        }
        $pricetotal = $price * $each_item['quantity'];
        $cartTotal = $pricetotal + $cartTotal;
        setlocale(LC_MONETARY, "en_US");
        $pricetotal = money_format("%10.2n", $pricetotal);
        // Dynamic Checkout Btn Assembly
        $x = $i + 1;
        $pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
        // Create the product array variable
        $product_id_array .= "$item_id-".$each_item['quantity'].","; 
        // Dynamic table row assembly
        $cartOutput .= "<tr>";
        $cartOutput .= '<td><a href="product.php?id=' . $item_id . '">' . $product_name . '</a><br /><img src="inventory_images/' . $item_id . '.jpg" alt="' . $product_name. '" width="40" height="52" border="1" /></td>';
        $cartOutput .= '<td>' . $details . '</td>';
        $cartOutput .= '<td>$' . $price . '</td>';
        $cartOutput .= '<td><form action="cart.php" method="post">
        <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
        <input name="adjustBtn' . $item_id . '" type="submit" value="change" />
        <input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
        </form></td>';
        //$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
        $cartOutput .= '<td>' . $pricetotal . '</td>';
        $cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
        $cartOutput .= '</tr>';
        $i++; 
    } 
    setlocale(LC_MONETARY, "en_US");
    $cartTotal = money_format("%10.2n", $cartTotal);
    $cartTotal = "<div style='font-size:18px; margin-top:12px;' align='right'>Cart Total : ".$cartTotal." USD</div>";
    // Finish the Paypal Checkout Btn
    $pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
    <input type="hidden" name="notify_url" value="https://www.yoursite.com/storescripts/my_ipn.php">
    <input type="hidden" name="return" value="https://www.yoursite.com/checkout_complete.php">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="cbt" value="Return to The Store">
    <input type="hidden" name="cancel_return" value="https://www.yoursite.com/paypal_cancel.php">
    <input type="hidden" name="lc" value="US">
    <input type="hidden" name="currency_code" value="USD">
    <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
    </form>';
}
?>
        
