<?php

$servername = "localhost";
$username = "your_username";
$password = "user_password";
$db_name = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create TABLE
$sql = "CREATE TABLE IF NOT EXISTS Patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    medical_condition TEXT,
    department VARCHAR(100),
    doctor VARCHAR(100),
    email VARCHAR(100),
    comment TEXT
);";

$conn->query($sql);

// Getting user data
$name = $_POST['name'];
$condition = $_POST['condition'];
$department = $_POST['department'];
$doctor = $_POST['doctor'];
$email = $_POST['email'];
$Comment = $_POST['Comment'];

// INSERTING INTO TABLE
$stmt = $conn->prepare("INSERT INTO Patients 
(name, medical_condition, department, doctor, email, comment) 
VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssss", $name, $condition, $department, $doctor, $email, $comment);

$stmt->execute();


// Close the connection
$stmt->close();
$conn->close();

// Printing SUCCESS MESSAGE
header("Location: http://localhost/hospital/success.html");

?>