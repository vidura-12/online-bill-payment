<?php
$username = $_POST["username"];
$password = $_POST["password"];

if (!empty($username) && !empty($password)) {

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "vidura";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        // To prevent SQL injection, you should use prepared statements.
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Valid username and password
            echo "Login successful!";
            header("Location: home.html");
            
            exit(); // Ensure that no further code is executed after the redirection
        } else {
            // Invalid username or password
            echo "Invalid username or password.";
        }

        $stmt->close();
        
        $conn->close();
    }
    
} 


?>