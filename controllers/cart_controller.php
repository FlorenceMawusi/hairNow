<?php

require_once('../Classes/cart_class.php');


function addCart_c($p_id, $ip_add,$c_id,$qty){

	// create an instance of the Cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->addCart($p_id, $ip_add,$c_id,$qty);

	if($x){
		return true;
	}

	return false;

}

function updateCartQty_c($p_id, $ip_add,$c_id,$qty){

	// create an instance of the Cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->updateCartQty($p_id, $ip_add,$c_id,$qty);

	if($x){
		return true;
	}

	return false;

}

function deleteCart_c($c_id, $ip_add, $p_id){

	// create an instance of the Cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->deleteCart($c_id, $ip_add, $p_id);

	if($x){
		return true;
	}

	return false;
	
}

function checkCartExist_c($p_id, $u_id, $ip_add){
    // create an instance of the Cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->checkCartExist($p_id, $u_id, $ip_add);

	if($x != NULL){
		return true;
	}

	return false;
}

function updateCartWithUser_c($u_id, $ip_add){
	// create an instance of the Cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->updateCartWithUser($u_id, $ip_add);

	if($x != NULL){
		return true;
	}

	return false;
}

function viewCart_c($user_id, $ip_add){
    // create an instance of the cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->viewCart($user_id, $ip_add);

	// create an empty array
	$arr = array();

	if($x){
		$arr = array($x);
		// store all the rows into the array
		while($row = $cart_instance->fetch()){
			$arr[] = $row;
		}
	}
	// return the array containing the records
	return $arr;
}

function addOrder_c($user_id, $invoice_no, $order_date, $order_status){

	// create an instance of the cart Class
	$order_instance = new Cart();

	// call the method from the class
	$x = $order_instance->addOrder($user_id, $invoice_no, $order_date, $order_status);

	if($x){
		return true;
	}

	return false;

}

function findOrder_c($invoice_no){
	// create an instance of the cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->findOrder($invoice_no);

	return $x;
}

function addPayment_c($invoice_no, $amt, $user_id, $order_id,$currency, $order_date){
	
	// create an instance of the cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->addPayment($invoice_no, $amt, $user_id, $order_id,$currency, $order_date);

	if($x){
		return true;
	}

	return false;


}


function deleteUserCart_c($id){
		// create an instance of the Brand Class
		$cart_instance = new Cart();

		// call the method from the class
		$x = $cart_instance->deleteUserCart($id);
	
		if($x){
			return true;
		}
	
		return false;
}