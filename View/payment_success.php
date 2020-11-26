<?php
//start session
session_start();

require_once('../Controllers/cart_controller.php');


$ip_add = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['user_id'])){$c_id = $_SESSION['user_id'];} else{$c_id=null;}
$cart_list = viewCart_c($c_id, $ip_add);



$_SESSION['cart_len'] = count($cart_list);


$order_id = $_GET['invoice_no'];



if(isset($_GET['clear_cart'])){
   //delete user's products in cart
   $delete_cart = deleteUserCart_c($_SESSION['user_id']); 

   header('Location: http://localhost/E-Commerce/HairNow/View/');
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>HairNow</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
    />
    <!-- Bootstrap core CSS -->
    <link href="http://localhost/E-Commerce/HairNow/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="http://localhost/E-Commerce/HairNow/css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="http://localhost/E-Commerce/HairNow/css/style.min.css" rel="stylesheet" />
    <style type="text/css">
      html,
      body,
      header,
      .carousel {
        height: 70vh;
      }

      @media (max-width: 740px) {
        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }

      @media (min-width: 800px) and (max-width: 850px) {
        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }

      .card-img-top{
          height: 165px;
          width: 165px;
          margin-left: auto;
          margin-right: auto;
      }

      .product_card{
        height: 350px;
          
      }
   
    </style>
  </head>

  <body>
    <!-- Navbar -->
    <nav
      class="navbar fixed-top navbar-expand-lg  navbar-dark default-color lighten-3 scrolling-navbar"
    >
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="http://localhost/E-Commerce/HairNow/View" target="_blank">
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
              <a class="nav-link waves-effect" href="http://localhost/E-Commerce/HairNow/View"
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
                <a class='dropdown-item' href='http://localhost/E-Commerce/HairNow/Admin/add_category.php'>Add Category</a>
              
                <a class='dropdown-item' href='http://localhost/E-Commerce/HairNow/Admin/add_brand.php'>Add brand</a>
                <a class='dropdown-item' href='http://localhost/E-Commerce/HairNow/Admin/add_product.php'>Add Product</a>
           
              </div>
            </li>
            ";
            }
           
            ?>
     
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="http://localhost/E-Commerce/HairNow/View/cart.php">
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
                  <a class='dropdown-item' href='http://localhost/E-Commerce/HairNow/Login/logout.php'>Logout</a>
                  ";
              } else{
                echo 
                "<a class='dropdown-item' href='http://localhost/E-Commerce/HairNow/Login/login.php'>Login</a>
                <a class='dropdown-item' href='http://localhost/E-Commerce/HairNow/Login/register.php'>Register</a>
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
    <br>

    <div class="container mt-5">


<!--Section: Content-->
<section class="dark-grey-text">

    <div class="card">
    <div class="card-body">

      <!--Grid row-->
      <div class="row">

        

        <!--Grid column-->
        <div class="col-lg-12 mb-4">


          <!--Card-->
          <div class="card z-depth-0 border border-light rounded-0">

            <!--Card content-->
            <div class="card-body">
              <h1 class="mb-4 mt-1 h5 text-center font-weight-bold">Payment Successful!</h1>
              <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Order ID: <?php echo $order_id; ?></h4>
                
              <hr>

          <?php
            $total_cost = 0;
            if(isset($_SESSION['email'])){$email = $_SESSION['email'];}
            if(isset($cart_list)){
            foreach($cart_list as $value) {
                $p_id = $value['product_id'];
                $c_id = $value['customer_id'];
                $product_title = $value['productname'];
                $product_price = $value['productprice'];
                $qty = $value['quantity'];
                $subtotal = $qty * $product_price;
                $total_cost = $total_cost += $subtotal;


             echo "
                  <dl class='row'>
                    <dd class='col-sm-8'>
                      $product_title
                    </dd>
                    <dd class='col-sm-4'>
                       $qty
                    </dd>
                  </dl>

                  <hr>
            ";
          }
        }
          ?>

                  <dl class="row">
                    <dt class="col-sm-8">
                      Total
                    </dt>
                    <dt class="col-sm-4">
                      GHC <?php echo $total_cost; ?>
                    </dt>
                  </dl>

                  <hr>
              <form method="GET" action="">
                  <input type="hidden" value='<?php if(isset($email)){echo $email;} ?>' id="email-address">
                  <input type="hidden" value="<?php echo $total_cost; ?>" id="amount">
                <button name="clear_cart" class="btn btn-secondary btn-lg btn-block"  type="submit">Back to Shopping</button>
              </form>
            </div>

          </div>
          <!--/.Card-->



        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </div>

</section>
<!--Section: Content-->


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


  <script src="../Js/payment.js"></script>
  <script src="https://js.paystack.co/v1/inline.js"></script> 



</body>
</html>

