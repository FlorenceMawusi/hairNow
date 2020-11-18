<?php

//import connection file
require('../Settings/connection.php');
//require_once('product_class.php');

// inherit the methods from Connection
class Cart extends Connection{


    // addCart
	function addCart($p_id, $ip_add,$c_id,$qty){
		if($c_id == null){
			$query = "insert into cart
			(p_id, ip_add,qty)
			values('$p_id', '$ip_add','$qty')";
		} else{
			$query = "insert into cart
			(p_id, ip_add,c_id,qty)
			values('$p_id', '$ip_add','$c_id','$qty')";
		}
		
		// return true or false
		return $this->query($query);
		// echo $this->query($query);

	}

	function updateCartQty($p_id, $ip_add,$c_id,$qty){
		if(!empty($_SESSION['user_id'])){
			$query = "update cart
			set qty = '$qty'
			where p_id = '$p_id' and c_id = '$c_id' ";
		} else{
			$query = "update cart
			set qty = '$qty'
			where p_id = '$p_id' and ip_add = '$ip_add' ";
		}
		
		// return true or false
		return $this->query($query);
	}



    function deleteCart($c_id, $ip_add, $p_id){
		if(!empty($_SESSION['user_id'])){
			$query = "delete from cart where c_id = '$c_id' and p_id = '$p_id' ";

		} else{
			$query = "delete from cart where ip_add = '$ip_add' and p_id = '$p_id' ";
		}

		// return true or false
		return $this->query($query);

	}


    //checks if a particular cart already exists
	function checkProdExist($p_id, $c_id, $ip_add){

		$query = "select * from cart
		where p_id = '$p_id' and c_id = '$c_id' 
		or p_id = '$p_id' and ip_add = '$ip_add'";
		

		// return true or false
		$this->query($query);

		//fetch the values
		return $this->fetch();
		

    }
    
    //view all products in cart according to customer
	function viewCart($u_id){

		if(!empty($_SESSION['user_id'])){
			$query = "select products.product_title, products.product_price,
			products.product_desc, products.product_image, 
			cart.p_id, cart.c_id, cart.ip_add, cart.qty from cart, products 
			where cart.c_id = '$u_id' and products.product_id = cart.p_id";
		} else {
			$query = "select products.product_title, products.product_price,
			products.product_desc, products.product_image, 
			cart.p_id, cart.c_id, cart.ip_add, cart.qty from cart, products 
			where cart.ip_add = '$u_id' and products.product_id = cart.p_id";
		}
		

		// return true or false
        $this->query($query);
        
        //return the fetched values
        return $this->fetch();

	}
    
}