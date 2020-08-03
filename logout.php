<?php
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
session_destroy();
 
// Redirect to home page
header("location: index.php");
exit;
?>