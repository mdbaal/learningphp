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

$sql = " SELECT * FROM productlist";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped'><thead class='thead-light'><tr><th>Product ID</th><th>Name</th><th>Description</th><th>Price</th></tr></thead><tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row["ID"]}</td><td>{$row["Name"]}</td><td>{$row["Description"]}</td><td>&euro; {$row["Price"]}</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No products available.</p><br>";
}

$conn->close();