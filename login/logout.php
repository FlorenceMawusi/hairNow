<?php


//start session
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();


header('Location: http://localhost/E-Commerce/HairNow/View/index.php');
?>