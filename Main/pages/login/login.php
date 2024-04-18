<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOGIN</title>
  <link rel="stylesheet" href="../../style.css" />
  <link rel="stylesheet" href="login.css" />
  <link rel="shortcut icon" href="../../assets/girl_2.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
  
</head>

<body>
  
  <div class="nav">
    <div class="branding">
      <img src="../../assets/logo_mw.png " alt="girl" class="girl" />
      <h1>Mansick<span class="stroke"> Wellness</span></h1>
    </div>
    <div class="links">
      <ul>
        <li><a href="../../index.html">Home</a></li>
        <li><a href="../../index.html">About Us</a></li>
        <li><a href="#">Explore &dtrif;</a>
          
        <ul class="dropdown">
            <li><a href="./../Error/error.html">Blogs</a></li>
            <li><a href="./../Error/error.html">Community</a></li>
            <li><a href="./../Error/error.html">Motivational Numerology</a></li>
            <li><a href="./../Error/error.html">Mental Health Content</a></li>
            <li><a href="./../Error/error.html">Check Mental Health</a></li>
            <li><a href="./../Error/error.html">Focus Environment</a></li>
          </ul>
        </li>
        
        <li><a href="./../feedback/feedback.html">Feedback</a></li>
        <li><a href="./../signup/signup.html">Login</a></li>
        <!-- <li><a href="#">Help</a></li> -->
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="user">
      <i class="fa-regular fa-user"></i>
    </div>
    <form action="login.php" method="POST">

      <div class="email">
        <i class="fa-regular fa-user"></i>
        <input type="text" name="username" placeholder="Enter your username" required />
      </div>
      <div class="pass">
        <i class="fa-solid fa-key"></i>
        <input type="password" name="password" placeholder="Enter your password" required />
      </div>
      <button type="submit">LOGIN</button>
    </form>
    <p class="signup-link">Don't have an account? <a href="../../pages/signup/signup.html">Sign up</a></p>
  </div>

  <?php
$servername = "localhost:3307"; 
$username = "root"; 
$password = ""; 
$database = "mansickwellness"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND is_admin = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      header("Location: ./../../../Admin/admin.html");
      exit();
    }else{
      $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND is_admin = 0";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          header("Location: ./../../../MainLog/index.html");
          exit();
      } else {
          echo "<script>alert('Invalid username or password');</script>";
      }
    }

}


$conn->close();
?>
</body>

</html>
