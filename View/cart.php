<?php
//start session
session_start();

require('../Controllers/cart_controller.php');

  $ip_add = $_SERVER['REMOTE_ADDR'];
  if(isset($_SESSION['user_id'])){$c_id = $_SESSION['user_id'];} else{$c_id=null;}
  $cart_list = viewCart_c($c_id, $ip_add);



  $_SESSION['cart_len'] = count($cart_list);



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
  <link href="http://localhost/E-Commerce/HairNow/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="http://localhost/E-Commerce/HairNow/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="http://localhost/E-Commerce/HairNow/css/style.min.css" rel="stylesheet">

<style>
  .cart-img{
    height: 100px;
    width: 100px
  }

</style>

<script>
  function submitform(p_id) {
      
      document.getElementById(p_id).submit();
  }
</script>
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

  <div class="container my-5 py-3 mt-5 z-depth-1 rounded">
  <?php 
        if(!empty($_SESSION['del_cart_err'])){
            $err= $_SESSION['del_cart_err'];
            echo "<span class='text-danger'>$err</span>";
            
        }
        elseif(!empty($_SESSION['del_cart_success'])){
            $success= $_SESSION['del_cart_success'];
            echo "<span class='text-success'>$success</span>";
        }
        if(!empty($_SESSION['cart_err'])){
            $err= $_SESSION['cart_err'];
            echo "<span class='text-danger'>$err</span>";
            
        }
    ?> 

    <!--Section: Content-->
    <section class="dark-grey-text">
  
      <!-- Shopping Cart table -->
      <div class="table-responsive mt-5 ">
  
        <table class="table product-table mb-0">
  
          <!-- Table head -->
          <thead class="mdb-color lighten-5">
            <tr>
              <th></th>
              <th class="font-weight-bold">
                <strong>Product</strong>
              </th>
              <th></th>
              <th class="font-weight-bold">
                <strong>Price</strong>
              </th>
              <th class="font-weight-bold">
                <strong>QTY</strong>
              </th>
              <th class="font-weight-bold">
                <strong>Amount</strong>
              </th>
              <th></th>
            </tr>
          </thead>
          <!-- /.Table head -->
  
          <!-- Table body -->
          <tbody>
          <?php
            $total_cost = 0;
            if(isset($cart_list)){
            foreach($cart_list as $value) {
                $p_id = $value['product_id'];
                $c_id = $value['customer_id'];
                $product_title = $value['productname'];
                $product_price = $value['productprice'];
                $product_image = $value['productimage'];
                $qty = $value['quantity'];
                $subtotal = $qty * $product_price;
                $total_cost = $total_cost += $subtotal;
          
            echo "
            <!-- First row -->
            <tr>
              <th scope='row'>
                <img src='http://localhost/E-Commerce/HairNow/img/products/$product_image' alt='' class='cart-img img-fluid z-depth-0'>
              </th>
              <td>
                <h5 class='mt-3'>
                  <strong>$product_title</strong>
                </h5>
                
              </td>
              <td></td>
              <td> GHC   $product_price</td>
              <td>
                <form id=$p_id action='http://localhost/E-Commerce/HairNow/Actions/manage_quantity_cart.php' method='post' >
                  <input type='number' onchange='submitform($p_id)' name='cartqty' value='$qty' aria-label='Search' class='form-control' style='width: 80px'>
                  <input type='hidden' name='p_id' value=$p_id>
                </form>
              </td>
              <td class='font-weight-bold'>
                <strong>GHC $subtotal</strong>
              </td>
              <td>
                <a type='button' href='http://localhost/E-Commerce/HairNow/Actions/delete_a_cart.php?c_id=$c_id&p_id=$p_id' class='btn btn-sm btn-default' data-toggle='tooltip' data-placement='top'
                  title='Remove item'>X
                </a>
              </td>
            </tr>
            <!-- /.First row --> ";
          } 
        }
          ?>
          
  
            <!-- Fourth row -->
            <tr>
              <td colspan="3"></td>
              <td>
                <h4 class="mt-2">
                  <strong>Total</strong>
                </h4>
              </td>
              <td class="text-right">
                <h4 class="mt-2">
                  <strong>GHC <?php echo"$total_cost";?></strong>
                </h4>
              </td>
              <td colspan="3" class="text-right">
                <a type="button" href="http://localhost/E-Commerce/HairNow/View/" class="btn btn-default btn-rounded">Back to shopping
                </a>
                <?php
            if(!empty($_SESSION['user_id'])){
                echo "
                <a type='button' href='http://localhost/E-Commerce/HairNow/View/payment.php' class='btn btn-default btn-rounded'>Complete Purchase
                  <i class='fas fa-angle-right right'></i>
                </a>

                ";
            } else {
                echo "
                <a type='button' href='http://localhost/E-Commerce/HairNow/Login/login.php' class='btn btn-default btn-rounded'>Login to Purchase
                  <i class='fas fa-angle-right right'></i>
                </a>

                ";
            }
            ?>
              </td>
            </tr>
            <!-- Fourth row -->
  
          </tbody>
          <!-- /.Table body -->
  
        </table>
  
      </div>
      <!-- /.Shopping Cart table -->
  
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

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="http://localhost/E-Commerce/HairNow/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="http://localhost/E-Commerce/HairNow/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="http://localhost/E-Commerce/HairNow/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="http://localhost/E-Commerce/HairNow/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>
<?php
    unset($_SESSION['cart_err']);
    unset($_SESSION['del_cart_success']);
    unset($_SESSION['del_cart_err']);


?>

</html>
