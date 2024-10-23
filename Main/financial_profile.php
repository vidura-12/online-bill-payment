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
$sql = "SELECT * FROM financial_menager WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Fetch the row
    $First_name =  $row["firstname"];
    $Last_name =$row["lastname"];
    $email =  $row["email"];
    $address =$row["address"];
    $deparment =$row["deparment"];

} 

}
if(isset($_POST['logout']))
{
    session_destroy();
    $stmt->close();
    $conn->close();
    header("Location: f_login.html");
}

if(isset($_POST['delete']))
{
        $sql="DELETE  FROM financial_menager WHERE username = ?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        echo "
        <script>
        alert ('Account Deleted');
        window.location.href = 'f_login.html';
        </script>";
        $stmt->close();
}

if(isset($_POST['update']))
{
  
    header("Location: fchange.php");
}
if(isset($_POST['back']))
{
    header("Location: dashf.php");
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
    <link rel="stylesheet" href="f_profile.css">
</head>
<body>
    <div class="profile-container">
        <form method="post" action="financial_profile.php">
        
            <h3 class="up"><em>Financial Manager</em></h3>
        
       
        <img src="image/girl04-1.png" alt="profile pic" id="img">
      
        <p class="name"><?php echo $First_name; ?> <?php echo $Last_name; ?></p>
        <br>
        <P class="email"><?php echo $email; ?></P>

        <a href="Home.html"><button class="logout-button" type="submit" name="logout">Log out</button></a>

        <h3 class="separate">Account Details</h3>
        <hr>

        <br> <br>
        <p class="data"><strong>First Name :</strong> <?php echo $First_name; ?></p>
        <br>
        <p class="data"><strong>Last Name : </strong><?php echo $Last_name; ?></p>
        <br>
        <p class="data"><strong>Email : </strong><?php echo $email; ?></p>
        <br>
        <p class="data"><strong>Username : </strong><?php echo $username; ?></p>
        <br>
        <p class="data"><strong>Address :</strong> <?php echo $address; ?></p>
        <br>
        <p class="data"><strong>Deparment :</strong> <?php echo $deparment; ?></p>
        <br><br>
        
        <div class="button">
        <button class="back" type="submit" name="back" >Back</button>
            <button class="edit" type="submit" name="update" >Edit Account Details</button>
            <button class="delete" type="submit" name="delete">Delete Account</button>
        </div>
        <br>
    </form>
    </div>
</body>
</html>