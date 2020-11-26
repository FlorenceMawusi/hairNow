<?php
//start session
session_start();

//import the category Product file
require('../Controllers/product_controller.php');





//check if user is logged in 
if(!empty($_SESSION['user_name'])){
    
    // add product
    //check if form has been submitted
    if (isset($_POST['submit'])){
        
        //capture the category name from the form
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_desc = $_POST['product_desc'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];

        //check if product exists
        $existing_prod = checkProdExist_c($product_title);
        
        if(!$existing_prod){

            //processing the product image
            $target_dir = "../img/products/";
            $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
            
            //call the add_product function
            $x = addProduct_c($product_title, $product_cat, $product_brand, 
            $product_desc, $product_price, $target_file, $product_keywords);

            //return true or false depending on success
            if($x){
                //redirect back to process brand page
                $_SESSION['product_success'] = 'Product added succesfully!';
                header('Location: http://localhost/E-Commerce/HairNow/Admin/add_product.php');
            }
            else{
                //redirect back to index page
                $_SESSION['product_err'] = 'Insertion failed.';
                header('Location: http://localhost/E-Commerce/HairNow/Admin/add_product.php');
                

            }

        }
        else{
            $_SESSION['product_err'] = 'Product already exists.';
            header('Location: http://localhost/E-Commerce/HairNow/Admin/add_product.php');
        }

    }

}







?>