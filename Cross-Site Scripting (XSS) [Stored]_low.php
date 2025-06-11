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

// إنشاء جدول guestbook إذا لم يكن موجوداً
$sql = "CREATE TABLE IF NOT EXISTS guestbook (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

// عند الضغط على زر الإرسال
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = stripslashes(trim($_POST["name"]));
    $email = stripslashes(trim($_POST["email"]));
    $subject = stripslashes(trim($_POST["subject"]));
    $message = stripslashes(trim($_POST["feedback"]));

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message); // No sanitization: simulate XSS (low)

    $sql_insert = "INSERT INTO guestbook (comment, name, email, subject) 
                   VALUES ('$message', '$name', '$email', '$subject')";
    $conn->query($sql_insert);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
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
  <title>XSS Stored - Low</title>
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
        <a href="xss_stored_low.php" class="links active">Feedback</a>
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
          <label for="subject" class="label">Subject</label>
          <input type="text" name="subject" id="subject" required />
        </span>
        <span class="input-span">
          <label for="feedback" class="label">Your Feedback</label>
          <textarea name="feedback" id="feedback" rows="4" required></textarea>
        </span>
        <input class="submit" type="submit" name="btnSign" value="Submit" />
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
        echo '<b style="color:#00ff88">Name:</b> ' . $row['name'] . '<br>';
        echo '<b style="color:#00ff88">Email:</b> ' . $row['email'] . '<br>';
        echo '<b style="color:#00ff88">Subject:</b> ' . $row['subject'] . '<br>';
        echo '<b style="color:#00ff88">Message:</b> ' . $row['comment'] . '</div>';
    }
    ?>
  </div>

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
      document.getElementById('typewriter')?.textContent = letter;
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
