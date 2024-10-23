<?php

session_start();
 

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vidura";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
} 

else if (isset($_POST['submit']))
{
$username = $_POST["username"];
$password = $_POST["password"];
$_SESSION['username'] = $username ;
if ($username === "Dilshani Senavirathna") {
    // To prevent SQL injection, you should use prepared statements.
    $sql = "SELECT * FROM financial_menager WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid username and password
        echo "Login successful!";
        header("Location: dashf.php");
        
        exit(); 
        
    } else {
        // Invalid username or password
        echo "<html><head></head><body><script>
        alert ('Error Password Enter Again');
        window.location.href = 'f_login.html';
        </script>
        </body>
        </html>";
    }
    
    $stmt->close();
    
   
}

else{
    $sql = "SELECT * FROM support_term_menager WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid username and password
        echo "Login successful!";
        header("Location: usdash.php");
        exit(); 
        
    } else {
        // Invalid username or password
        echo "<html><head></head><body><script>
        alert ('Error Password Enter Again');
        window.location.href = 'flog in.html';
        </script>
        </body>
        </html>";
    }
    
    $stmt->close();

}

}

    
    
$conn->close();
?>



