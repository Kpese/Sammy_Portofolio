<?php
// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    "Connection failed: " . mysqli_connect_error();
}
?>