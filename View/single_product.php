<?php
//start session
session_start();

require_once('../Controllers/product_controller.php');
require_once('../Controllers/cart_controller.php');
$id  = $_GET['product_id'];
$product_list = viewAProduct_c($id);

$product_cat_id = $product_list['product_cat'];
$product_cat = viewACategory_c($product_cat_id);


$product_brand_id = $product_list['product_brand'];
$product_brand = viewABrand_c($product_brand_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <nav
      class="navbar fixed-top navbar-expand-lg  navbar-dark default-color lighten-3 scrolling-navbar"
    >
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="index.php" target="_blank">
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
              <a class="nav-link waves-effect" href="index.php"
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
                <a class='dropdown-item' href='../Admin/add_category.php'>Add Category</a>
              
                <a class='dropdown-item' href='../Admin/add_brand.php'>Add brand</a>
                <a class='dropdown-item' href='../Admin/add_product.php'>Add Product</a>
           
              </div>
            </li>
            ";
           }
            ?>
     
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="cart.php">
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
                  <a class='dropdown-item' href='../Login/logout.php'>Logout</a>
                  ";
              } else{
                echo 
                "<a class='dropdown-item' href='..Login/login.php'>Login</a>
                <a class='dropdown-item' href='../Login/register.php'>Register</a>
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

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <img 
            src=<?php echo '"../img/products/'.$product_list['productimage'].'"' ;?> 
            alt=<?php echo '"'.$product_list['productimage'].'"' ;?>
          >

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1"><?php echo $product_brand['brand_name'] ;?></span>
              </a>
              <a href="">
                <span class="badge blue mr-1"><?php echo $product_cat['cat_name'] ;?></span>
              </a>
              <a href="">
                <span class="badge green mr-1"><?php echo $product_list['product_keywords'] ;?></span>
              </a>
            </div>

            <p class="lead font-weight-bold"><?php echo $product_list['productname'] ;?></p>

            <p class="lead">
              <span class="mr-1">
                <del>GHC <?php echo round($product_list['productprice'] * (5/3)) ;?></del>
              </span>
              <span>GHC <?php echo $product_list['productprice'] ;?></span>
            </p>

            <p class="lead font-weight-bold">Description</p>

            <p><?php echo $product_list['productdescription'] ;?></p>

            <form class="d-flex justify-content-left" method="GET" action="../Actions/add_to_cart.php">
              <!-- Default input -->
              <input type="number" value="1" name="qty" aria-label="Search" class="form-control" style="width: 100px">
              <input type="hidden" value="<?php echo $product_list['productID'] ;?>" name="product_id" >
              <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>

            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      
    </div>
  </main>
  <!--Main layout-->

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

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
