<?php
// Define the path to the JSON file
$json_file = 'data.json';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the event ID to delete
  $event_id = $_POST['event_id'];

  // Load the existing JSON data from the file
  $json_data = json_decode(file_get_contents($json_file), true);

  // Delete the selected event from the JSON data
  unset($json_data[$event_id]);

  // Re-index the array
  $json_data = array_values($json_data);

  // Save the updated JSON data to the file
  file_put_contents($json_file, json_encode($json_data));

  // Redirect back to the form page
  header('Location: ../updateJsonFile.php');
  exit;
}
?>

