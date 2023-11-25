<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vidura";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$eventId = $_POST['eventid'];
$userName = $_POST['username'];
$eventName = $_POST['eventName'];
$location = $_POST['location'];
$date = $_POST['date'];
$details = $_POST['details'];



$query = "INSERT INTO addevents (Event_ID,User_Name,Event_Name,Location,Date,Details) VALUES ('$eventId', '$userName','$eventName', '$location', '$date', '$details')";

if (mysqli_query($conn, $query)) {
    echo "Event added successfully.";
	header("location:Eventadd.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



