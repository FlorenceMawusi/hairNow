<?php
//start session
session_start();

//import the category controller file
require('../Controllers/product_controller.php');





//check if user is logged in and if user is admin
if(!empty($_SESSION['user_name']) && $_SESSION['user_role'] == 1){
    
    // add category
    //check if form has been submitted
    if (isset($_GET['submit']) && !empty($_GET['cat_name'])){
        
        //capture the category name from the form
        $cat_name = $_GET['cat_name'];

        //check if brand exists
        $existing_cat = checkCatExist_c($cat_name);
        
        if(!$existing_cat){
            //call the add_category function
            $x = addCategory_c($cat_name);

            //return true or false depending on success
            if($x){
                //redirect back to process brand page
                $_SESSION['cat_success'] = 'Category added succesfully!';
                header('Location: http://localhost/E-Commerce/HairNow/Admin/add_category.php');
            }
            else{
                //redirect back to index page
                $_SESSION['cat_err'] = 'Please enter a Category name.';
                header('Location: http://localhost/E-Commerce/HairNow/Admin/add_category.php');
                

            }

        }
        else{
            $_SESSION['cat_err'] = 'Category name already exists.';
            header('Location: http://localhost/E-Commerce/HairNow/Admin/add_category.php');
        }

    }else{
        $_SESSION['cat_err'] = 'Please enter a Category name.';
        header('Location: http://localhost/E-Commerce/HairNow/Admin/add_category.php');        
    
    }

}







?>