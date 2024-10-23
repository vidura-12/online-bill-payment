<?php
if (isset($_POST['deleteEvent'])) {
  $eventId = $_POST['eventId'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "vidura";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM addevents WHERE Event_ID = '$eventId'";

  if ($conn->query($sql) === TRUE) {
    echo "Event deleted successfully.";
	header("location:Eventadd.php");
  } else {
    echo "Error deleting event: " . $conn->error;
  }

  $conn->close();
}
?>
