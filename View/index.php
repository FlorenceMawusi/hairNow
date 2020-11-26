<?php
//start session
session_start();

require_once('../Controllers/product_controller.php');
if (isset($_POST['search']) && (!empty($_POST['product_title']))){

    $product_list = viewProducts_c($_POST['product_title']);
}else{
    $product_list = viewProducts_c();
}

require('../Controllers/cart_controller.php');


  $ip_add = $_SERVER['REMOTE_ADDR'];
  if(isset($_SESSION['user_id'])){$c_id = $_SESSION['user_id'];} else{$c_id=null;}
  $cart_list = viewCart_c($c_id, $ip_add);



  $_SESSION['cart_len'] = count($cart_list) or 0;


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
    <br><br>
    

    <!--Carousel Wrapper-->
    <div
      id="carousel-example-1z"
      class="carousel slide carousel-fade pt-4"
      data-ride="carousel"
    >
      <!--Indicators-->
      <ol class="carousel-indicators">
        <li
          data-target="#carousel-example-1z"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
          <div
            class="view"
            style="
              background-image: url('http://localhost/E-Commerce/HairNow/img/carrousel_img_one.jpg');
              background-repeat: no-repeat;
              background-size: cover;
            "
          >
            <!-- Mask & flexbox options-->
            <div
              class="mask rgba-black-strong d-flex justify-content-center align-items-center"
            >
              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Welcome to HairNow</strong>
                </h1>

                <p>
                  <strong>Home of Affordable Hair Products</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong
                    >Our aim to to provide you with the most amazing hair
                    products</strong
                  >
                </p>
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
          <div
            class="view"
            style="
              background-image: url('http://localhost/E-Commerce/HairNow/img/carrousel_img_two.jpg');
              background-repeat: no-repeat;
              background-size: cover;
            "
          >
            <!-- Mask & flexbox options-->
            <div
              class="mask rgba-black-strong d-flex justify-content-center align-items-center"
            >
              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Welcome to HairNow</strong>
                </h1>

                <p>
                  <strong>Home of Affordable Hair Products</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong
                    >Our aim to to provide you with the most amazing hair
                    products</strong
                  >
                </p>
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>
        </div>
        <!--/Second slide-->

        <!--Third slide-->
        <div class="carousel-item">
          <div
            class="view"
            style="
              background-image: url('http://localhost/E-Commerce/HairNow/img/carrousel_img_three.jpg');
              background-repeat: no-repeat;
              background-size: cover;
            "
          >
            <!-- Mask & flexbox options-->
            <div
              class="mask rgba-black-strong d-flex justify-content-center align-items-center"
            >
              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Welcome to HairNow</strong>
                </h1>

                <p>
                  <strong>Home of Affordable Hair Products</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong
                    >Our aim to to provide you with the most amazing hair
                    products</strong
                  >
                </p>
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>
        </div>
        <!--/Third slide-->
      </div>
      <!--/.Slides-->

      <!--Controls-->
      <a
        class="carousel-control-prev"
        href="#carousel-example-1z"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carousel-example-1z"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->
    
    <div class="col-md-12 mb-4 text-center">
      <?php 
          if(!empty($_SESSION['cart_err'])){
              $err= $_SESSION['cart_err'];
              echo "<h5><span class=' badge badge-danger badge-lg'>$err</span></h5>";
              
          }
          elseif(!empty($_SESSION['cart_success'])){
              $success= $_SESSION['cart_success'];
              echo "<h5><span class=' badge badge-success badge-lg'>$success</span></h5>";
          }
      ?> 
    </div>
    <!--Main layout-->
    <main>
      <div class="container">
        <!--Navbar-->
        <nav
          class="navbar navbar-expand-lg navbar-dark default-color lighten-3 mt-3 mb-5"
        >
          <!-- Navbar brand -->
          <span class="navbar-brand">Categories:</span>

          <!-- Collapse button -->
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#basicExampleNav"
            aria-controls="basicExampleNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Collapsible content -->
          <div class="collapse navbar-collapse" id="basicExampleNav">
            <!-- Links -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#"
                  >All
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hair Tools</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hair Pomades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Shampoos</a>
              </li>
            </ul>
            <!-- Links -->

            <form class="form-inline" method="POST">
              <div class="md-form my-0">
                <input
                  name = "product_title"
                  class="form-control mr-sm-2"
                  type="text"
                  placeholder="Search"
                  aria-label="Search"
                />
                <button 
                  class="btn my-2 my-sm-0" 
                  name = "search" 
                  type="submit">
                  <i class="fas fa-search fa-lg " ></i>
                </button>

              </div>
            </form>
          </div>
          <!-- Collapsible content -->
        </nav>
        <!--/.Navbar-->

        <!--Section: Products v.3-->
        <section class="text-center mb-4">

          <!--Grid row-->
          <div class="row wow fadeIn">
            <!--Grid column-->
          <?php

          foreach($product_list as $value) {
              $productname = $value['productname'];
              $product_brand = $value['product_brand'];
              $productID = $value['productID'];
              $productprice = $value['productprice'];
              $product_keywords = $value['product_keywords'];
              $productimage = $value['productimage'];
              $higher_amt = $value['productprice'] + (3/4)*$value['productprice'];
              $ip_id = $_SERVER['SERVER_ADDR'];
              echo "<div class='col-lg-3 col-md-6 mb-4'>
              <!--Card-->
              <div class='card product_card'>
                <!--Card image-->
                <div class='view overlay mt-4'>
                  <img
                    src='http://localhost/E-Commerce/HairNow/img/products/$productimage'
                    class='card-img-top'
                    alt=''
                  />
                  <a href='http://localhost/E-Commerce/HairNow/View/single_product.php?product_id=$productID'>
                    <div class='mask rgba-white-slight'></div>
                  </a>
                </div>
                <!--Card image-->

                <!--Card content-->
                <div class='card-body text-center'>
                  <!--Category & Title-->
                  <h5>
                    <strong>
                      <a href='' class='dark-grey-text'
                        >$productname
                      </a>
                    </strong>
                  </h5>
                  <del><small class='grey-text'>GHC $higher_amt</small></del>
                  <h4 class='font-weight-bold blue-text'>
                    <strong>GHC $productprice</strong>
                  </h4>
                </div>
                <!--Card content-->
                
              </div>
              <!--Card-->
              <!--Buttons-->
                <div class='btn-group' role='group' aria-label='Basic example'>
                  <a type='button' 
                    href='http://localhost/E-Commerce/HairNow/Actions/add_to_cart.php?product_id=$productID&qty=1'
                    class='btn btn-default'
                  >
                    <i class='fas fa-shopping-cart'></i> Add to Cart
                  </a>
                </div>
              <!--Buttons-->
            </div>
            <!--Grid column-->
            ";
          }

          ?>
          </div>
          <!--Grid row-->
        </section>
        <!--Section: Products v.3-->

        <!--Pagination-->
        <nav class="d-flex justify-content-center wow fadeIn">
          <ul class="pagination pg-blue">
            <!--Arrow left-->
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>

            <li class="page-item active">
              <a class="page-link" href="#"
                >1
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>

            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
        <!--Pagination-->
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
    unset($_SESSION['cart_success']);
    
?>
</html>
