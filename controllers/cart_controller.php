<?php

require_once('../Controllers/cart_controller.php');


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

function checkProdExist_c($p_id, $u_id, $ip_add){
    // create an instance of the Cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->checkProdExist($p_id, $u_id, $ip_add);

	if($x != NULL){
		return true;
	}

	return false;
}

function viewCart_c($user_id){
    // create an instance of the cart Class
	$cart_instance = new Cart();

	// call the method from the class
	$x = $cart_instance->viewCart($user_id);

	// create an empty array
	$arr = array();

	if($x){
		// store all the rows into the array
		while($row = $cart_instance->fetch()){
			$arr[] = $row;
		}
	}

	// return the array containing the records
	return $arr;
}