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

// Handle form submission for race results
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $race_name = $_POST['race_name'];
    $race_date = $_POST['race_date'];
    $winner_name = $_POST['winner_name'];

    // Insert the data into the 'addresult' table (or adjust to your actual table name)
    $stmt = $conn->prepare("INSERT INTO addresult (race_name, race_date, winner_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $race_name, $race_date, $winner_name);
    $stmt->execute();
    $stmt->close();

    echo "<p>Race result added successfully!</p>";
}

// Count registered users
$userCountResult = $conn->query("SELECT COUNT(*) AS count FROM users");
$userCount = $userCountResult->fetch_assoc()['count'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <h1>Admin Panel</h1>

    <!-- Display Registered User Count -->
    <div class="admin-section">
        <h2>Registered Users</h2>
        <p>Number of Registered Users: <?php echo $userCount; ?></p>
    </div>

    <!-- Add New Race Result Form -->
    <div class="admin-section">
        <h2>Add New Race Result</h2>
        <form method="POST" action="">
            <label for="race_name">Race Name:</label>
            <input type="text" id="race_name" name="race_name" required><br>

            <label for="race_date">Race Date:</label>
            <input type="date" id="race_date" name="race_date" required><br>

            <label for="winner_name">Winner Name:</label>
            <input type="text" id="winner_name" name="winner_name" required><br>

            <button type="submit">Add Result</button>
        </form>
    </div>
</body>
</html>
