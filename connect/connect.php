<?php
session_start();
date_default_timezone_set('Asia/Manila');
$date_current = date('Y-m-d H:i:s');
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumniportal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "<br>Failed to connect to the network";
} 


?>