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
$sql = "DELETE FROM productlist WHERE ProductID = {$_POST['productID']}";

if ($conn->query($sql) === TRUE) {
    echo "Removed successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: ../../ProductManagement.php');
// or die();
exit();