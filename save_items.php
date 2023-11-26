<?php
// Connect to your MySQL database
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the frontend
$itemName = $_POST['itemName'];
$itemPrice = $_POST['itemPrice'];
$quantity = $_POST['quantity'];

// Insert data into the database
$sql = "INSERT INTO cart_items (item_name, item_price, quantity) VALUES ('$itemName', $itemPrice, $quantity)";

if ($conn->query($sql) === TRUE) {
    echo "Item saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
