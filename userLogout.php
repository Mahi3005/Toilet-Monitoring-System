<?php
session_start(); // Start the session

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['admin'])) {
  header("Location: userLogin.php");
  exit();
}

// Logout logic
session_unset(); // Unset all of the session variables
session_destroy(); // Destroy the session

// Redirect to the login page
header("Location: userLogin.php");
exit();
?>