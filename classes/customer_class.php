<?php

require('../Settings/connection.php');

// inherit the methods from Connection
class Customer extends Connection{


    function addCustomer($name, $email, $pass, $address, $country, $city, $contact){

        $query = "insert into customer_registry(customer_name, customer_email, customer_password, c_address, c_country, c_city, c_contact, user_role ) 
		values('$name', '$email', '$pass', '$address', '$country', '$city','$contact', 2)";
		
		// return true or false
		return $this->query($query);

	}


	function deleteCustomer($id){

		$query = "delete from customer_registry where customerID = '$id'";

		// return true or false
		return $this->query($query);

	}


	function updateCustomer($name, $email, $pass, $address, $country, $city, $contact,$id){

        $query = "update customer_registry 
        set customer_name = '$name', customer_email = '$email', customer_password = '$pass', c_address = '$address', 
        c_country = '$country', c_city = '$city', c_contact = '$contact'
        where customerID = '$id'";

		// return true or false
        return $this->query($query);
        

	}

	function checkEmail($email){
		$query = "select * from customer_registry
		where customer_email = '$email'";

		$this->query($query);
		return $this->fetch();
	}

	function login($email, $pass){
		$query = "select *  from customer_registry
		where customer_email = '$email' and customer_password = '$pass'";
		
		$this->query($query);

		return $this->fetch();

	}



}	


?>