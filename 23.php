<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Chirag2023";
$dbname = "F1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch sorted dishes
$sql = "SELECT * FROM dishes ORDER BY price";
$result = $conn->query($sql);

// Display results
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Dish ID</th><th>Dish Name</th><th>Price</th><th>Is Spicy</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["dish_id"] . "</td><td>" . $row["dish_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["is_spicy"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
