<?php
session_start();

if(isset($_POST['submit']))
{
$username = $_POST["username"];
$password = $_POST["password"];

$_SESSION['username'] = $username ; 

if (!empty($username) && !empty($password)) {

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "vidura";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            
            echo "
            <script>
            alert ('Log in Successful');
            window.location.href = 'home.html';
            </script>";

            header("Location: home.html");
            
            exit(); 
            
        } else {
            
            echo "<html><head></head><body><script>
            alert ('invalid user');
            window.location.href = 'sign in.html';
            </script>
            </body>
            </html>";
        }
        
        $stmt->close();
        
        $conn->close();
    }
    
} 
}



?>
