<?php
//start session
session_start();
require('../Controllers/product_controller.php');

$cat_list = viewCategories_c(); 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="../Css/login.css"> -->


    <title>Categories</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Shoppn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
                    if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 1){
                        echo
                        "
                        <li class='nav-item'>
                        <a class='nav-link' href= 'add_brand.php'>Brand <span class='sr-only'>(current)</span></a>
                        </li>
                        ";
                    }

                    if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 1){
                        echo
                        "
                        <li class='nav-item active'>
                        <a class='nav-link' href='add_category.php'>Category<span class='sr-only'>(current)</span></a>
                        </li>
                        ";
                    }

                    if(!empty($_SESSION['user_name'])){
                        echo
                        "
                        <li class='nav-item'>
                        <a class='nav-link' href='../View/add_product.php'>Add Product<span class='sr-only'>(current)</span></a>
                        </li>
                        ";
                    }

                ?>

            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item">
                    <a class="nav-link" href="../Login/register.php">Register</a>
                </li>
                <?php
                    if(!empty($_SESSION['user_name'])){
                        echo
                        "<li class= 'nav-item'>
                        <a class= 'nav-link' href= '../Login/logout.php'>Logout</a>
                        </li>";
                    }
                    else{
                        echo 
                        "<li class= 'nav-item'>
                        <a class= 'nav-link' href= '../Login/login.php'>Login</a>
                        </li>";
                    } 

                ?>
                
            </ul>
        </div>
    </nav>
    <br>

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

