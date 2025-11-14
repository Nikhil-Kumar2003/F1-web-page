<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "Chirag2023";     // Default XAMPP password
$dbname = "F1";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$num_tickets = (int)$_POST['num_tickets'];

// SQL query to insert data into the tickets table
$sql = "INSERT INTO tickets (name, email, num_tickets) VALUES ('$name', '$email', '$num_tickets')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Ticket booking successful!'); window.location.href='tickets.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
