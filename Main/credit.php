<?php

session_start();
$name = $_POST["Name" ];
$country = $_POST["country"];
$cardno = $_POST["Card_Number"];
$pastcode = $_POST["Pastcode"];
$cvc = $_POST["CVC"];
$month = $_POST["month"];
$year = $_POST["year"];

$username = $_SESSION['username'];

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
$sql = "insert into card_details (username,card_number,name,country,pastcode,cvc,month,year)values(?,?,?,?,?,?,?,?)";
$statement=$conn->prepare($sql);

$statement -> bind_param("ssssssss",$username,$cardno,$name,$country,$pastcode,$cvc,$month,$year);
$statement->execute();
}
header("Location: Payment Successful.php");
$conn->close();
?>


