<?php
$servername = "localhost";
$username = "root";
$password = "Chirag2023"; // Update with your MySQL password
$dbname = "F1"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $race_name = $_POST['race_name'];
    $race_date = $_POST['race_date'];
    $winner_name = $_POST['winner_name'];

    $stmt = $conn->prepare("INSERT INTO addresult (race_name, race_date, winner_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $race_name, $race_date, $winner_name);
    $stmt->execute();
    $stmt->close();

    echo "<p>Race result added successfully!</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Race Result</title>
    <style>
        /* (Include your existing styles here) */
    </style>
</head>
<body>

    <h1>Add Race Result</h1>

    <form method="POST" action="admin_panel2.php">
        <label for="race_name">Race Name:</label>
        <input type="text" id="race_name" name="race_name" required><br>

        <label for="race_date">Race Date:</label>
        <input type="date" id="race_date" name="race_date" required><br>

        <label for="winner_name">Winner Name:</label>
        <input type="text" id="winner_name" name="winner_name" required><br>

        <button type="submit">Add Result</button>
    </form>

</body>
</html>
