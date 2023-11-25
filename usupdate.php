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

  $sql = "SELECT * FROM support_term_menager WHERE username = ?";

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
} 

if(isset($_POST['update']))
{

$firstname = $_POST["firstName" ];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$address = $_POST["address"];
$userName = $_POST["userName"];

$sql = "UPDATE support_term_menager SET firstname = ?, lastname = ?, email = ?, address = ?, username = ? WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $firstname, $lastName, $email, $address,  $userName , $userName);


if ($stmt->execute()) {
    echo "<html><head></head><body><script>
    alert ('Account Information updated');
    window.location.href = 'usprofile.php';
    </script>
    </body>
    </html>";
} 

}
if(isset($_POST['back']))
{
    header("Location: usprofile.php");
}

}


$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial manager profile</title>
    <link rel="stylesheet" href="fchange.css">
</head>
<body>
<div id="addimg">
<form method="post" action="usupdate.php" class="editprofile">
<div class="profile-info">
      
      <div class="profile-field">
        
          <div class="profile-value" id="first-name"><b>First Name:</b> <input type="text" value="<?php echo $firstName; ?>" name="firstName"required> </div>
      
          <div class="profile-value" id="last-name"><b>Last Name: </b> <input type="text" value="<?php echo $lastName; ?>" name="lastName"required></div>
      
          <div class="profile-value" id="username"><b>Username: </b>  <input type="text" value="<?php echo $username; ?>" name="userName"required></div>

          <div class="profile-value" id="address"><b>Address:</b><input type="text" value="<?php echo $address; ?>" name="address"required> </div>
          
          <div class="profile-value" id="email"><b>Email: </b><input type="text" value=" <?php echo $email; ?>" name="email"required></div>
      </div>

  </div>
  <div class="update">
  <button  id="edit" type="submit" name = "back" >Back</button>
  <button  id="delete" type="submit" name = "update">Conform And save</button>
  </div>
</form>
</div>
</body>
</html>