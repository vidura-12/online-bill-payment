<?php

session_start();

$username = $_SESSION['username'];
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vidura";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
} else {

    $sql = "SELECT * FROM feedback where username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

      $message = ""; 
      $reply="";
      $rating="";

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the row
        $reply = $row["reply"];
        $message = $row["message"];
        $rating = $row["rating"];
    }
    else{
   
      echo "<html><head></head><body><script>
      alert ('Please log in');
      window.location.href = 'sign in.html';
      </script>
      </body>
      </html>";
      exit();
    }
}

if (isset($_POST['Submit'])) {
    $message = $_POST['message'];
    $rating = $_POST['rating'];

    $sql = "insert into feedback (username,message,rating)values(?,?,?)";
    $statement=$conn->prepare($sql);
    
    $statement -> bind_param("sss",$username,$message,$rating);
    $statement->execute();
    if ($stmt->execute()) {
        header('Location: home.html'); // Remove space after 'Location'
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleall.css"> <!-- Link to your CSS stylesheet -->
  <link rel="stylesheet" href="feedback1.css">
  <script src="home.js"></script> <!-- Link to your JavaScript file -->
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

  <div id="div">
  <h1> Feedback NotiFY</h1>
  <form action="feedback.php" method="post" >
    <label for="comments" id = "cmnt">Comments/Feedback:</label>
    <br>
    <textarea id="comment" name="message" rows="4" >
    <?php echo $message; ?>
    </textarea>
    <br>
    <label for="rating" class="rating">Rating (1 to 5):</label>
    <select class="rating" name="rating" value = " <?php echo $rating; ?>" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <input id = "input" type="submit" name="Submit">
    <br>
    <label for="comments" id = "cmnt2">Feedback:</label>
    <textarea id="comment2" name="reply" rows="4" >
    <?php echo $reply; ?>
    </textarea>
    <br>
</form><br><br><br><br>
</div>

<footer>
  <nav class="foter">
    <div class="left">
      <p>Follow Us</p>
      <img src="image/footer/fb.png" alt=""> <!-- Facebook icon -->
      <img src="image/footer/instra.png" alt=""> <!-- Instagram icon -->
      <img src="image/footer/twitter.png" alt=""> <!-- Twitter icon -->
      <img src="image/footer/youtube.png" alt=""> <!-- YouTube icon -->

      <div><a href="notify@email.com">notif y@email.com</a></div> <!-- Contact email -->

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
