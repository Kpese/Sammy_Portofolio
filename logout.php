<?php
// Start the session
session_start();

// Clear the user session data to log out
session_destroy();
// unset($_SESSION['user']);
// Redirect to the login page or any other desired location
header("Location: index.php");
exit;
?>