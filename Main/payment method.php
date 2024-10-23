<?php
session_start();

$username = $_SESSION['username'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vidura";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} else if (isset($_POST['card'])) {

    $card = $_POST["card"];
    $billType = $_SESSION["bill_type"];
    $paymentInstrument = $_SESSION["payment_instrument"];
    $amount =$_SESSION["amount"];

    $sql = "insert into payment_ship(bill_type, username, amount, payment_bank, payment_method) values (?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $billType, $username, $amount, $paymentInstrument,$card);
    $stmt->execute();
    
    $result=$stmt->get_result();

    if ($_POST["card"] == "Paypal") {
        header("Location: Paypal log.html");

    } else {
        header("Location: Credit.html");
    }

    $stmt->close();
    $conn->close();
}
?>