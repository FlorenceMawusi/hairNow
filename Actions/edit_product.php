<?php
//start session
session_start();

//import the category Product file
require('../Controllers/product_controller.php');





//check if user is logged in 
if(!empty($_SESSION['user_name'])){
    
    // add product
    //check if form has been submitted
    if (isset($_POST['edit'])){
        
        //capture the category name from the form
        $product_id = $_POST['product_id'];
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_desc = $_POST['product_desc'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $image = basename($_FILES["product_image"]["name"]);
        
        
        
        if(!empty($image)){
            //processing the product image
            $target_dir = "../Images/Product/";
            $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
        
        }else{
            $target_file = "";
        }
        
        
        //call the edit_product function 
        $x = updateProduct_c($product_id,$product_cat, $product_brand, $product_title, 
        $product_price, $product_desc, $target_file, $product_keywords);

        //return true or false depending on success
        if($x){
            //redirect back to process brand page
            $_SESSION['product_success'] = 'Product edited succesfully!';
            header('Location: http://localhost/E-Commerce/HairNow/View');
        }
        else{
            //redirect back to index page
            $_SESSION['product_err'] = 'Update failed.';
            header('Location: http://localhost/E-Commerce/HairNow/View/add_product.php');
            

        }

        

    }

}







?>