<?php
if (isset($_POST['editEvent'])) {
  $eventId=$_POST['eventId'];
  $eventName = $_POST['eventName'];
  $location = $_POST['location'];
  $date = $_POST['date'];
  $details = $_POST['details'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "vidura";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE addevents SET Event_Name='$eventName', Location='$location', Date='$date' , Details='$details' WHERE Event_ID='$eventId'";

  if ($conn->query($sql) === TRUE) {
    echo "event updated successfully";
	header("location:Eventadd.php");
  } else {
    echo "Error updating event: " . $conn->error;
  }

  $conn->close();
}
?>
