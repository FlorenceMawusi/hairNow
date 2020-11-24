<?php

//import connection file
require_once('../Settings/connection.php');
//require_once('product_class.php');

// inherit the methods from Connection
class Cart extends Connection{


    // addCart
	function addCart($p_id, $ip_add,$c_id,$qty){
		if($c_id == null){
			echo "hello there";
			$query = "insert into shopping_cart
			(product_id, ip_add,quantity)
			values('$p_id', '$ip_add','$qty')";
		} else{
			echo $c_id;
			$query = "insert into shopping_cart
			(product_id, ip_add,customer_id,quantity)
			values('$p_id', '$ip_add','$c_id','$qty')";
		}
		
		// return true or false
		return $this->query($query);
		// echo $this->query($query);

	}

	function updateCartQty($p_id, $ip_add,$c_id,$qty){
		if(!empty($_SESSION['user_id'])){
			$query = "update cart
			set quantity = '$qty'
			where product_id = '$p_id' and customer_id = '$c_id' ";
		} else{
			$query = "update cart
			set quantity = '$qty'
			where product_id = '$p_id' and ip_add = '$ip_add' ";
		}
		
		// return true or false
		return $this->query($query);
	}



    function deleteCart($c_id, $ip_add, $p_id){
		if(!empty($_SESSION['user_id'])){
			$query = "delete from cart where customer_id = '$c_id' and p_id = '$p_id' ";

		} else{
			$query = "delete from cart where ip_add = '$ip_add' and p_id = '$p_id' ";
		}

		// return true or false
		return $this->query($query);

	}


    //checks if a particular cart already exists
	function checkCartExist($p_id, $c_id, $ip_add){

		if(!empty($_SESSION['user_id'])){
			$query = "select * from shopping_cart
			where product_id = '$p_id' and customer_id = '$c_id'";
		} else {
			$query = "select * from shopping_cart
			where product_id = '$p_id' and ip_add = '$ip_add'";
		}
		

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

	function addOrder($user_id, $invoice_no, $order_date, $order_status){
		$query = "insert into orders
        (customer_id, invoice_no, order_date, order_status)
        values('$user_id', '$invoice_no', '$order_date', '$order_status')";

		// return true or false
		return $this->query($query);
	}

	function findOrder($invoice_no){
		$query = "select order_id from orders
		where invoice_no = '$invoice_no'";
		
		// return true or false
		$this->query($query);

		//fetch the values
		return $this->fetch();
	}

	function addPayment($amt, $user_id, $order_id, $currency,$order_date){
		$query = "insert into payment
        (amt, customer_id, order_id, currency, payment_date)
        values('$amt', '$user_id', '$order_id', '$currency','$order_date')";

		// return true or false
		return $this->query($query);
	}

	function deleteUserCart($user_id){
		$query = "delete from cart 
		where c_id = '$user_id'";

		// return true or false
		return $this->query($query);
	}

	function showInvoice(){
		$query = "select products.product_title, payment.amt,";

		// return true or false
		return $this->query($query);
	}
    
}