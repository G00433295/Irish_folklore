<?php

include 'db_info.php';

$conn = new mysqli($servername, $username, $password, $dbname, port: $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}