<?php
//start session
session_start();

//import the product controller file
require('../Controllers/product_controller.php');





//check if user is logged in and if user is admin
if(!empty($_SESSION['user_name']) && $_SESSION['user_role'] == 1){
    
    // add brand
    //check if form has been submitted
    if (isset($_GET['submit']) && !empty($_GET['brand_name'])){
        
        //capture the brand name from the form
        $brand_name = $_GET['brand_name'];

        //check if brand exists
        $existing_brand = checkBrandExist_c($brand_name);
        
        if(!$existing_brand){
            //call the add_brand function
            $x = addBrand_c($brand_name);

            //return true or false depending on success
            if($x){
                //redirect back to process brand page
                $_SESSION['brand_success'] = 'Brand added succesfully!';
                header('Location: ../Admin/add_brand.php');
            }
            else{
                //redirect back to index page
                $_SESSION['brand_err'] = 'Please enter a brand name.';
                header('Location: ../Admin/add_brand.php');
                

            }

        }
        else{
            $_SESSION['brand_err'] = 'Brand name already exists.';
            header('Location: ../Admin/add_brand.php');
        }

    }else{
        $_SESSION['brand_err'] = 'Please enter a brand name.';
        header('Location: ../Admin/add_brand.php');
        
    
    }

}







?>