<?php
// start session
session_start();

// check if user is already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../updateJsonFile.php");
  exit;
}

require_once("../connection/connectvars.php");

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get form data
  $username = $_POST["username"];
  $password = $_POST["password"];

  // prepare statement to retrieve admin from database
  $stmt = mysqli_prepare($conn, "SELECT `id`, `username`, `password` FROM `admins` WHERE `username` = ?");

  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {
      // set session variables
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["username"] = $row["username"];

      // redirect to admin dashboard
      header("location: ../updateJsonFile.php");
    } else {
      // display error message
      $error = "Invalid username or password";
      echo $username;
      echo "<br>";
      echo $row["password"];
      echo "<br>";
      echo $error;
    }
  } else {
    // display error message
    $error = "Invalid username or password";
      echo $username;
      echo "<br>";
      echo $row["password"];
      echo "<br>";
      echo $error;
  }
}

// close connection
mysqli_close($conn);
?>
