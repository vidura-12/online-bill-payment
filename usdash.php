<?php
session_start();

$username = $_SESSION['username'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vidura";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if a submit button was clicked
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'submit_button_') === 0) {
                $username = substr($key, strlen('submit_button_'));
                $reply = $_POST['reply_' . $username];

                // Update the database with the reply
                $sql = "UPDATE feedback SET reply = ? WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $reply, $username);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    // Retrieve the feedback data again after updating
    $sql = "SELECT * FROM feedback";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Details</title>
  <link rel="stylesheet" href="usdash.css">

</head>
<body>

 <div class="dash">
  <h2>Dashboard</h2>
  <a href="usprofile.php"><img id="profile" src="image/userprofile.png"></a>
  <a href="Home.html"><button class="logout-button" type="submit">Log out</button></a>
 </div>

 <div class="center">
 <h1><em><strong>User Feedbacks</strong></em></h1>
 <form class="table" action="usdash.php" method="post">
  <table>
    <thead>
      <tr>
        <th>User_Name</th>
        <th>Feedback</th>
        <th>Rate</th>
        <th>Reply</th>
        
      </tr>
    </thead>
    <tbody>
  <?php
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
    echo "<td>" . htmlspecialchars($row['message']) . "</td>";
    echo "<td>" . htmlspecialchars($row['rating']) . "</td>";
    echo "<td>
            <input type='text' name='reply_" . $row['username'] . "' value='' />
            <input type='submit' name='submit_button_" . $row['username'] . "' value='Submit' />
          </td>";
    echo "</tr>";
  }
  ?>
</tbody>

  </table>
 </form>
 </div>

  
 <div id="copyrights">
    &copy;<span> MLB_WD_05.02_01</span>
</div>
</body>
</html>



