<?php
$host = "localhost";
$username = "root"; // your DB username
$password = "";     // your DB password
$dbname = "portfolio"; // your DB name

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$project  = $_POST['project'];
$budget   = $_POST['budget'];
$duration = $_POST['duration'];
$message  = $_POST['message'];

$sql = "INSERT INTO hire_requests (name, email, phone, project, budget, duration, message)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $name, $email, $phone, $project, $budget, $duration, $message);

if ($stmt->execute()) {
    echo "<script>alert('Your request has been submitted successfully!'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>