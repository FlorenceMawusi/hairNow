<?php
//start session
session_start();
require('../Controllers/product_controller.php');

$brand_list = viewBrands_c();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="../Css/login.css">


    <title>Edit Brand</title>
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
                        <li class='nav-item active'>
                        <a class='nav-link' href= 'add_brand.php'>Brand <span class='sr-only'>(current)</span></a>
                        </li>
                        ";
                    }

                    if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 1){
                        echo
                        "
                        <li class='nav-item'>
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
    
    <center>
    <div class = "login-form card shadow" >
        
        
        <h1>Edit Brand</h1>
		
        <form id ="form" action = "../Actions/edit_brand.php" method="post" >
            <div class="form-group">
                <label for="brand_name">Brand Name</label>

                <input type="text" value = "<?php $brand_name = $_POST['brand_name'];  if(isset($_POST['edit_button'])){echo"$brand_name";}?>" required class="form-control" id="brand_name" name = "brand_name" placeholder="Enter the brand name.">
                <input type=hidden name = 'brand_id' value = "<?php echo $_POST['brand_id']?>" ></input>
            </div>
            
			<input type="submit" name = "edit" value = "Save" class="btn btn-primary"/>
			<br>
        </form>
    </div>
    </center>

    


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

