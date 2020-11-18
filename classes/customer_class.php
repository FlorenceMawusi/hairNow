<?php

require('../Settings/connection.php');

// inherit the methods from Connection
class Customer extends Connection{


    function addCustomer($name, $email, $pass, $country, $city, $contact){

        $query = "insert into customer(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, user_role ) 
		values('$name', '$email', '$pass', '$country', '$city', '$contact', 2)";
		
		// return true or false
		return $this->query($query);

	}


	function deleteCustomer($id){

		$query = "delete from customer where customer_id = '$id'";

		// return true or false
		return $this->query($query);

	}


	function updateCustomer($name, $email, $pass, $country, $city, $contact, $id){

        $query = "update customer 
        set customer_name = '$name', customer_email = '$email', customer_pass = '$pass', 
        customer_country = '$country', customer_city = '$city', customer_contact = '$contact'
        where customer_id = '$id'";

		// return true or false
        return $this->query($query);
        

	}

	function checkEmail($email){
		$query = "select * from customer
		where customer_email = '$email'";

		$this->query($query);
		return $this->fetch();
	}

	function login($email, $pass){
		$query = "select * customer
		where customer_email = '$email' and customer_pass = '$pass'";
		
		$this->query($query);

		return $this->fetch();

	}



}	


?>