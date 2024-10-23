<?php
session_start();

$username = $_SESSION['username'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vidura";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  $sql = "SELECT * FROM user WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Fetch the row
    $firstName = $row["firstname"];
    $address = $row["address"];
    $email = $row["email"];
    $lastName = $row["lastname"];
    $city=$row["city"];
} 
else {
    echo "<script>
    alert ('Please log in');
    window.location.href = 'sign in.html';
    </script>";
    exit();
}

}
if(isset($_POST['submi']))
{
    session_destroy();
    $stmt->close();
    $conn->close();
    header("Location: home.html");
}

if(isset($_POST['delete']))
{
        $sql="DELETE  FROM user WHERE username = ?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        echo "
        <script>
        alert ('Account Deleted');
        window.location.href = 'sign in.html';
        </script>";
}

if(isset($_POST['update']))
{
  
    header("Location: change.php");
}

if(isset($_POST['card']))
{
  $sql = "SELECT * FROM card_details WHERE username = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result(); 

  if ($result->num_rows > 0)
  {
  
    header("Location: Bill Pay Details.php");
    exit(); 
  } 
  else {
 
    echo "
    <script>
    alert('No card found');
    window.location.href = 'profile.php';
    </script>";
    exit(); 
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
  <link rel="stylesheet" href="profile.css"> <!-- Link to your CSS stylesheet -->
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
  
<div class="hi">
<form class="container" method="post" action="profile.php">
    <h1 class="welcome">Welcome ! <?php echo $firstName?></h1>
    <div class="infop">
    <img src="image/profile/logo1.png" alt="" id="pPic">
    
    <p id="details"><?php echo $firstName; ?> <?php echo $lastName; ?> <br> <br><a href="#"><?php echo $email; ?></a></p></div>
    <button  id="logout" type="submit" name = "submi">log out</button>
    <h2>Account Details</h2><hr class="horizontal-line">

    <div class="profile-info">
      
        <div class="profile-field">
          
            <div class="profile-value" id="first-name"><b>First Name:</b>  <?php echo $firstName; ?></div>
        
            <div class="profile-value" id="last-name"><b>Last Name: </b> <?php echo $lastName; ?></div>
        
            <div class="profile-value" id="username"><b>Username: </b>  <?php echo $username; ?></div>
        </div>
        <br>
        <div class="profile-field1">
            <div class="profile-value" id="address"><b>Address:</b><?php echo $address; ?> </div>
      
            <div class="profile-value" id="city"> <b>City: </b> <?php echo $city; ?></div>
       
            <div class="profile-value" id="email"><b>Email: </b> <?php echo $email; ?></div>
        </div>

    </div>
    <div class="update">
    <button  id="edit" type="submit" name = "update" >Edit Account Details</button>
    <button  id="delete" type="submit" name = "delete">Delete My Account</button>
    <button  id="card" type="submit" name = "card">Edit card Details</button>
    </div>
    
</form>
</div>
    



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
