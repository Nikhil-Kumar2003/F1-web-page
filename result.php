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

// Fetch race results from database
$sql = "SELECT * FROM addresult ORDER BY race_id DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result 2024</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffe5e1;
            color: #333;
        }

        /* Header Section */
        header {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: #ff0000;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 0%;
        }

        .title-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .title-logo h1{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #ffffff;
        }

        .logo {
            border-radius: 8%;
            width: 60px;
            height: auto;
        }

        /* Navigation Bar */
        .navbar {
            display: flex;
            justify-content: center;
            background-color: #000000;
            padding: 10px 0;
        }

        .navbar a {
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #ff0000;
        }

        body h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            color: #ff0000;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            font-size: 1.1em;
        }

        th {
            background-color: #ff0000;
            color: white;
            font-weight: 700;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #fefefe;
        }

        tr:hover {
            background-color: #ff8b79;
            cursor: pointer;
            transform: scale(1.02);
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>
<body>

    <header>
        <div class="title-logo">
            <img src="newlogo.jpeg" alt="F1 Logo" class="logo">
            <h1>Formula 1</h1>
        </div>
        <!-- Navigation Bar -->
        <nav class="navbar">
            <a href="test.html">Home</a>
            <a href="teams.html">Teams</a>
            <a href="drivers.html">Drivers</a>
            <a href="schedule.html">Schedule</a>
            <a href="circuits.html">Circuits</a>
            <a href="tickets.html">Tickets</a>
            <a href="merchandise.html">Merchandise</a>
            <a href="f1tv.html">F1 TV</a>
            <a href="result.php">Result</a>
            <a href="login.html">Login</a>
        </nav>
    </header>

    <h1>Result 2024</h1>
    
    <table>
        <tr>
            <th>Grand Prix</th>
            <th>Date</th>
            <th>Winner</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            // Loop through the race results and display them
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['race_name']) . "</td>
                        <td>" . htmlspecialchars($row['race_date']) . "</td>
                        <td>" . htmlspecialchars($row['winner_name']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results available.</td></tr>";
        }
        ?>

    </table>
</body>
</html>
