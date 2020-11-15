<?php
require("../classes/customer_class.php");


function createCustomer($aa,$bb,$cc,$dd,$ee,$ff,$gg){

    $customer = new customer_class();
    $cus_check = $customer->create_customer($aa,$bb,$cc,$dd,$ee,$ff,$gg);
    return  $cus_check = $cus_check ?: false;
}


function allCustomers(){
    $customer = new customer_class();
    $cus_check = $customer->all_customers();
    return  $cus_check = $cus_check ?: false;

}

function updateCustomer($a,$b,$c,$d,$e,$id){
    $customer = new customer_class();
    $cus_check = $customer->update_customer($a,$b,$c,$d,$e,$id);
    return  $cus_check = $cus_check ?: false;

}


function deleteCustomer($id){
    $customer = new customer_class();
    $cus_check = $customer->delete_customer($id);
   return  $cus_check = $cus_check ?: false;


}

function selectOneCustomer($id){
    $customer = new customer_class();
    $cus_check = $customer->getCustomerById($id);
    return  $cus_check = $cus_check ?: false;

}
