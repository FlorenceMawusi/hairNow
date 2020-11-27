<?php
require_once('../Classes/product_class.php');


function addProduct_c($category, $brand, $title, $price, $desc, $image, $keywords){

	// create an instance of the Product Class
	$product_instance = new Product();

	// call the method from the class
	$x = $product_instance->addProduct($category, $brand, $title, $price, $desc, $image, $keywords);

	if($x){
		return true;
	}

	return false;

}



function updateProduct_c($id, $category, $brand, $title, $price, $desc,$target_file, $keywords){

	// create an instance of the Product Class
	$product_instance = new Product();

	// call the method from the class
	$x = $product_instance->updateProduct($id, $category, $brand, $title, $price, $desc, $target_file, $keywords);

	if($x){
		return true;
	}

	return false;
	
}



function deleteProduct_c($id){

	// create an instance of the Product Class
	$product_instance = new Product();

	// call the method from the class
	$x = $product_instance->deleteProduct($id);

	if($x){
		return true;
	}

	return false;
	
}

function checkProdExist_c($title){
    // create an instance of the Product Class
	$product_instance = new Product();

	// call the method from the class
	$x = $product_instance->checkProdExist($title);

	if($x != NULL){
		return true;
	}

	return false;
}

function viewAProduct_c($product_id){
    // create an instance of the product Class
	$product_instance = new Product();

	// call the method from the class
	$x = $product_instance->viewAProduct($product_id);

	return $x;
}


function viewProducts_c($search_value =''){

	// create an instance of the Product Class
	$product_instance = new Product();

	// call the method from the class
	$x = $product_instance->viewProducts($search_value);

	// create an empty array
	$arr = array();

	if($x){
		
		// store all the rows into the array
		while($row = $product_instance->fetch()){
			$arr[] = $row;
		}
	}

	// return the array containing the records
	return $arr;
	
}

function addBrand_c($brand_name){

	// create an instance of the Brand Class
	$brand_instance = new Product();

	// call the method from the class
	$x = $brand_instance->addBrand($brand_name);

	if($x){
		return true;
	}

	return false;

}

function checkBrandExist_c($brand_name){
    echo $brand_name;
    // create an instance of the Brand Class
	$brand_instance = new Product();

	// call the method from the class
	$x = $brand_instance->checkBrandExist($brand_name);

	if($x != NULL){
		return true;
	}

	return false;
}


// function to update brand
function updateBrand_c($id, $brand_name){

	// create an instance of the Brand Class
	$brand_instance = new Product();

	// call the method from the class
	$x = $brand_instance->updateBrand($id, $brand_name);

	if($x){
		return true;
	}

	return false;
	
}



function deleteBrand_c($id){

	// create an instance of the Brand Class
	$brand_instance = new Product();

	// call the method from the class
	$x = $brand_instance->deleteBrand($id);

	if($x){
		return true;
	}

	return false;
	
}

function viewABrand_c($brand_id){
    // create an instance of the brand Class
	$brand_instance = new Product();

	// call the method from the class
	$x = $brand_instance->viewABrand($brand_id);

	return $x;
}

function viewBrands_c(){
    // create an instance of the brand Class
	$brand_instance = new Product();

	// call the method from the class
	$x = $brand_instance->viewBrands();

	// create an empty array
	$arr = array();

	if($x){
		// store all the rows into the array
		while($row = $brand_instance->fetch()){
			$arr[] = $row;
		}
	}

	// return the array containing the records
	return $arr;
}


function addCategory_c($cat_name){

	// create an instance of the Category Class
	$cat_instance = new Product();

	// call the method from the class
	$x = $cat_instance->addCategory($cat_name);

	if($x){
		return true;
	}

	return false;

}

function checkCatExist_c($cat_name){
    // create an instance of the Category Class
	$cat_instance = new Product();

	// call the method from the class
	$x = $cat_instance->checkCatExist($cat_name);

	if($x != NULL){
		return true;
	}

	return false;
}


// function to update Category
function updateCategory_c($id, $cat_name){

	// create an instance of the Cateogry Class
	$cat_instance = new Product();

	// call the method from the class
	$x = $cat_instance->updateCategory($id, $cat_name);

	if($x){
		return true;
	}

	return false;
	
}



function deleteCategory_c($id){

	// create an instance of the Category Class
	$cat_instance = new Product();

	// call the method from the class
	$x = $cat_instance->deleteCategory($id);

	if($x){
		return true;
	}

	return false;
	
}

function viewACategory_c($cat_id){
    // create an instance of the Category Class
	$cat_instance = new Product();

	// call the method from the class
	$x = $cat_instance->viewACategory($cat_id);

	return $x;
}

function viewCategories_c(){
    // create an instance of the Category Class
	$cat_instance = new Product();

	// call the method from the class
	$x = $cat_instance->viewCategories();

	// create an empty array
	$arr = array();

	if($x){
		// store all the rows into the array
		while($row = $cat_instance->fetch()){
			$arr[] = $row;
		}
	}

	// return the array containing the records
	return $arr;
}




?>