<?php

//import connection file
require_once('../Settings/connection.php');
//require_once('product_class.php');

// inherit the methods from Connection
class Cart extends Connection{


    // addCart
	function addCart($p_id, $ip_add,$c_id,$qty){
		if($c_id == null){
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
			$query = "update shopping_cart
			set quantity = '$qty'
			where (product_id = '$p_id' and customer_id = '$c_id')
			AND (product_id = '$p_id' and ip_add = '$ip_add') ";
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
			$query = "delete from shopping_cart where (customer_id = '$c_id' and product_id = '$p_id')
			AND (ip_add = '$ip_add' and product_id = '$p_id') ";

		} else{
			$query = "delete from shopping_cart where ip_add = '$ip_add' and product_id = '$p_id' ";
		}

		// return true or false
		return $this->query($query);

	}


    //checks if a particular cart already exists
	function checkCartExist($p_id, $c_id, $ip_add){

		if(!empty($_SESSION['user_id'])){
			$query = "select * from shopping_cart
			where (product_id = '$p_id' and customer_id = '$c_id')
			AND (product_id = '$p_id' and ip_add = '$ip_add')";
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
	function viewCart($u_id, $ip_add){

		if(!empty($_SESSION['user_id'])){
			$query = "select hairproducts.productname, hairproducts.productprice,
			hairproducts.productdescription, hairproducts.productimage, 
			shopping_cart.product_id, shopping_cart.customer_id, shopping_cart.ip_add, shopping_cart.quantity from shopping_cart, hairproducts 
			where shopping_cart.customer_id = '$u_id' AND hairproducts.productID = shopping_cart.product_id
			";
		} else {
			$query = "select hairproducts.productname, hairproducts.productprice,
			hairproducts.productdescription, hairproducts.productimage, 
			shopping_cart.product_id, shopping_cart.customer_id, shopping_cart.ip_add, shopping_cart.quantity from shopping_cart, hairproducts 
			where shopping_cart.ip_add = '$ip_add' and hairproducts.productID = shopping_cart.product_id";
		}
		

		// return true or false
        $this->query($query);
        
        //return the fetched values
        return $this->fetch();

	}

	function updateCartWithUser($u_id, $ip_add){
		
		$query = "update shopping_cart
		set customer_id = '$u_id'
		where ip_add = '$ip_add' ";
        

		// return true or false
		return $this->query($query);

	}

	function addOrder($user_id, $invoice_no, $order_date, $order_status){
		$query = "insert into productorders
        (customer_ID, invoice_no, order_date, order_status)
        values('$user_id', '$invoice_no', '$order_date', '$order_status')";

		// return true or false
		return $this->query($query);
	}

	function findOrder($invoice_no){
		$query = "select orderID from productorders
		where invoice_no = '$invoice_no'";
		
		// return true or false
		$this->query($query);

		//fetch the values
		return $this->fetch();
	}

	function addPayment($invoice_no,$amt, $user_id, $order_id, $currency,$order_date){
		$query = "insert into orderpayments
        (invoice_number,amount, customerID, orderid, currency, payment_date)
        values('$invoice_no','$amt', '$user_id', '$order_id', '$currency','$order_date')";

		// return true or false
		return $this->query($query);
	}

	function deleteUserCart($user_id){
		$query = "delete from shopping_cart 
		where customer_id = '$user_id'";

		// return true or false
		return $this->query($query);
	}

	function showInvoice(){
		$query = "select products.product_title, payment.amt,";

		// return true or false
		return $this->query($query);
	}
    
}