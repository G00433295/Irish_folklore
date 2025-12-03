<?php
// db_connect.php
$servername = "conorproject";  // or "localhost" if you're running WAMP locally
$username = "root";
$password = "";
$dbname = "irish_folklore_db";
$port = 3304;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
