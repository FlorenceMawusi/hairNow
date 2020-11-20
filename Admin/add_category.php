<?php
//start session
session_start();
require('../Controllers/product_controller.php');

$cat_list = viewCategories_c(); 
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Category</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.min.css" rel="stylesheet">

  <style>
    img {
        width: 200px;
        height: 200px;
    }
</style>
</head>
  <body>
    <!-- Navbar -->
    <nav
      class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar"
    >
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#" target="_blank">
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
              <a class="nav-link waves-effect" href="#"
                >Home
                <span class="sr-only">(current)</span>
              </a>
            </li>


            <!-- Dropdown -->
            <?php
            //if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 1){
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
                <a class='dropdown-item' href='add_category.php'>Add Category</a>
              
                <a class='dropdown-item' href='add_brand.php'>Add brand</a>
                <a class='dropdown-item' href='add_product.php'>Add Product</a>
           
              </div>
            </li>
            ";
           //}
            ?>
     
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
                  <a class='dropdown-item' href='login/logout.php'>Logout</a>
                  ";
              } else{
                echo 
                "<a class='dropdown-item' href='login/login.php'>Login</a>
                <a class='dropdown-item' href='login/register.php'>Register</a>
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

<!-- Button trigger modal for add button -->
<button type="button" style = "margin: 1em" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
  Add Category
</button>

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class = "login-form" >
            <form id ="form" action = "../Actions/add_category.php" method="get" >
                <div class="form-group">
                    <label for="brand_name">Category Name</label>
                    <input type="text" required class="form-control" id="cat_name" name = "cat_name" placeholder="Enter the category name."> 
                </div>
                
                <input type="submit" name = "submit" value = "Save Changes" class="btn btn-primary float-right"/>
                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal" style = "margin-right: 1em">Close</button>
                <br>
            </form>
        </div>
        </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

    
    
    <br><br>

	
        <div class=" mx-auto" style="width: 35rem;">
        <?php 
            if(!empty($_SESSION['cat_err'])){
                $err= $_SESSION['cat_err'];
                echo "<span class='text-danger'>$err</span>";
                
            }
            elseif(!empty($_SESSION['cat_success'])){
                $success= $_SESSION['cat_success'];
                echo "<span class='text-success'>$success</span>";
            }
        ?>
            <h2 class="text-center">Categories in your store</h2>
            <div class="card shadow rounded mx-auto" style="width: 35rem;">
            
                <ul class="list-group list-group-flush">
                <?php
                foreach($cat_list as $value) {
                    $cat_name = $value['cat_name'];
                    $cat_id = $value['cat_id'];
                    echo "              
                    <li class='list-group-item'> $cat_name
                    <button type='button' style = 'margin-left: 1em' class='btn btn-danger float-right'>Delete</button>
                    <form action = 'edit_category.php' method = 'post' style = 'display: inline-block;
                    float: right';>
                    <input type=hidden name = 'cat_id' value = '$cat_id'></input>
                    <input type=hidden name = 'cat_name' value = '$cat_name'></input>
                    <button id='edit_button' name ='edit_button' type='submit' value='Edit' class='btn btn-success float-right'>Edit</button>
                    </form>
                    </li>";
                }

                ?>

                </ul>
            </div>
        </div>

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<?php

unset($_SESSION['brand_err']);
unset($_SESSION['brand_success']);


?>

</body>
</html>
