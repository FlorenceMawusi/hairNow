<?php
//start session
session_start();

// remove all session variables
session_unset();



if (!isset($_SESSION['user_id'])) {
	// destroy the session
session_destroy();
echo "<script>location.href='login.php'</script>";
}
else{echo "<script>location.href='login.php'</script>";
	
}


?>
