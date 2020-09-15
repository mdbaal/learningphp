<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$databaseName = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO productlist (ID,Name,Description,Price) VALUES (null,'{$_POST["productName"]}','{$_POST["productDesc"]}','{$_POST["productPrice"]}')";

if ($conn->query($sql) === TRUE) {
    echo "New product created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: ../../ProductManagement.php');
// or die();
exit();