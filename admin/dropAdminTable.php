<?php
require_once("../connection/connectvars.php");

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// drop table
$sql = "DROP TABLE IF EXISTS `admins`;";

if (mysqli_query($conn, $sql)) {
  echo "Table admins dropped successfully";
} else {
  echo "Error dropping table: " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);
?>
