<?php
$servername = "localhost";
$username = "root";
$password = "Chirag2023";
$dbname = "F1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];
$sql = "SELECT DriverName FROM drivers WHERE DriverName LIKE ? LIMIT 5";
$stmt = $conn->prepare($sql);
$searchQuery = $query . '%';
$stmt->bind_param("s", $searchQuery);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row['DriverName']) . "</p>";
    }
} else {
    echo "<p>No drivers found</p>";
}

$stmt->close();
$conn->close();
?>
