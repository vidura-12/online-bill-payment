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

  $sql = "SELECT * FROM card_details WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $card_number = $row["card_number"];
    $name = $row["name"];
    $country = $row["country"];
    $cvc=$row["cvc"];
    $month=$row["month"];
    $year=$row["year"];
} 


if(isset($_POST['back']))
{

$card_number = $_POST["card_number" ];
$name = $_POST["name"];
$country = $_POST["country"];
$cvc = $_POST["cvc"];
$month = $_POST["month"];
$year = $_POST["year"];

$sql = "UPDATE card_details SET card_number = ?, name = ?, country = ? , cvc = ? , month = ? ,year = ? WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $card_number, $name , $country,  $cvc , $month , $year, $username);


if ($stmt->execute()) {
    echo "
    <script>
    alert ('Card Information updated');
    window.location.href = 'profile.php';
    </script>";
} 

}
if(isset($_POST['update']))
{
        $sql="DELETE  FROM card_details WHERE username = ?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        
        echo "<script>
        alert ('Card Details Deleted');
        window.location.href = 'profile.php';
        </script>";
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
  <link rel="stylesheet" href="styleall.css">
  <link rel="stylesheet" href="Bill Pay Details.css"> <!-- Link to your CSS stylesheet -->
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

  <form method="post" action="Bill Pay Details.php" class="editprofile">
<div class="profile-info">
      
      <div class="profile-field">
        
          <div class="profile-value" id="card_number"><b>Card Number:</b> <input type="text" value="<?php echo $card_number; ?>" name="card_number"required> </div>
      
          <div class="profile-value" id="name"><b>Name: </b> <input type="text" value="<?php echo $name; ?>" name="name"required></div>
      
          <div class="profile-value" id="country"><b>country: </b>  <input type="text" value="<?php echo $country; ?>" name="country"required></div>
     
          <div class="profile-value" id="cvc"><b>CVC:</b><input type="text" value="<?php echo $cvc; ?>" name="cvc"required> </div>

    <div id ="month">
    <div class="profile-value" id="month"> <b>Month: </b> <input type="text" value="<?php echo $month; ?>" name="month"required></div>
     
     <div class="profile-value" id="year"><b>Year: </b><input type="text" value=" <?php echo $year; ?>" name="year"required></div>
    </div>

      </div>

  </div>
  <div class="update">
  <button  id="edit" type="submit" name = "back" >Conform And save</button>
  <button  id="delete" type="submit" name = "update">Delete my card details</button>
  </div>
</form>

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
