<?php


require("../settings/db_class.php");

// require __DIR__.'./settings/db_class.php';


class ShoppingCart extends db_connection
{

	function getCartItems($ip_address){
		$sql = "SELECT p.product_id, p.product_cat, p.product_brand, p.product_price, p.product_title, p.product_desc, p.product_image, p.product_keywords, c.p_id, c.ip_add, c.qty FROM products AS p JOIN cart AS c ON p.product_id = c.p_id AND c.ip_add = '$ip_address'";
		return $this->db_query($sql);
	}
	function getCartItemQty($ip_address){
		$sql = "SELECT * FROM cart WHERE ip_add='$ip_address'";
		return $this->db_query($sql);
	}

	function getCartItemsAmount($ip_address){
		$sql = "SELECT SUM(product_price * qty) AS amount FROM products AS p JOIN cart AS c ON p.product_id = c.p_id AND c.ip_add = '$ip_address'";
		return $this->db_query($sql);
	}

	function addToCart($prod_id, $ip_adr, $qty){
		 $sql = "INSERT INTO cart(p_id, ip_add, qty) VALUES('$prod_id','$ip_adr','$qty')";
        return $this->db_query($sql);
	}

	function validateCart($ip_address, $prod_id){
		$sql = "SELECT * FROM `cart` WHERE `ip_add`='$ip_address' AND `p_id`='$prod_id'";
		return $this->db_query($sql);
	}

	function removeCartItem($prod_id, $ip_address){
		$sql = "DELETE FROM cart WHERE ip_add='$ip_address' AND p_id='$prod_id'";
		return $this->db_query($sql);
	}
	function updateCartQuantity($prod_id, $qty, $ip_address){
		$sql = "UPDATE cart SET qty='$qty' WHERE ip_add='$ip_address' AND p_id='$prod_id'";
		return $this->db_query($sql);
	}

	function deletecart($ip_address){
		$sql="DELETE FROM cart WHERE ip_add='$ip_address'";
		return $this->db_query($sql);

	}
	function insertorders($user_id, $prod_id, $qty, $invoice, $status){
		$sql="INSERT INTO orders (customer_id, product_id, qty, invoice_no, status, order_date) VALUES ('$user_id', '$prod_id','$qty', '$invoice', '$status', NOW())";
		return $this->db_query($sql);
	}

	function insertpayment($amount,$user_id,$cc){
		$sql="INSERT INTO payment(amt,customer_id,currency, payment_date) VALUES ('$amount','$user_id','$cc', NOW())";
		return $this->db_query($sql);
	}
}
?>