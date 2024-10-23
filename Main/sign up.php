<?php
$firstname = $_POST["firstName" ];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$userName = $_POST["userName"];
$password = $_POST["password"];


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vidura";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("connection error");
} 
else 
{
    
$sql = "insert into user (firstname,lastname,username,password,address,city,email)values(?,?,?,?,?,?,?)";
$statement=$conn->prepare($sql);

$statement -> bind_param("sssssss",$firstname,$lastName,$userName,$password,$address,$city,$email);
if($statement->execute())
{
    echo "<html><head></head><body><script>
    alert ('Registration Complete');
    window.location.href = 'sign in.html';
    </script>
    </body>
    </html>";
}

}

$conn->close();
?>


