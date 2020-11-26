<?php
//start session
session_start();

//import the category controller file
require('../Controllers/product_controller.php');





//check if user is logged in and if user is admin
if(!empty($_SESSION['user_name']) && $_SESSION['user_role'] == 1){
    
    //edit category
    //check if form has been submitted
    if (isset($_POST['edit']) && !empty($_POST['cat_name'])){
    
        //capture the form data
        $cat_name = $_POST['cat_name'];
        $cat_id = $_POST['cat_id'];
        
        //call the update category function
        $x = updateCategory_c($cat_id, $cat_name);

        //return true or false depending on success
        if($x){
            //redirect back to index page
            $_SESSION['cat_success'] = 'Category edited succesfully!';
            header('Location: http://localhost/E-Commerce/HairNow/Admin/add_category.php');
        }
        else{
            //redirect back to index page
            $_SESSION['cat_err'] = 'Update Unsucessful.';
            header('Location: http://localhost/E-Commerce/HairNow/Admin/add_category.php');
            

        }

    }else{
        $_SESSION['cat_err'] = 'Update Unsuccessful.';
        header('Location: http://localhost/E-Commerce/HairNow/Admin/add_category.php');
        
    
    }
}







?>