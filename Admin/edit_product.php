<?php
//start session
session_start();
require('../Controllers/product_controller.php');
$brand_list = viewBrands_c();
$category_list = viewCategories_c();

$product_cat_id = $_POST['product_cat'];
$product_cat = viewACategory_c($product_cat_id);


$product_brand_id = $_POST['product_brand'];
$product_brand = viewABrand_c($product_brand_id);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Product</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="http://localhost/E-Commerce/HairNow/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="http://localhost/E-Commerce/HairNow/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="http://localhost/E-Commerce/HairNow/css/style.min.css" rel="stylesheet">

</head>
  <body>
     <!-- Navbar -->
    <nav
      class="navbar fixed-top navbar-expand-lg  navbar-dark default-color lighten-3 scrolling-navbar"
    >
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="http://51.105.54.194/E-Commerce/HairNow/View" target="_blank">
          <strong class="blue-text">HairNow</strong>
        </a>

        <!-- Collapse -->
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="http://51.105.54.194/E-Commerce/HairNow/View"
                >Home
                <span class="sr-only">(current)</span>
              </a>
            </li>


            <!-- Dropdown -->
            <?php
            if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 1){
            echo
            "
            <li class='nav-item dropdown'>
              <a
                class='nav-link dropdown-toggle'
                id='navbarDropdownMenuLink'
                data-toggle='dropdown'
                aria-haspopup='true'
                aria-expanded='false'
                ><i class='fab fa-product-hunt'></i>Manage Product</a
              >
              <div
                class='dropdown-menu dropdown-primary'
                aria-labelledby='navbarDropdownMenuLink'
              > 
                <a class='dropdown-item' href='http://51.105.54.194/E-Commerce/HairNow/Admin/add_category.php'>Add Category</a>
              
                <a class='dropdown-item' href='http://51.105.54.194/E-Commerce/HairNow/Admin/add_brand.php'>Add brand</a>
                <a class='dropdown-item' href='http://51.105.54.194/E-Commerce/HairNow/Admin/add_product.php'>Add Product</a>
           
              </div>
            </li>
            ";
           }
            ?>
     
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="http://51.105.54.194/E-Commerce/HairNow/cart.php">
                <span class="badge red z-depth-1 mr-1">
                  <?php if(isset($_SESSION['cart_len'])){
                    echo $_SESSION['cart_len'];} else {echo"";} ?> 
                </span>
                <i class="fas fa-shopping-cart"></i>
                <span class="clearfix d-none d-sm-inline-block"> Cart </span>
              </a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                id="navbarDropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                ><i class="far fa-user mr-2"></i>User</a
              >
              <div
                class="dropdown-menu dropdown-primary"
                aria-labelledby="navbarDropdownMenuLink"
              > 
              <?php
              if(!empty($_SESSION['user_name'])){
                  echo
                  "
                  <a class='dropdown-item' href='http://51.105.54.194/E-Commerce/HairNow/Login/logout.php'>Logout</a>
                  ";
              } else{
                echo 
                "<a class='dropdown-item' href='http://51.105.54.194/E-Commerce/HairNow/Login/login.php'>Login</a>
                <a class='dropdown-item' href='http://51.105.54.194/E-Commerce/HairNow/Login/register.php'>Register</a>
                ";
              } 

              ?>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
    <br><br><br>
    
   
    <div class = "login-form card shadow" style="width:50%; margin:auto; padding:2em;">
        
        
        <h1>Edit Product</h1>
		
        <form id ="form" action = "http://51.105.54.194/E-Commerce/HairNow/Actions/edit_product.php" method="post" enctype="multipart/form-data">
            
                
            <input type="hidden" required class="form-control" name = "product_id" value = "<?php echo $_POST['product_id'];?>" > 
            
            <div class="form-group">
                <label for="product_cat">Product Category</label>

                <select name="product_cat" class="form-control">
                    <option value = '<?php echo $product_cat_id ?>'selected><?php echo $product_cat['cat_name'];?></option>
                    <?php
                    foreach($category_list as $value){
                        $cat_name = $value['cat_name'];
                        $cat_id = $value['cat_id'];
                        echo "<option value = '$cat_id'>$cat_name</option>";  
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="product_brand">Product Brand</label>
                <select name="product_brand" class="form-control">
                    <option value = '<?php echo $product_brand_id ?>'selected><?php if(isset($product_cat['cat_name'])){echo $product_cat['cat_name'];} ?></option>
                    <?php 
                        foreach($brand_list as $value){
                            $brand_name = $value['brand_name'];
                            $brand_id = $value['brand_id'];
                            echo "<option value = '$brand_id'>$brand_name</option>";  
                        }
                    ?>

                </select>

            </div>
            <div class="form-group">
                <label for="product_title">Product Title</label>
                <input type="text" required class="form-control" name = "product_title" value = "<?php echo $_POST['product_title'];?>" > 
            </div>
            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="text" required class="form-control" name = "product_price" value = "<?php echo $_POST['product_price'];?>" > 
            </div>
            <div class="form-group">
                <label for="product_desc">Product Description</label>
                <input type="text" required class="form-control" name = "product_desc" value = "<?php echo $_POST['product_desc'];?>"  > 
            </div>
            <div class="form-group">
                <label for="product_keywords">Product Keyword(s)</label>
                <input type="text" required class="form-control" name = "product_keywords" value = "<?php echo $_POST['product_keywords'];?>" > 
            </div>
            <div class="form-group">
                <label for="product_image">Product Image</label><br>
                <input type="file"  name = "product_image" accept="image/*" value = "<?php echo $_POST['product_image'];?>" > 
            </div>
            <input type="submit" name = "edit" value = "Save" class="btn btn-primary"/>
            <br>
        </form>
    </div>
    
      <!--Footer-->
      <footer class="page-footer text-center font-small mt-4 teal wow fadeIn">
    
    <div class="container my-5 py-5 z-depth-1 ">
    
    <!--Section: Content-->
    <section class="text-center px-md-5 mx-md-5 mt-4 ">
    
      <!-- Section heading -->
      <h3 class="font-weight-bold mb-4">Contact Us</h3>
      <!-- Section description -->
      <p class="text-center w-responsive mx-auto mb-5">We are a phone call or email away!</p>
    
      <!-- Grid row -->
      <div class="row">
    
        <!-- Grid column -->
        <div class="col-md-9 mb-md-0 mb-5">
    
          <form>
    
            <!-- Grid row -->
            <div class="row">
    
              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="contact-name" class="form-control">
                  <label for="contact-name" class="">Your name</label>
                </div>
              </div>
              <!-- Grid column -->
    
              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="contact-email" class="form-control">
                  <label for="contact-email" class="">Your email</label>
                </div>
              </div>
              <!-- Grid column -->
    
            </div>
            <!-- Grid row -->
    
            <!-- Grid row -->
            <div class="row">
    
              <!-- Grid column -->
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <input type="text" id="contact-Subject" class="form-control">
                  <label for="contact-Subject" class="">Subject</label>
                </div>
              </div>
              <!-- Grid column -->
    
            </div>
            <!-- Grid row -->
    
            <!-- Grid row -->
            <div class="row">
    
              <!-- Grid column -->
              <div class="col-md-12">
                <div class="md-form">
                  <textarea id="contact-message" class="form-control md-textarea" rows="3"></textarea>
                  <label for="contact-message">Your message</label>
                </div>
              </div>
              <!-- Grid column -->
    
            </div>
            <!-- Grid row -->
    
          </form>
    
          <div class="text-center text-md-left">
            <a class="btn btn-primary btn-md btn-rounded">Send</a>
          </div>
    
        </div>
        <!-- Grid column -->
    
        <!-- Grid column -->
        <div class="col-md-3 text-center">
          <ul class="list-unstyled mb-0">
            <li>
              <i class="fas fa-map-marker-alt fa-2x blue-text"></i>
              <p>Brekusu, Ghana</p>
            </li>
            <li>
              <i class="fas fa-phone fa-2x mt-4 blue-text"></i>
              <p>+233 56 763 2314</p>
            </li>
            <li>
              <i class="fas fa-envelope fa-2x mt-4 blue-text"></i>
              <p class="mb-0">info@hairnow.com</p>
            </li>
          </ul>
        </div>
        <!-- Grid column -->
    
      </div>
      <!-- Grid row -->
    
    </section>
    <!--Section: Content-->
    
    
    </div>
    
          <hr class="my-4" />
    
          <!-- Social icons -->
          <div class="pb-4">
            <a href="" target="_blank">
              <i class="fab fa-facebook-f mr-3"></i>
            </a>
    
            <a href="" target="_blank">
              <i class="fab fa-twitter mr-3"></i>
            </a>
    
            <a href="" target="_blank">
              <i class="fab fa-youtube mr-3"></i>
            </a>
    
            <a
              href=""
              target="_blank"
            >
              <i class="fab fa-google-plus-g mr-3"></i>
            </a>
    
            <a href="" target="_blank">
              <i class="fab fa-dribbble mr-3"></i>
            </a>
    
            <a href="" target="_blank">
              <i class="fab fa-pinterest mr-3"></i>
            </a>
    
            <a
              href=""
              target="_blank"
            >
              <i class="fab fa-github mr-3"></i>
            </a>
    
            <a href="#" target="_blank">
              <i class="fab fa-codepen mr-3"></i>
            </a>
          </div>
          <!-- Social icons -->
    
          <!--Copyright-->
          <div class="footer-copyright py-3">
            © 2020 Copyright:
            <a target="_blank">
              HairNow
            </a>
          </div>
          <!--/.Copyright-->
        </footer>
        <!--/.Footer-->
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



<?php
unset($_SESSION['product_err']);
unset($_SESSION['product_success']);


?>

</body>
</html>

