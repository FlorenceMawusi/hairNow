<?php
//connect to database class
require("../settings/db_class.php");

/**
 *Login class to handle everything login related
 */

class login_class extends db_connection
{
    /**
     *method to verify login
     *takes email, password
     */
    public function emailExist($email)
    {
        $sql = " SELECT  `email` FROM customer WHERE `customer_email` = '$email'";

        return $this->db_query($sql);

    }



    public function register_user($a, $b, $c,$d,$e,$f,$g){
        //a query to get all login information base on email
        $sql = "INSERT INTO customer(customer_name,customer_email, customer_pass, customer_country, customer_city, customer_contact,user_role) VALUES ('$a', '$b', '$c','$d','$e','$f','$g')";
        //execute the query and return boolean
        return $this->db_query($sql);
    }


    public function login_user($a){
        //a query to get all login information base on email
        $sql = "SELECT * FROM customer WHERE customer_email='$a'";
        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function login_admin($a){
        //a query to get all login information base on email
        $sql = "SELECT * FROM customer WHERE customer_email='$a'";
        //execute the query and return boolean
        return $this->db_query($sql);
    }
}
?>