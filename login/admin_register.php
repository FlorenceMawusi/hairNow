<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Admin Register
					</span>
				</div>

				<form action="registerprocess.php" method="post" class="login100-form validate-form" onsubmit="validateAdminRegister();">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100"> Full Name</span>
						<input class="input100" type="text" name="customer_name" placeholder="Full Name" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="customer_email" placeholder="Email" required>


                        <?php if (isset($_SESSION['email-exist'])): ?>

                                <span class="focus-input100" style="color: firebrick;">
                                    <?php
                                    echo $_SESSION['email-exist'];
                                    unset($_SESSION['email-exist']);
                                    ?>
                                </span>

                        <?php endif ?>
					</div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Country is required">
                        <span class="label-input100">Country</span>
                        <input class="input100" type="text" name="customer_country" id="customer_country" placeholder="Country" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Contact is required">
                        <span class="label-input100">Contact</span>
                        <input class="input100" type="tel" name="customer_contact" placeholder="Contact " required>
                        <input type="hidden" name="user_role" value="1">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="City is required">
                        <span class="label-input100">City</span>
                        <input class="input100" type="text" name="customer_city" placeholder="City " required>
<!--                        <input class="input100" type="hidden" name="user_role" placeholder="Last Name" value="1">-->
                        <span class="focus-input100"></span>
                    </div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="customer_pass" placeholder="Password" id="password" minlength="8" required title="password should be atleast 8characters" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="pass" placeholder="Confirm Password" id="confirm_password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="register_admin" value="Register" >
					</div>
				</form>
                <div id="error_message" style="color: firebrick;"></div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#login").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });

    function validateCountry(){
        let pattern = /^[a-zA-Z]{4,30}$/g;
        var brand_name = document.getElementById("customer_country").value;
        if(pattern.test(brand_name)){
            return true;
        }
        return false;
    }

    function validateAdminRegister(){

        // var update_name = document.getElementById("brand_name").value;

        var error_message = document.getElementById("error_message");

        error_message.style.padding = "10px";

        var text;
        if(validateCountry()){

            return true;

        } else{

            text = "Country feild can only contain letters";
            error_message.innerHTML = text;
            return false;


        }
    }
</script>

</body>
</html>