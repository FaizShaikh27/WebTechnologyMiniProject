<?php
// Database connection
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $database = "mansickwellness"; 
        $port = 3307; 

        $conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Insert email into the database
    $sql = "INSERT INTO newsletter_subscriptions (email) VALUES ('$email')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the homepage
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
