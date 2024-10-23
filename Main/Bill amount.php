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
  
  if ($result->num_rows < 1) {
    echo "
    <script>
    alert ('Please log in');
    window.location.href = 'sign in.html';
    </script>";
    exit();
  
  }
}


if(isset($_POST['submit']))
{

$billType = $_POST["bill_type"];
$paymentInstrument = $_POST["payment_instrument"];
$amount =$_POST["amount"];

$_SESSION["bill_type"]= $billType ;
$_SESSION["payment_instrument"] = $paymentInstrument ;
$_SESSION["amount"] = $amount ;    

header("Location: Payment method.HTML");
      
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
  <link rel="stylesheet" href="Bill amount.css">
  <script src="./script.js"></script> <!-- Link to your JavaScript file -->
  <script src="./Bill amount.js"></script>
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
  <br>
<div class="amount_container">
  <form id="div" method="post" action="Bill amount.php">
    <p class="Payment">Bill Payment</p> 
    <select id="option" name="bill_type">
      <option selected disabled>Type of bill</option>
      <option value="Education">Education</option>
      <option value="Telecommunication">Telecommunication</option>
      <option value="Utility">Utility</option>
      <option value="Credit Card Payment">Credit Card Payment</option>
      <option value="Insurance">Insurance</option>
      <option value="Leasing">Leasing</option>
      <option value="Tv">Tv</option>
      <option value="Other">Other</option>
    </select>

    <br><br><p class="Payment">Payment Bank</p>
    <select id="option" name="payment_instrument">
      <option selected disabled>Select Your Payment Bank</option>
      <option value="Bank of Ceylon">Bank of Ceylon</option>
      <option value="People Bank">People Bank</option>
      <option value="Sampath Bank">Sampath Bank</option>
      <option value="Hatton National Bank">Hatton National Bank</option>
    </select>
  
     <br><br><p class="Payment">Amount</p>

     <input type="text" id="option" placeholder="00.00 LKR" name="amount" >

     <div id="button_center">
      <button id="btn1" type="reset" name="reset">Change</button>
     <a><button id="btn2" type="submit" name="submit">Confirm</button></a>

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
