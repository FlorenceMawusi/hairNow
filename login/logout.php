<?php


//start session
session_start();

// remove all session variables
unset($_SESSION['user_id']);
unset($_SESSION['user_role']);
unset($_SESSION['user_name']);
unset($_SESSION['email']);


header('Location: http://localhost/E-Commerce/HairNow/View/index.php');
?>