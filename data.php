<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "rest";

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$phone = mysqli_real_escape_string($connection, $_POST['phone']);
$message = mysqli_real_escape_string($connection, $_POST['message'] ?? '');
$address = mysqli_real_escape_string($connection, $_POST['address']);

// SQL query to insert data into the database
$sql = "INSERT INTO ant (name, phone, message, email, address) VALUES ('$name', $phone, '$message', '$email', '$address')";

// Execute the query
if (mysqli_query($connection, $sql)) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>