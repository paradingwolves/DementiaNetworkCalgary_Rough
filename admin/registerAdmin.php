<?php
// start session
session_start();

// include database connection
require_once("../connection/connectvars.php");

// define variables and set to empty values
$username = $email = $password = "";
$username_err = $email_err = $password_err = "";

// process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } else {
    // prepare a select statement to check if the username already exists
    $sql = "SELECT id FROM admins WHERE username = ?";

    if ($stmt = $mysqli->prepare($sql)) {
      // bind variables to the prepared statement
      $stmt->bind_param("s", $param_username);

      // set parameters
      $param_username = trim($_POST["username"]);

      // execute the prepared statement
      if ($stmt->execute()) {
        // store result
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
          $username_err = "This username is already taken.";
          echo $username_err;
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // close statement
      $stmt->close();
    }
  }

  // validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter an email address.";
  } else {
    $email = trim($_POST["email"]);
  }

  // validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // check input errors before inserting into database
  if (empty($username_err) && empty($email_err) && empty($password_err)) {

    // prepare an insert statement
    $sql = "INSERT INTO admins (username, email, password) VALUES (?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
      // bind variables to the prepared statement
      $stmt->bind_param("sss", $param_username, $param_email, $param_password);

      // set parameters
      $param_username = $username;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      // execute the prepared statement
      if ($stmt->execute()) {
        // redirect to login page
        header("location: adminLoginForm.html");
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // close statement
      $stmt->close();
    }
  }

  // close connection
  $mysqli->close();
}
?>
