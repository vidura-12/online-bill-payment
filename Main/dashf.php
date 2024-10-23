<?php
session_start();

$username = $_SESSION['username'];
$_SESSION['username'] = $username ;
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "vidura";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } 
    else

    {

    $sql = "SELECT * FROM payment_ship";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

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
  <title>Payment Details</title>
  <link rel="stylesheet" href="dashf.css">

</head>
<body>

 <div class="dash">
  <h2>Dashboard</h2>
  <a href="financial_profile.php"><img id="profile" src="image/userprofile.png"></a>
  <a href="f_login.html"><button class="logout-button" type="submit">Log out</button></a>
 </div>

 <h1><em><strong>Details of Payments</strong></em></h1>
 <div class="table">
  <table>
    <thead>
      <tr>
        <th>Bill Type</th>
        <th>Username</th>
        <th>Amount</th>
        <th>payment bank</th>
        <th>payment method</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      // Loop through the database results and generate table rows
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['bill_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['amount']) . "</td>";
        echo "<td>" . htmlspecialchars($row['payment_bank']) . "</td>";
        echo "<td>" . htmlspecialchars($row['payment_method']) . "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
 </div>
  
 <div id="copyrights">
    &copy;<span> MLB_WD_05.02_01</span>
</div>
</body>
</html>



