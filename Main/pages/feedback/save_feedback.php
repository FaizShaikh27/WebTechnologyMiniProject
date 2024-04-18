<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "mansickwellness"; 
$port = 3307; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback data from the form
$feedback = $_POST['feedback'];
$use_feedback = $_POST['use_feedback'];

// Prepare SQL statement to insert feedback into the database
$sql = "INSERT INTO feedback (feedback, use_feedback) VALUES ('$feedback', '$use_feedback')";

// Check if the query executed successfully
if ($conn->query($sql) === TRUE) {
    // Redirect to thankyou.html
    header("Location: thankyou.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
