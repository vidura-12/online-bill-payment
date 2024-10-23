<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleall.css">
  <link rel="stylesheet" href="style/stylesheetadd.css">
  <script src="./script.js"></script> <!-- Link to your JavaScript file -->
</head>
<body>
<nav class="navbar">
    <a href="Home.html"><img id="logo" src="image/profile/logo.png"></a> 
    <div class="list">
      <ul>
        <li><a href="Home.html">Home</a></li> 
        <li><a href="About Us.html">About</a></li> 
        <li><a href="event.php">Dashboard</a></li> 
        <li><a href="Bill amount.php">Billing</a></li>
        <li><a href="Feedback.php">Feedback</a></li> 
        <li><a href="Contac us.html">Contact Us</a></li>  
      </ul>
    </div>

    <a href="profile.php"><img id="user" src="image/profile/userprofile.png"></a> 
    <div class="user-buttons">
  
      <a href="sign in.html"><button class="signin-button">Log In</button></a>
    
      <a href="sign up.html"><button class="signup-button">Sign Up</button></a>
    </div>
    <div class="search-container">
      <input type="text" placeholder="Search...">
      <button type="submit">Search</button>
    </div>
  </nav>
<a href="event.php" class="button">View Dashboard</a>



    <!-- add event form -->

  
    <h1><center>Add Events</center></h1>

  

  <div class="addevent">
    <form action="addEvent.php" method="post" enctype="multipart/form-data">
      <label for="username"><br>User Name:</label>
      <br>
      <input type="text" id="username" name="username" rows="4" required>
      <br><br>
      <label for="eventName"><br>Event Name:</label>
      <br>
      <input type="text" id="eventName" name="eventName" required>
      <br><br>
      <label for="location"><br>Location:</label>
      <br>
      <textarea id="location" name="location" rows="4" required></textarea>
      <br><br>

      <label for="date"><br>Date:</label>
      <br>
      <input type="date" type="date" id="date" name="date" rows="4" required>
      <br><br>

      <label for="details"><br>Event Details:</label>
      <br>
      <textarea type="file" id="details" name="details"></textarea>
      <br><br>
      <br><br>
      <input type="submit" value="Add Event">
    </form>
  </div>

<!-- edit/delete event section -->


    <h1><center>Scheduled Events<center></h1>
 
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "event";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM addevents";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $eventId = $row['Event_ID'];
      $username = $row['User_Name'];
      $eventName = $row['Event_Name'];
      $location = $row['Location'];
      $date = $row['Date'];
      $details = $row['Details'];
      
      echo '<div class="event-details">';
      echo $eventId;
      echo '<br>';
      echo '<form action="updateevent.php" method="post">';
      echo '<input type="hidden" name="eventId" value="' . $eventId . '">';
    
      
      echo '<label for="eventName">Event Name:</label><br>';
      echo '<input type="text" id="eventName" name="eventName" value="' . $eventName . '" required><br>';
      

      
      echo '<label for="location">Location:</label><br>';
      echo '<textarea id="location" name="location" rows="4" required>' . $location . '</textarea><br>';
      

     
      echo '<label for="date">Date:</label><br><br>';
      echo '<input type="date" id="date" name="date" rows="4" value="'. $date .'" required><br>';
     

      
      echo '<br><label for="details">Event Details:</label><br>';
      echo '<textarea id="details" name="details" rows="4" required>' . $details . '</textarea><br>';
      

      echo'<form action="Eventadd.php" method="post"><br>';
	    echo '<input type="submit" name="editEvent" value="Update"><br><br>';
      echo '</form>';

      echo '<form action="deleteevent.php" method="post">';
      echo '<input type="hidden" name="eventId" value="' . $eventId . '">';
      echo '<input type="submit" name="deleteEvent" value="Delete">';
      echo '</form>';
      echo'</div>';
    
    }
  } else {
    echo '<div class="event-details">';
    echo '<p>No events found.</p>';
    echo '</div>';
  }

  $conn->close();
  ?>
  <br><br><br>
  <footer>
    <nav class="foter">
      <div class="left">
        <p>Follow Us</p>
        <img src="image/footer/fb.png" alt=""> <!-- Facebook icon -->
        <img src="image/footer/instra.png" alt=""> <!-- Instagram icon -->
        <img src="image/footer/twitter.png" alt=""> <!-- Twitter icon -->
        <img src="image/footer/youtube.png" alt=""> <!-- YouTube icon -->

        <div><a href="notify@email.com">notify@email.com</a></div> <!-- Contact email -->

      </div>

      <center>
        <div class="card">
          <img src="image/footer/visa.png" alt=""> <!-- Visa logo -->
          <img src="image/footer/master.png" alt=""> <!-- Mastercard logo -->
          <img src="image/footer/american.png" alt=""> <!-- American Express logo -->
          <img src="image/footer/discover.png" alt=""> <!-- Discover logo -->
        </div>
      </center>
      
    </nav>
    <div class="app">
      <p>Download App</p>
      <img src="image/footer/app.png" alt="">
  </div>
  </footer>
  <div id="copyrights">

    &copy;<span> MLB_WD_05.02_01</span>
</div>
</body>
</html>
