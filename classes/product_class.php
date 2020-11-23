<?php

//import connection file
require_once('../Settings/connection.php');

// inherit the methods from Connection
class Product extends Connection{

	
	
    // addProduct
	function addProduct($title, $category, $brand, $desc,  $price, $image, $keywords){

        $query = "insert into hairproducts
        (productname, product_cat, product_brand, productdescription, productprice,  productimage, product_keywords)
        values('$title', '$category', '$brand', '$desc', '$price',  '$image', '$keywords')";
		
		// return true or false
		return $this->query($query);

	}


	function deleteProduct($id){

		$query = "delete from hairproducts where productID= '$id'";

		// return true or false
		return $this->query($query);

	}


	function updateProduct($id, $title, $category, $brand,  $desc, $price, $image, $keywords){
		if(!empty($image)){
			
			$query = "update hairproducts set productID = '$id', productname = '$title',
			product_cat = '$category', product_brand = '$brand',productdescription = '$desc', productprice = '$price', 
			productimage = '$image', product_keywords = '$keywords'
			where productID= '$id'";
		}else{
		
			$query = "update hairproducts set productID = '$id', productname = '$title', 
			product_cat = '$category', product_brand = '$brand', productdescription = '$desc', productprice = '$price', 
			product_keywords = '$keywords'
			where productID = '$id'";
		}
        

		// return true or false
		return $this->query($query);

	}

	//checks if a particular product already exists
	function checkProdExist($title){

		$query = "select productname from hairproducts
		where productname = '$title'";
		

		// return true or false
		$this->query($query);

		//fetch the values
		return $this->fetch();
		

	}

	//view A Product
	function viewAProduct($product_id){

		$query = "select * from hairproducts
		where productID = '$product_id'";

		// return true or false
		$this->query($query);
		
		//return the fetched values
		return $this->fetch();

	}



	//view Products
	function viewProducts($search_value){

		if(empty($search_value)){
			$query = "select * from hairproducts";
		}
		else{
			$query = "select * from hairproducts
			where productname like '%$search_value%'";
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