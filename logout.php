<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page or wherever you want to redirect after logout
header("Location: index.html");
exit;
?>
