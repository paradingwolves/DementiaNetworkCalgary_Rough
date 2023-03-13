<?php
// MySQL database credentials
$servername = "localhost";
$username = "jbrierley";
$password = "rlhs6rlhs661x6861x68";
$dbname = "jbrierleymedia";



// Create a new mysqli object
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

?>