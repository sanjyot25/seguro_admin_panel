<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scanner_db";

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');






// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   echo "nooooo";
   die("Connection failed: " . $conn->connect_error);
}
?>
