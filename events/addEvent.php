<?php

  $json_file = 'data.json';
  // Define the path to the JSON file
 

  // Check if the form was submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Load the existing JSON data from the file
    $json_data = json_decode(file_get_contents($json_file), true);

    // Add the new event to the JSON data if date is not in the past
    if (strtotime($date) > time()) {
      $new_event = array(
        'name' => $name,
        'date' => $date,
        'description' => $description
      );
      $json_data[] = $new_event;

      // Save the updated JSON data to the file
      file_put_contents($json_file, json_encode($json_data));  
      header('Location: ../updateJsonFile.php');
      exit;
    }
  }
?>
<!-- 
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="5; URL=../updateJsonFile.php">
	<title>Redirecting...</title>
</head>
<body>
	<p>You will be redirected to example.html in 5 seconds...</p>
</body>
</html> -->
