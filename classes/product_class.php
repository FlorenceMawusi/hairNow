<?php

//import connection file
require('../Settings/connection.php');

// inherit the methods from Connection
class Product extends Connection{

	
	
    // addProduct
	function addProduct($category, $brand, $title, $price, $desc, $image, $keywords){

        $query = "insert into products
        (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords)
        values('$category', '$brand', '$title', '$price', '$desc', '$image', '$keywords')";
		
		// return true or false
		return $this->query($query);

	}


	function deleteProduct($id){

		$query = "delete from products where product_id = '$id'";

		// return true or false
		return $this->query($query);

	}


	function updateProduct($id, $category, $brand, $title, $price, $desc, $image, $keywords){
		if(!empty($image)){
			
			$query = "update products set product_id = '$id', product_cat = '$category', 
			product_brand = '$brand', product_title = '$title', product_price = '$price', 
			product_desc = '$desc', product_image = '$image', product_keywords = '$keywords'
			where product_id = '$id'";
		}else{
		
			$query = "update products set product_id = '$id', product_cat = '$category', 
			product_brand = '$brand', product_title = '$title', product_price = '$price', 
			product_desc = '$desc', product_keywords = '$keywords'
			where product_id = '$id'";
		}
        

		// return true or false
		return $this->query($query);

	}

	//checks if a particular product already exists
	function checkProdExist($title){

		$query = "select product_title from products
		where product_title = '$title'";
		

		// return true or false
		$this->query($query);

		//fetch the values
		return $this->fetch();
		

	}

	//view A Product
	function viewAProduct($product_id){

		$query = "select * from products
		where product_id = '$product_id'";

		// return true or false
		$this->query($query);
		
		//return the fetched values
		return $this->fetch();

	}



	//view Products
	function viewProducts($search_value){

		if(empty($search_value)){
			$query = "select * from products";
		}
		else{
			$query = "select * from products
			where product_title like '%$search_value%'";
		}

		// return true or false
        return $this->query($query);
        
        //return the fetched values
        return $this->fetch($query);

	}


    // add brand
	function addBrand($brand_name){

        $query = "insert into brands
        (brand_name)
        values('$brand_name')";

		// return true or false
		return $this->query($query);

	}

	function checkBrandExist($brand_name){

		$query = "select brand_name from brands
		where brand_name = '$brand_name'";
        

		// return true or false
		$this->query($query);
		return $this->fetch();
		

	}



	function deleteBrand($id){

		$query = "delete from brands 
		where brand_id = '$id'";

		// return true or false
		return $this->query($query);

	}

	//update brand
	function updateBrand($id,$brand_name){

		$query = "update brands 
		set brand_name = '$brand_name'
        where brand_id = '$id'";

		// return true or false
		return $this->query($query);

	}

	//view all brands
	function viewABrand($brand_id){

		$query = "select brand_name from brands
		where brand_id = $brand_id";

		// return true or false
        $this->query($query);
        
        //return the fetched values
        return $this->fetch();

	}

	//view all brands
	function viewBrands(){

		$query = "select * from brands";

		// return true or false
        $this->query($query);
        
        //return the fetched values
        return $this->fetch();

	}
	

    // add Category
	function addCategory($cat_name){

        $query = "insert into categories
        (cat_name)
        values('$cat_name')";

		// return true or false
		return $this->query($query);

	}

	//checks if a particular category already exists
	function checkCatExist($cat_name){

		$query = "select cat_name from categories
		where cat_name = '$cat_name'";
        

		// return true or false
		$this->query($query);

		//fetch the values
		return $this->fetch();
		

	}


	//delete category
	function deleteCategory($id){

		$query = "delete from categories 
		where cat_id = '$id'";

		// return true or false
		return $this->query($query);

	}

	//update category
	function updateCategory($id,$cat_name){

		$query = "update categories 
		set cat_name = '$cat_name'
        where cat_id = '$id'";

		// return true or false
		return $this->query($query);

	}

	//view all categories
	function viewACategory($cat_id){

		$query = "select cat_name from categories
		where cat_id = $cat_id";

		// return true or false
		$this->query($query);
		
		//return the fetched values
		return $this->fetch();

		

	}

	//view all categories
	function viewCategories(){

		$query = "select * from categories";

		// return true or false
        $this->query($query);
        
        //return the fetched values
		return $this->fetch();

		

	}

}

?>