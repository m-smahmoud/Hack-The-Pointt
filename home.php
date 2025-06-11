<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Hack The Point</title>
  <link rel="shortcut icon" href="imge/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/index.css" />
</head>
<body>

<!-- Header -->
<div class="header">
  <div class="container d-flex justify-content-between align-items-center">
    <img src="imge/image2.png" alt="logo" />
    <div class="nav-bar">
      <a href="home.php" class="links active">Home</a>
      <a href="my-profile.php" class="links">My Profile</a>
      <a href="bugs.php" class="links">Bugs</a>
      <a href="feedback.php" class="links">Feedback</a>
    </div>
    <a href="logout.php" class="submit">Logout</a>
  </div>
</div>

<!-- About Section -->
<div class="about-section container">
  <h2>About Us</h2>
  <p>
    It is an open source, intentionally insecure website that is completely free and helps
    security enthusiasts and students who want to learn about vulnerabilities to discover
    vulnerabilities in websites. It is the first website to be infected with OWASP Top 10
    2025 vulnerabilities.
  </p>
  <p style="text-align: center; margin-top:3rem; color: #00ff88; font-weight: bold; font-size: 2rem;">
  </p>

  <!-- Typewriter Effect -->
  <h2 id="typewriter" style="color: #00ff88; text-align: center; margin-top: 3rem; font-size: 2rem;"></h2>
</div>

<script>
  const texts = ["Hack The Point", "Ready to Start Hacking?", "Discover, Learn, Secure"];
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
