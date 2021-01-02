<?php
$serverName = "localhost";
$dbUsername = "*******";
$password = "********";
$dbName = "yourDatabase";

// Create connection
$conn = mysqli_connect($serverName, $dbUsername, $password, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
