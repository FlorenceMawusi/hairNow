
<?php
ob_start();
//start session
session_start();

//import the category controller file
require('../controllers/productcontroller.php');
require("../settings/core.php");





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
                header('Location: ../Admin/add_category.php');
            }
            else{
                //redirect back to index page
                $_SESSION['cat_err'] = 'Please enter a Category name.';
                header('Location: ../Admin/add_category.php');
                

            }

        }
        else{
            $_SESSION['cat_err'] = 'Category name already exists.';
            header('Location: ../Admin/add_category.php');
        }

    }else{
        $_SESSION['cat_err'] = 'Please enter a Category name.';
        header('Location: ../Admin/add_category.php');        
    
    }

}

if (isset($_POST['add_category'])) {

    $cat_name = $_POST['cat_name'];
    echo $cat_name;
    $add = addCategory($cat_name);
    if ($add){

        $_SESSION['cat_success'] = 'Successfully added to category';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['cat_error'] = 'Error adding to category';
        header('Location: ../admin/index.php');
    }
}

if (isset($_GET['delete_category_id'])){

//    echo 'working';

    $cat_id = $_GET['delete_category_id'];
    $add = deleteCategory($cat_id);
    if ($add){

        $_SESSION['success'] = 'Category deleted successfully ';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['error'] = 'Error deleting category';
        header('Location: ../admin/index.php');
    }
}

if (isset($_POST['update_category'])){


    $cat_name = $_POST['cat_name'];
    $cat_id = $_POST['cat_id'];

//    echo $cat_name;
//    echo $cat_id;


    $add = updateCategory($cat_name,$cat_id);

    if ($add){

        $_SESSION['success'] = 'Successfully Updated ';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['error'] = 'Error updating brand';
        header('Location: ../admin/index.php');
    }
}
















?>