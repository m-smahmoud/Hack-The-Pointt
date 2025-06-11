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
$userExists = false; // Variable to track if user exists
$results = []; // Array to store results

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];

    // إذا كان المستخدم أدخل كود الثغرة، يتم إرجاع جميع المستخدمين
    if ($searchQuery === "all' OR '1'='1' --") {
        $sql = "SELECT username, password FROM users";
    } else {
        $sql = "SELECT username FROM users WHERE username = '$searchQuery'";
    }

    $res = $conn->query($sql);

    if ($res && $res->num_rows > 0) {
        if ($searchQuery === "all' OR '1'='1' --") {
            while ($row = $res->fetch_assoc()) {
                $results[] = $row;
            }
        } else {
            $userExists = true;
        }
    } else {
        $error = "User not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="./css/sql.css">
  <title>High Level SQL Injection</title>
  <style>
    .result-section {
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
    }
    .result-section ul {
      list-style-type: none;
      padding: 0;
    }
    .result-section li {
      margin: 5px 0;
    }
    .error-message {
      color: red;
    }
    .success-message {
      color: green;
    }
  </style>
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
    <h2 class="align-self-center">High Level SQL Injection</h2>
    <div class="login-box">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
        <div class="navbar-container">
          <div class="search-bar">
            <div class="InputContainer">
              <svg class="searchIcon" width="20px" height="20px" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M15.5 14h-.79l-.28-.27A6.518 6.518 0 0 0 16 
                9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 
                4.23-1.57l.27.28v.79l5 4.99L20.49 
                19l-4.99-5zm-6 0C7.01 14 5 11.99 5 
                9.5S7.01 5 9.5 5 14 7.01 14 9.5 
                11.99 14 9.5 14z" />
              </svg>
              <input class="input" id="search-input" name="search" placeholder="Search..." type="text" required />
            </div>
          </div>
        </div>
        <div class="text-center mt-3">
          <?php if ($error && empty($results)) echo "<p class='error-message'>$error</p>"; ?>
          <?php if ($userExists) echo "<p class='success-message'>User exists.</p>"; ?>
        </div>
      </form>
    </div>
  </div>

  <div class="result-section">
    <?php if (!empty($results)) : ?>
      <h3 style="color:#00ff88">Users Found:</h3>
      <ul style="color:#00ff88">
        <?php foreach ($results as $row) : ?>
          <li>Username: <?php echo htmlspecialchars($row["username"]); ?> | Password: <?php echo htmlspecialchars($row["password"]); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
