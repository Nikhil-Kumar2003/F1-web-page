<?php
// Database credentials
$servername = "localhost";  // Or your server address
$username = "root";
$password = "Chirag2023";
$dbname = "F1";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Check if the entered credentials match the admin credentials
    $admin_username = 'admin'; // Define a fixed admin username
    $admin_password = 'adminpassword'; // Define a fixed admin password

    if ($username == $admin_username && $password == $admin_password) {
        // Redirect to admin panel if credentials match
        header("Location: admin_panel.php");  // Redirect to your admin panel
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

// Close the connection
$conn->close();
?>
