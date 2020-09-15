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
$sql = "UPDATE productlist SET ";

if($_POST["productName"] != "")
    $sql .= "Name='{$_POST['productName']}', ";

if($_POST["productStock"] != "")
    $sql .= "Desc='{$_POST['productDesc']}'";

if($_POST["productStock"] != "")
    $sql .= "Price='{$_POST['productPrice']}'";

$sql .= " WHERE ProductID= {$_POST['productID']}";

if ($conn->query($sql) === TRUE) {
    echo "Product Edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: ../../ProductManagement.php');
// or die();
exit();