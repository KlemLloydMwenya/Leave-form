<?php
$serverName = "localhost";
$dbUsername = "Klem";
$password = "Klem1987@20";
$dbName = "cbu_ibic";

// Create connection
$conn = mysqli_connect($serverName, $dbUsername, $password, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";