<?php
//start session
session_start();

//import the product controller file
require('../Controllers/product_controller.php');





//check if user is logged in and if user is admin
if(!empty($_SESSION['user_name']) && $_SESSION['user_role'] == 1){
    
    //edit brand
    //check if form has been submitted
    if (isset($_POST['edit']) && !empty($_POST['brand_name'])){
    
        //capture the form data
        $brand_name = $_POST['brand_name'];
        $brand_id = $_POST['brand_id'];
        
        //call the add_brand function
        $x = updateBrand_c($brand_id, $brand_name);

        //return true or false depending on success
        if($x){
            //redirect back to index page
            $_SESSION['brand_success'] = 'Brand edited succesfully!';
            header('Location: http://51.105.54.194/E-Commerce/HairNow/Admin/add_brand.php');
        }
        else{
            //redirect back to index page
            $_SESSION['brand_err'] = 'Update Unsucessful.';
            header('Location: http://51.105.54.194/E-Commerce/HairNow/Admin/add_brand.php');
            

        }

    }else{
        $_SESSION['brand_err'] = 'Update Unsuccessful.';
        header('Location: http://51.105.54.194/E-Commerce/HairNow/Admin/add_brand.php');
        
    
    }
}







?>