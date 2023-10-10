<?php
// $servername = "localhost";
// $username = "user";
// $password = "";
// $dbname = "findmymeds";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scanner_db";

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
// <!-- // error_reporting(E_ALL); -->

// <!-- date_default_timezone_set('Asia/Calcutta'); -->

//cpanel pass: aw(&%K08y

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   echo "nooooo";
   die("Connection failed: " . $conn->connect_error);
}
?>