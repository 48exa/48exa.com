<?php
$servername = getenv('DB_SERVERNAME');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get data from form
$name = $_POST['name'];
$message = $_POST['message'];

// Prepare and bind
$stmt = mysqli_prepare($conn, "INSERT INTO messages (user, message) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $name, $message);

// Execute the statement
mysqli_stmt_execute($stmt);

echo "New record created successfully";

mysqli_stmt_close($stmt);
mysqli_close($conn);
