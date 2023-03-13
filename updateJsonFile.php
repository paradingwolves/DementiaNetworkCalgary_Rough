<?php
      require_once("components/header.php");
      $json_file = 'events/data.json';
?>

<div class="container mt-5">
      <h1 class="mb-4">Add an Event</h1>
      <form action="events/addEvent.php" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="date" class="form-label">Date:</label>
          <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description:</label>
          <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label for="time" class="form-label">Time:</label>
          <input type="time" name="time" id="time" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address:</label>
          <input type="text" name="address" id="address" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Event</button>
      </form>
            
      
      <form action="events/deleteEvent.php" method="post">
        <div class="mb-3">
          <label for="event_id" class="form-label">Select event to delete:</label>
          <select name="event_id" id="event_id" class="form-select">
            <?php
              // Load the JSON data from the file
              $json_data = json_decode(file_get_contents($json_file), true);

              // Loop through each event and create an option for it in the select dropdown
              foreach ($json_data as $key => $event) {
                echo "<option value='$key'>$event[name] - $event[date]</option>";
              }
            ?>
          </select>
        </div>

        <button type="submit" class="btn btn-danger mt-3">Delete Event</button>
      </form>

    </div>
  </div>
    
  <?php
    require_once("components/footer.html");
  ?>


