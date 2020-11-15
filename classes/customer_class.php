<?php
require("../settings/db_class.php");

class customer_class extends db_connection
{
    public   $customer_id = null;
    public  $customer_name = null;

// method to create a customer
// select all customers
// update a customer
// get one customer
// delete a customer

    public function create_customer($a,$b,$c,$d,$e,$f,$g){

    $sql = "INSERT INTO customer(`customer_name`,`customer_email`,`customer_pass`,`customer_country`,`customer_city`,`customer_contact`,`user_role`) VALUES('$a','$b','$c','$d','$e','$f','$g')";
    return $this->db_query($sql);

}

public function all_customers(){
    $sql = "SELECT * FROM customer";
    return $this->db_query($sql);

}


public function update_customer($a,$b,$c,$d,$e,$id){
    $sql = "UPDATE customer
					SET `customer_name`='$a',
						`customer_email`='$b',
						`customer_country`='$c',
						`customer_city`='$d',
						`customer_contact`='$e'
					
					WHERE customer_id='$id'";
    //run the sql execution
    return $this->db_query($sql);
}

public function change_role($id,$role){
        $sql = " UPDATE customer SET `user_role`='$role' WHERE `customer_id`= '$id'";
}

public function getCustomerById($id){
    $sql = " SELECT * FROM customer WHERE customer_id = '$id'";

    return $this->db_query($sql);
}

public function updatePassword($id,$pass){
        $sql = " UPDATE customer 
        SET `customer_pass`='$pass'
 WHERE customer_id = '$id'";

        return $this->db_query($sql);
    }

    public function delete_customer($id){
        $sql = "DELETE FROM customer WHERE customer_id = '$id'";
        return $this->db_query($sql);
    }




}

