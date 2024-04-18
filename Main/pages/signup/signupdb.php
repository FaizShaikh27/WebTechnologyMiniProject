<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "mansickwellness"; 
$port = 3307; 

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$sql = "INSERT INTO users (fullname, username, password, email, contact, age, gender)
        VALUES ('$fullname', '$username', '$password', '$email', '$contact', '$age', '$gender')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../Login/login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
