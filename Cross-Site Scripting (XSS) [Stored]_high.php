<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "vulnerable_site");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// عند الضغط على زر الإرسال
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(mysqli_real_escape_string($conn, stripslashes(trim($_POST["name"]))));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, stripslashes(trim($_POST["email"]))));
    $feedback = htmlspecialchars(mysqli_real_escape_string($conn, stripslashes(trim($_POST["feedback"]))));
    $subject = "Feedback";

    $query = "INSERT INTO guestbook (comment, name, email, subject) 
              VALUES ('$feedback', '$name', '$email', '$subject')";
    $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/feedback.css" />
  <title>XSS Stored - High</title>
</head>
<body>
  <!-- Header -->
  <div class="header">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="imge/image2.png" />
      <div class="nav-bar">
        <a href="home.php" class="links">Home</a>
        <a href="my-profile.php" class="links">My Profile</a>
        <a href="bugs.php" class="links">Bugs</a>
        <a href="feedback.php" class="links active">Feedback</a>
      </div>
      <a href="logout.php" class="submit">Logout</a>
    </div>
  </div>

  <!-- Feedback Form -->
  <div class="login-container">
    <div class="login-box">
      <form method="post" class="form">
        <span class="input-span">
          <label for="name" class="label">Name</label>
          <input type="text" name="name" id="name" required />
        </span>
        <span class="input-span">
          <label for="email" class="label">Email</label>
          <input type="email" name="email" id="email" required />
        </span>
        <span class="input-span">
          <label for="feedback" class="label">Your Feedback</label>
          <textarea name="feedback" id="feedback" rows="4" required></textarea>
        </span>
        <input class="submit" type="submit" value="Submit" />
      </form>
    </div>
  </div>

  <!-- Feedback Display -->
  <div class="container mt-4">
    <h3 class="text-center" style="color: #00ff88;">Previous Feedback</h3>
    <?php
    $result = $conn->query("SELECT * FROM guestbook ORDER BY id DESC");
    while ($row = $result->fetch_assoc()) {
        echo '<div style="background:#333;padding:15px;margin:10px 0;border-radius:10px">';
        echo '<b style="color:#00ff88">Name:</b> ' . htmlspecialchars($row['name']) . '<br>';
        echo '<b style="color:#00ff88">Email:</b> ' . htmlspecialchars($row['email']) . '<br>';
        echo '<b style="color:#00ff88">Message:</b> ' . htmlspecialchars($row['comment']);
        echo '</div>';
    }
    ?>
  </div>

  <h2 id="typewriter" style="color: #00ff88; text-align: center; font-size: 2rem; margin-top: 30px;"></h2>
  <script>
    const texts = ["You tested it. Now rate it"];
    let count = 0;
    let index = 0;
    let currentText = '';
    let letter = '';

    (function type() {
      if (count === texts.length) count = 0;
      currentText = texts[count];
      letter = currentText.slice(0, ++index);
      document.getElementById('typewriter').textContent = letter;
      if (letter.length === currentText.length) {
        count++;
        index = 0;
        setTimeout(type, 1000);
      } else {
        setTimeout(type, 100);
      }
    })();
  </script>

  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
