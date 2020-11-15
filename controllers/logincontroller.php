<?php
//connect to the login class
require("../classes/loginclass.php");
require_once ('../settings/core.php');
//require("../classes/customer_class.php");

//function to get login information - takes email
function login_user($email){
    $login_array = array();
    $login_object = new login_class();
    $login_record = $login_object->login_user($email);
    if ($login_record) {
        $one_record = $login_object->db_fetch();
        $login_array[] = $one_record;
    }
    return $login_array;
}



function login_admin($email){
    $login_array = array();
    $login_object = new login_class();
    $login_record = $login_object->login_admin($email);
    if ($login_record) {
        $one_record = $login_object->db_fetch();
        $login_array[] = $one_record;
    }
    return $login_array;
}

function register_user($a, $b, $c,$d,$e,$f,$g){
//    create an instance of the login_class
    $new_object = new login_class();
    //run the register user method
    $create_user = $new_object->register_user($a, $b, $c,$d,$e,$f,$g);
    //check if method worked
     return $create_user = $create_user ?: false;


}



function register_admin($a, $b, $c,$d,$e,$f,$g){
//    create an instance of the login_class
    $new_object = new login_class();
    //run the register user method
    $create_user = $new_object->register_user($a, $b, $c,$d,$e,$f,$g);
    //check if method worked
    return $create_user = $create_user ?: false;


}
function emailExist($email){

    $result_array = array();
    $new_object = new login_class();
    $check = $new_object->emailExist($email);


    //check if the method worked
    if ($check) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $new_object->db_fetch()) {

            //Assign each result to the array
            $result_array[] = $one_record;
        }
    }
    //return the array
    return $result_array;

}



?>