<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$db_name = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create TABLE
$sql = "CREATE TABLE IF NOT EXISTS CONTACT (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    subject TEXT,
    message TEXT
);";

$conn->query($sql);

// Getting user data
$name = $_POST['name'];
$email = $_POST['email'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];

// INSERTING INTO TABLE
$stmt = $conn->prepare("INSERT INTO CONTACT 
(name, email, subject, message) 
VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $name, $email, $Subject, $Message);

$stmt->execute();


// Close the connection
$stmt->close();
$conn->close();

// Printing SUCCESS MESSAGE
header("Location: http://localhost/hospital/success.html");

?>