<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = ""; // Initialize error message

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['name'];
    $pass = $_POST['password'];

    // Vulnerable to SQL Injection (No sanitization)
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result === false) {
        $error = "Error with query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            $error = "<p style='color: green;'>Login successfully!</p>";
        } else {
            $error = "<p style='color: red;'>Incorrect username or password!</p>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/med-sql.css" >
    <title>Hack The Point</title>
  </head>
  <body>
<div class="header">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="imge/image2.png" />
      <div>
        <div class="nav-bar">
          <a href="home.php" class="links">Home</a>
          <a href="my-profile.php" class="links">My Profile</a>
          <a href="bugs.php" class="links active">Bugs</a>
          <a href="feedback.php" class="links">Feedback</a>
        </div>
      </div>
      <a href="./login.php" class="submit">Logout</a>
    </div>
  </div>

    <div class="login-container d-flex flex-column">
      <h2 class="align-self-center">Medium Level SQL Injection </h2>
      <div class="login-box">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
          <span class="input-span">
            <label for="name" class="label">Username</label>
            <input type="text" name="name" id="name" required />
          </span>
          <span class="input-span">
            <label for="password" class="label">Password</label>
            <input type="password" name="password" id="password" required />
          </span>
          <input class="submit" type="submit" value="Login" />
          <div class="error-message">
            <?php if (!empty($error)) echo $error; ?>
          </div>
        </form>
      </div>
    </div>
  
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
