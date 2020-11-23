<?php

//import connection file
require_once('../Settings/connection.php');
//require_once('product_class.php');

// inherit the methods from Connection
class Cart extends Connection{


    // addCart
	function addCart($p_id, $c_id, $ip_add, $qty){
		if($c_id == null){
			$query = "insert into shopping_cart
			(product_id, ip_add, quantity)
			values('$p_id', '$ip_add','$qty')";
		} else{
			$query = "insert into shopping_cart
			(product_id, customer_id, ip_add, quantity)
			values('$p_id', '$c_id', '$ip_add','$qty')";
		}
		
		// return true or false
		return $this->query($query);
		// echo $this->query($query);

	}

	function updateCartQty($p_id, $c_id, $ip_add,$qty){
		if(!empty($_SESSION['user_id'])){
			$query = "update shopping_cart
			set quantity = '$qty'
			where product_id = '$p_id' and customer_id = '$c_id' ";
		} else{
			$query = "update shopping_cart
			set quantity = '$qty'
			where product_id = '$p_id' and ip_add = '$ip_add' ";
		}
		
		// return true or false
		return $this->query($query);
	}



    function deleteCart($c_id, $ip_add, $p_id){
		if(!empty($_SESSION['user_id'])){
			$query = "delete from shopping_cart where customer_id = '$c_id' and product_id = '$p_id' ";

		} else{
			$query = "delete from shopping_cart where ip_add = '$ip_add' and product_id = '$p_id' ";
		}

		// return true or false
		return $this->query($query);

	}


    //checks if a particular cart already exists
	function checkProdExist($p_id, $c_id, $ip_add){

		$query = "select * from shopping_cart
		where product_id = '$p_id' and customer_id = '$c_id' 
		or product_id = '$p_id' and ip_add = '$ip_add'";
		

		// return true or false
		$this->query($query);

		//fetch the values
		return $this->fetch();
		

    }
    
    //view all hairhairproducts in cart according to customer
	function viewCart($u_id){

		if(!empty($_SESSION['user_id'])){
			$query = "select hairproducts.productname, hairproducts.productprice,
			hairproducts.productdescription, hairproducts.productimage, 
			shopping_cart.product_id, shopping_cart.customer_id, shopping_cart.ip_add, shopping_cart.quantity from shopping_cart, hairproducts 
			where shopping_cart.customer_id = '$u_id' and hairproducts.productID = shopping_cart.product_id";
		} else {
			$query = "select hairproducts.productname, hairproducts.productprice,
			hairproducts.productdescription, hairproducts.productimage, 
			shopping_cart.product_id, shopping_cart.customer_id, shopping_cart.ip_add, shopping_cart.quantity from shopping_cart, hairproducts 
			where shopping_cart.ip_add = '$u_id' and hairproducts.productID = shopping_cart.p_id";
		}
		

		// return true or false
        $this->query($query);
        
        //return the fetched values
        return $this->fetch();

	}
    
}