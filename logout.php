<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is not logged in (assuming you set a session variable upon login)
if (!isset($_SESSION['user_id'])) {
    // Redirect to index.html
    header("Location: index.html");
    exit; // Make sure no code is executed after redirection
}

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page or wherever you want to redirect after logout
header("Location: index.html");
exit;
?>
