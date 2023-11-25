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

if(isset($_POST['back']))
{
    header("Location: profile.php");
}
$userName1=$username;
if(isset($_POST['update']))
{

$firstname = $_POST["firstName" ];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$userName = $_POST["userName"];

$sql = "UPDATE user SET firstname = ?, lastname = ?, email = ?, address = ?, city = ? , username = ? WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $firstname, $lastName, $email, $address, $city , $userName , $userName1);


if ($stmt->execute()) {
    echo "
    <script>
    alert ('Account Information updated');
    window.location.href = 'profile.php';
    </script>";
} 
else 
{
    echo "Error updating user data: " . $stmt->error;
}
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
  <link rel="stylesheet"href="change.css">
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
<div id="addimg">
<form method="post" action="change.php" class="editprofile">
<div class="profile-info">
      
      <div class="profile-field">
        
          <div class="profile-value" id="first-name"><b>First Name:</b> <input type="text" value="<?php echo $firstName; ?>" name="firstName"required> </div>
      
          <div class="profile-value" id="last-name"><b>Last Name: </b> <input type="text" value="<?php echo $lastName; ?>" name="lastName"required></div>
      
          <div class="profile-value" id="username"><b>Username: </b>  <input type="text" value="<?php echo $username; ?>" name="userName"required></div>
      </div>
      <br>
      <div class="profile-field1">
          <div class="profile-value" id="address"><b>Address:</b><input type="text" value="<?php echo $address; ?>" name="address"required> </div>
    
          <div class="profile-value" id="city"> <b>City: </b> <input type="text" value="<?php echo $city; ?>" name="city"required></div>
     
          <div class="profile-value" id="email"><b>Email: </b><input type="text" value=" <?php echo $email; ?>" name="email"required></div>
      </div>

  </div>
  <div class="update">
  <button  id="edit" type="submit" name = "back" >Back</button>
  <button  id="delete" type="submit" name = "update">Conform And save</button>
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
