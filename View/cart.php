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
    height: 150px;
    width: 150px
  }

</style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
        <strong class="blue-text">MDB</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About MDB</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
              target="_blank">Free download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free
              tutorials</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect">
              <span class="badge red z-depth-1 mr-1"> 1 </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Cart </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
              target="_blank">
              <i class="fab fa-github mr-2"></i>MDB GitHub
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <div class="container my-5 py-3 mt-5 z-depth-1 rounded">


    <!--Section: Content-->
    <section class="dark-grey-text">
  
      <!-- Shopping Cart table -->
      <div class="table-responsive ">
  
        <table class="table product-table mb-0">
  
          <!-- Table head -->
          <thead class="mdb-color lighten-5">
            <tr>
              <th></th>
              <th class="font-weight-bold">
                <strong>Product</strong>
              </th>
              <th class="font-weight-bold">
                <strong>Color</strong>
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
  
            <!-- First row -->
            <tr>
              <th scope="row">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" alt="" class="cart-img img-fluid z-depth-0">
              </th>
              <td>
                <h5 class="mt-3">
                  <strong>iPhone</strong>
                </h5>
                <p class="text-muted">Apple</p>
              </td>
              <td>White</td>
              <td></td>
              <td>$800</td>
              <td>
                <input type="number" value="2" aria-label="Search" class="form-control" style="width: 100px">
              </td>
              <td class="font-weight-bold">
                <strong>$800</strong>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                  title="Remove item">X
                </button>
              </td>
            </tr>
            <!-- /.First row -->
  
            <!-- Second row -->
            <tr>
              <th scope="row">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/6.jpg" alt="" class=" cart-img img-fluid z-depth-0">
              </th>
              <td>
                <h5 class="mt-3">
                  <strong>Headphones</strong>
                </h5>
                <p class="text-muted">Sony</p>
              </td>
              <td>Red</td>
              <td></td>
              <td>$200</td>
              <td>
                <input type="number" value="2" aria-label="Search" class="form-control" style="width: 100px">
              </td>
              <td class="font-weight-bold">
                <strong>$600</strong>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                  title="Remove item">X
                </button>
              </td>
            </tr>
            <!-- /.Second row -->
  
            <!-- Third row -->
            <tr>
              <th scope="row">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/1.jpg" alt="" class="img-fluid z-depth-0">
              </th>
              <td>
                <h5 class="mt-3">
                  <strong>iPad Pro</strong>
                </h5>
                <p class="text-muted">Apple</p>
              </td>
              <td>Gold</td>
              <td></td>
              <td>$600</td>
              <td>
                <input type="number" value="2" aria-label="Search" class="form-control" style="width: 100px">
              </td>
              <td class="font-weight-bold">
                <strong>$1200</strong>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                  title="Remove item">X
                </button>
              </td>
            </tr>
            <!-- /.Third row -->
  
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
                  <strong>$2600</strong>
                </h4>
              </td>
              <td colspan="3" class="text-right">
                <button type="button" class="btn btn-primary btn-rounded">Complete purchase
                  <i class="fas fa-angle-right right"></i>
                </button>
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
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
        role="button">Download MDB
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fab fa-google-plus-g mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
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

</html>
