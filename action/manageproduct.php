<?php
ob_start();
session_start();
require ('../controllers/productcontroller.php');
require("../settings/core.php");





/*
|--------------------------------------------------------------------------
| Product Processing
|--------------------------------------------------------------------------
|
| TThis file handles product upload from the admin side
|
*/

function uploadImage(){
    //the directory/path of the image
    $folderName = "../admin/images/uploads/";
    //fileName: a variable with the folder name and the name of the image
    //fileToUpload: is the name of the input in the form
    //name: specifies the name of the file that is being uploaded
    //concatenate (join) the foldername and the file name
    $fileName1 = $folderName . basename($_FILES["prod_img"]["name"]);
    //set a variable 'uploadOk' and make it equal to 1.
    //this variable will be used later to know whether the file can be successfully uploaded or not
    $uploadOk = 1;
    //imageFileType: this varialbe stores the extension of the image used
    $imageFileType = strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    //when the upload image button is submitted/clicked..
    if(isset($_POST["submit"]) || isset($_POST["continue"])) {
        //get the dimensions of the image and store it in the variable '$check'
        $fileDimensions = getimagesize($_FILES["prod_img"]["tmp_name"]);
        if($fileDimensions !== false) {
             echo "File is an image - " . $fileDimensions["mime"] . ".";
            // print_r($fileDimensions);
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($fileName1)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    //check if its greater than 500kb
    if ($_FILES["prod_img"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["prod_img"]["tmp_name"], $fileName1)) {
            echo "The file ". basename( $_FILES["prod_img"]["name"]). " has been uploaded.";
            //echo '<image src="../image/'.basename( $_FILES["fileToUpload"]["name"]).'">';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}





uploadImage();



		//check if submit button was clicked
if (isset($_POST['upload_product'])){
	$folderName = "../admin/images/uploads/";
    $fileName1 = $folderName.basename($_FILES["prod_img"]["name"]);


	$category_id =(int)$_POST['prod_category'];
	$brand_id = (int)$_POST['prod_brand'];
	$prod_title = $_POST['prod_title'];
    $prod_price = $_POST['prod_price'];
    $prod_desc = $_POST['prod_desc'];



    $insert_product= add_product($category_id,$brand_id,$prod_title,$prod_price,$prod_desc,$fileName1);






    if($insert_product){
    $_SESSION['upload_success'] = "Product added successfully";
        header('Location: ../admin/index.php');
    }else{
		//echo failure
        $_SESSION['upload_error'] = "Error adding product";
        header('Location: ../admin/index.php');

		}
    }





if (isset($_POST['update_prod'])){

    function uploadImage(){
        //the directory/path of the image
        $folderName = "../images/";

        // $folderName = "./images/uploads/";

        $fileName1 = $folderName . basename($_FILES["prod_img"]["name"]);
        //set a variable 'uploadOk' and make it equal to 1.
        //this variable will be used later to know whether the file can be successfully uploaded or not
        $uploadOk = 1;
        //imageFileType: this varialbe stores the extension of the image used
        $imageFileType = strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        //when the upload image button is submitted/clicked..
        if(isset($_POST["submit"]) || isset($_POST["continue"])) {
            //get the dimensions of the image and store it in the variable '$check'
            $fileDimensions = getimagesize($_FILES["prod_img"]["tmp_name"]);
            if($fileDimensions !== false) {
                echo "File is an image - " . $fileDimensions["mime"] . ".";
                // print_r($fileDimensions);
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($fileName1)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        //check if its greater than 500kb
        if ($_FILES["prod_img"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["prod_img"]["tmp_name"], $fileName1)) {
                echo "The file ". basename( $_FILES["prod_img"]["name"]). " has been uploaded.";
                //echo '<image src="../image/'.basename( $_FILES["fileToUpload"]["name"]).'">';
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    uploadImage();

    $folderName = "./images/";
    // $folderName = "../admin/images/uploads/";
    $fileName =$folderName . basename($_FILES["prod_img"]["name"]);


    $category_id =(int)$_POST['prod_category'];
    $brand_id = (int)$_POST['prod_brand'];
    $prod_title = $_POST['prod_title'];
    $prod_price = $_POST['prod_price'];
    $prod_desc = $_POST['prod_desc'];
    $prod_id = $_POST['prod_id'];

    $insert = updateProduct($category_id,$brand_id,$prod_title,$prod_price,$prod_desc,$fileName,$prod_id);

    if($insert){
        $_SESSION['upload_success'] = "Product updated successfully";
        header('Location: ../admin/index.php');
    }else{
        //echo failure
        $_SESSION['upload_error'] = "Error updating product";
        header('Location: ../admin/index.php');

    }

}
if (isset($_GET['delete_product_id'])){


    $prod_id = $_GET['delete_product_id'];

    $del = deleteProduct($prod_id);

    if ($del){

        $_SESSION['del-prod-success'] = 'Product deleted successfully ';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['del-prod-error'] = 'Error deleting product';
        header('Location: ../admin/index.php');
    }
}*/




 ?>