<?php
//connection to the product class is done in the cart controller. to avoid duplicate
// require("../classes/productclass.php");

require __DIR__.'/../classes/productclass.php';

function add_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image)
{
    //create an instance of product class
    $newprod_object = new product_class();

    //run the add product method
    $insertprod = $newprod_object->add_new_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image);
    return $insertprod = $insertprod ?: false;

}

function addBrand($brand){
    $newprod_object = new product_class();
    $insert_brand = $newprod_object->create_brand($brand);

    return $insert_brand = $insert_brand ?: false;
}


function updateBrand($brand,$id){
    $newprod_object = new product_class();
    $insert_brand = $newprod_object->update_brand($brand,$id);
    return $insert_brand = $insert_brand ?: false;
}

function deleteBrand($id){
    $newprod_object = new product_class();
    $insert_brand = $newprod_object->delete_brand($id);
    return $insert_brand = $insert_brand ?: false;
}

function addCategory($category){
    $newprod_object = new product_class();
    $check = $newprod_object->add_product_category($category);

    return $check = $check ?: false;
}
function getOneCategory($stm){
    //Create an array variable to hold list of search records
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the search product method
    $product_records = $product_object->get_one_category($stm);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {

            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}

function getAllCategories(){
    //Create an array variable to hold list of search records
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the search product method
    $product_records = $product_object->get_categories();

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {

            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}

function deleteCategory($id){
    $newprod_object = new product_class();
    $insert_brand = $newprod_object->delete_category($id);
    return $insert_brand = $insert_brand ?: false;
}

function updateCategory($brand,$id){
    $newprod_object = new product_class();
    $insert_brand = $newprod_object->update_category($brand,$id);
    return $insert_brand = $insert_brand ?: false;
}


function viewAllProducts(){
    //Create an array variable to hold list of products
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the view all product method
    $product_records = $product_object->view_all_products();

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {
            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}


function getOneBrand($stm){
    //Create an array variable to hold list of search records
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the search product method
    $product_records = $product_object->geOneBrand($stm);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {

            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}


function getAllBrand(){
    //Create an array variable to hold list of search records
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the search product method
    $product_records = $product_object->get_brands();

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {

            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}


//delete a product function - takes the id
function deleteOneProduct($a){
    //create an instance of the product class
    $product_object = new product_class();

    //run the delete one product method
    $delete_product = $product_object->delete_one_product($a);

    //check if method worked
    if ($delete_product) {

        //return query result (boolean)
        return $delete_product;
    }else{
        //return false
        return false;
    }
}

function getOneProduct($stm){
    //Create an array variable to hold list of search records
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the search product method
    $product_records = $product_object->get_one_product($stm);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {

            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}

function updateProduct($category_id,$brand_id,$prod_title,$prod_price,$prod_desc,$fileName,$product_id){
    $newprod_object = new product_class();
    $insert_brand = $newprod_object->update_one_product($category_id,$brand_id,$prod_title,$prod_price,$prod_desc,$fileName,$product_id);
    return $insert_brand = $insert_brand ?: false;
}

function deleteProduct($id){
    $newprod_object = new product_class();
    $insert_brand = $newprod_object->delete_one_product($id);
    return $insert_brand = $insert_brand ?: false;
}



//search product function - takes the search term
function searchProduct($stm){
    //Create an array variable to hold list of search records
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the search product method
    $product_records = $product_object->search_a_product($stm);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {

            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}




/*function displayFeauturedProducts(){

  $all_products = viewAllProducts();

  if ($all_products) {
      foreach ($all_products as $value) {
          $id = $value['product_id'];
          $title = $value['product_title'];
          $price = $value['product_price'];
          $desc = $value['product_desc'];

        $img = $value['product_image'];

        echo '
        <div class="featured_slider_item">
          <div class="border_active"></div>
          <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
            <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="./view/product.php?product_id='.$id.'"><img src="'.$img.'" alt=""></a>
            <div class="product_content">
              <div class="product_price discount">GH¢ '.$price.'</div>
              <div class="product_name"><div><a href="./view/product.php?product_id='.$id.'">'.$title.'</a></div></div>
              <div class="product_extras">
                <div class="product_color">
                  <input type="radio" checked name="product_color" style="background:#b19c83">
                  <input type="radio" name="product_color" style="background:#000000">
                  <input type="radio" name="product_color" style="background:#999999">
                </div>
                <button class="product_cart_button">Add to Cart</button>
              </div>
            </div>
            <div class="product_fav"><i class="fas fa-heart"></i></div>
            <ul class="product_marks">
              <li class="product_mark product_new">new</li>
            </ul>
          </div>
        </div>
        ';

        }}
}







function dealsOfTheWeek(){
  $all_products = viewAllProducts();

  if ($all_products) {
      foreach ($all_products as $value) {
          $id = $value['product_id'];
          $cat_id = $value['product_cat'];
          $title = $value['product_title'];
          $price = $value['product_price'];
          $desc = $value['product_desc'];

        $img = $value['product_image'];

        $one_cat = getOneCategory($cat_id);
        $cat_name = $one_cat[0]['cat_name'];

        echo '
        <div class="owl-item deals_item">
          <div class="deals_image"><img src="'.$img.'" alt=""></div>
          <div class="deals_content">
            <div class="deals_info_line d-flex flex-row justify-content-start">
              <div class="deals_item_category"><a href="./view/product.php?product_id='.$id.'">'.$cat_name.'</a></div>
              <div class="deals_item_price_a ml-auto">GH¢ '.$price.'</div>
            </div>
            <div class="deals_info_line d-flex flex-row justify-content-start">
              <div class="deals_item_name">'.$title.'</div>
              <div class="deals_item_price ml-auto">GH¢ '.$price.'</div>
            </div>
            <div class="available">
              <div class="available_line d-flex flex-row justify-content-start">
                <div class="available_title">Available: <span>1</span></div>
                <div class="sold_title ml-auto">Already sold: <span>0</span></div>
              </div>
              <div class="available_bar"><span style="width:17%"></span></div>
            </div>
            <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
              <div class="deals_timer_title_container">
                <div class="deals_timer_title">Hurry Up</div>
                <div class="deals_timer_subtitle">Offer ends in:</div>
              </div>
              <div class="deals_timer_content ml-auto">
                <div class="deals_timer_box clearfix" data-target-time="">
                  <div class="deals_timer_unit">
                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                    <span>hours</span>
                  </div>
                  <div class="deals_timer_unit">
                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                    <span>mins</span>
                  </div>
                  <div class="deals_timer_unit">
                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                    <span>secs</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        ';

        }}
}







function displayOneproduct(){


  $id = isset($_GET['product_id'])? $_GET['product_id']:null;
  $value = getOneProduct($id);


  $id = $value[0]['product_id'];


  $cat_id = $value[0]['product_cat'];
  $brand_id = $value[0]['product_brand'];
  $title = $value[0]['product_title'];
  $price = $value[0]['product_price'];
  $desc = $value[0]['product_desc'];

$img = $value[0]['product_image'];


$one_cat = getOneCategory($cat_id);
$cat_name = $one_cat[0]['cat_name'];






echo '
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src=".'.$img.'" alt=""></div>
				</div>
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">'.$cat_name.'</div>
						<div class="product_name">'.$title.'</div>
						<div class="product_text"><p>'.substr($desc,0,70).'</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="qty" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>
								</div>
								<div class="product_price">'.$price.'</div>
								<div class="button_container">
									<button type="button" value="'.$id.'" onclick=" return addItemToCart(this.value,1);" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
							</form>
						</div>
					</div>
				</div>
';


}




function searchResultDisplay(){


  $searchterm = isset($_GET['search_query'])? $_GET['searchterm']:'';
  $search_res = searchProduct($searchterm);

  $_SESSION['searchterm'] = $_GET['searchterm'];
  if ($search_res) {
      foreach ($search_res as $value) {
          $id = $value['product_id'];
          $title = $value['product_title'];
          $price = $value['product_price'];
          $desc = $value['product_desc'];

        $img = $value['product_image'];




  echo '
  <div class="owl-item">
    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
      <div class="viewed_image"><a href="../view/product.php?product_id='.$id.'"><img src="'.$img.'" alt=""></a></div>
      <div class="viewed_content text-center">
        <div class="viewed_price">GH¢  '.$price.'</div>
        <div class="viewed_name"><a href="../view/product.php?product_id='.$id.'">'.$title.'</a></div>
      </div>
      <ul class="item_marks">
        <li class="item_mark item_new">new</li>
      </ul>
    </div>
  </div>
  ';
}
}else {
  echo '
<div>
<h3> No result matched your search query</h3>
</div>
  ';

}
}
*/








// #####################################################################################




//view all product function
function view_products($category){
    //Create an array variable to hold list of products
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the view all product method
    $product_records = $product_object->view_products($category);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {
            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}



function recommended(){
    //Create an array variable to hold list of products
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the view all product method
    $product_records = $product_object->recommended();

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {
            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}



function new_arrival($category){
    //Create an array variable to hold list of products
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the view all product method
    $product_records = $product_object->new_arrival($category);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {
            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}


function view_all_products(){
    //Create an array variable to hold list of products
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the view all product method
    $product_records = $product_object->view_all_products();

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {
            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}



function view_order_details($cid,$status){
    //Create an array variable to hold list of products
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the view all product method
    $product_records = $product_object->view_order_details($cid,$status);

    //check if the method worked
    if ($product_records) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $product_object->db_fetch()) {
            //Assign each result to the array
            $product_array[] = $one_record;
        }
    }
    //return the array
    return $product_array;
}

//view one product function - takes the id
function view_one_product($pin){
    //Create an array variable to the product key value pair
    $product_array = array();

    //create an instance of the product class
    $product_object = new product_class();

    //run the view one product method
    $product_record = $product_object->view_one_product($pin);

    //check if the method worked
    if ($product_record) {

        //fetch the result
        $one_record = $product_object->db_fetch();
        //assign to array
        $product_array[] = $one_record;
    }
    //return array
    return $product_array;
}



//update a product function - takes id, title and price
function update_product_fxn($a, $b, $c){
    //create an instance of the product class
    $product_object = new product_class();

    //run the update one product method
    $update_product = $product_object->update_one_product($a, $b, $c);

    //check if method worked
    if ($update_product) {

        //return query result (boolean)
        return $update_product;
    }else{
        //return false
        return false;
    }
}



function update_status($a,$b){
    //create an instance of the product class
    $product_object = new product_class();

    //run the update one product method
    $update_product = $product_object->update_status($a,$b);

    //check if method worked
    if ($update_product) {

        //return query result (boolean)
        return $update_product;
    }else{
        //return false
        return false;
    }
}



function add_to_cart($a, $b){
    //create an instance of cart class
    $newcart_object = new product_class();

    //run the add to cart method
    $addcart = $newcart_object->add_to_cart($a, $b);
    if ($addcart) {
        //return query result (boolean)
        return $addcart;
    }else{
        return false;
    }
}

function view_all_cart($pin){
    //Create an array variable to hold list of cart items
    $cart_array = array();

    //create an instance of the cart class
    $cart_object = new product_class();

    //run the view cart method
    $cart_record = $cart_object->view_cart_item($pin);

    //check if the method worked
    if ($cart_record) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($one_record = $cart_object->db_fetch()) {
            //Assign each result to the array
            $cart_array[] = $one_record;
        }
    }
    //return array
    return $cart_array;
}

//count cart function - takes customer id
//count the cart item of a customer
function count_cart_fxn($a){

    //create an instance of the cart class
    $cart_object = new product_class();

    //run the view cart method
    $card_records = $cart_object->view_cart_item($a);

    //check if the method worked
    if ($card_records) {

        //return count
        return $cart_object->db_count();
    }else{
        return false;
    }

}

//view cart function - takes the customer id

//update a cart item function - takes product id, customer id and quantity
function update_cart($a, $b, $c){
    //create an instance of the cart class
    $cart_object = new product_class();
    //run the update one cart method
    $update_cart = $cart_object->update_cart_quantity($a, $b, $c);

    //check if method worked
    if ($update_cart) {

        //return query result (boolean)
        return $update_cart;
    }else{
        //return false
        return false;
    }
}

//delete one cart item function - takes the product id and customer id
function delete_cart($a, $b){
    //create an instance of the cart class
    $cart_object = new product_class();

    //run the delete one cart method
    $delete_cart = $cart_object->delete_cart_item($a, $b);

    //check if method worked
    if ($delete_cart) {

        //return query result (boolean)
        return $delete_cart;
    }else{
        //return false
        return false;
    }
}

//delete all cart item for a customer function - takes the customer id
function delete_all_cart_fxn($a){
    //create an instance of the cart class
    $cart_object = new product_class();

    //run the delete all cart method
    $delete_cart = $cart_object->delete_all_cart_item($a);

    //check if method worked
    if ($delete_cart) {

        //return query result (boolean)
        return $delete_cart;
    }else{
        //return false
        return false;
    }
}


function check_duplicate($a, $b){
    //create an instance of cart class
    $newcart_object = new product_class();

    //run duplicate cart method giving it the two id's
    $checkcart = $newcart_object->check_cart_duplicate($a, $b);
    if ($checkcart)
    {
        //run the number of rows method
        $checkrows = $newcart_object->db_count();

        //check if any record was returned
        if ($checkrows >= 1) {
            return true;
        }else{
            return false;
        }

    }
}


function insert_order_fxn1($a){
    $myarray=array();
    $customer=new product_class();
    $checkinsert=$customer->insert_order($a);
    if ($checkinsert){
        $record=$customer->db_fetch();
        $myarray['order_id']=$record;
        $orderid=$myarray['order_id'];
    }
    return $orderid;

    //check if the method worked

    //return the just inserted order id

}

//insert order details function.
//takes orderid, productid, customer id and quantity
function insert_order_detail_fxn($a, $b, $c, $d){
    $customer=new product_class();
    $checkinsert=$customer->insert_order_details($a, $b, $c, $d);
    if ($checkinsert){
        return true;
    }else{
        return false;
    }


}

function insert_order_fxn($id, $pid,$email, $number, $address,$town,$qty){
    $customer=new product_class();
    $checkinsert=$customer->insert_order($id, $pid,$email, $number, $address,$town,$qty);
    if ($checkinsert){
        return true;
    }else{
        return false;
    }


}

//insert payment function.
//takes amount, customer id and order id
function insert_payment_fxn($a, $b, $c){
    $customer=new product_class();
    $checkinsert=$customer->insert_payment($a, $b, $c);
    if ($checkinsert){
        return true;
    }else{
        return false;
    }

}
function view_product_name($a){
    //create an instance of the product class
    $product_object = new product_class();
    //run the delete one product method
    $view_product = $product_object->view_product_name($a);

    if ($view_product) {

        $one_record = $product_object->db_fetch();
        //Assign each result to the array
        return $one_record;
    }
    else{
        //return array
        return false;
    }
}





?>