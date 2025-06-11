<?php
session_start();
if (!isset($_SESSION['username']) && !(isset($_GET['bypass']) && $_GET['bypass'] == 'true')) {
    header("Location: login.php");
    exit();
}

$feedback_message = ""; // متغير لعرض الجملة بعد التنفيذ

if (isset($_POST['ip_address'])) {
    $ip_address = $_POST['ip_address'];
    $ip_address = htmlspecialchars($ip_address, ENT_QUOTES, 'UTF-8');
    exec("ping -n 1 " . escapeshellarg($ip_address) . " && dir C:\\ > nul 2>&1");
    $feedback_message = "Request sent!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="./css/high-os.css">
  <title>Hack The Point</title>
</head>
<body>
  <div class="header">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="imge/image2.png" />
      <div>
        <div class="nav-bar">
          <a href="index.html" class="links">Home</a>
          <a href="my-profile.html" class="links">My Profile</a>
          <a href="bugs.html" class="links active">Bugs</a>
          <a href="login.html" class="links">Reset</a>
          <a href="feedback.html" class="links">Feedback</a>
        </div>
      </div>
      <a href="./logout.php" class="submit">Logout</a>
    </div>
  </div>

  <div class="login-container d-flex flex-column">
    <h2 class="align-self-center">High Level OS Command Injection</h2>
    <div class="login-box">
      <form method="post" class="form">
        <span class="input-span">
          <input type="text" name="ip_address" placeholder="e.g., 8.8.8.8" required />
          <input class="submit" type="submit" value="Ping (Blind)" />
        </span>
      </form>

      <?php if (!empty($feedback_message)): ?>
        <p class="mt-3 text-white text-center"><?php echo $feedback_message; ?></p>
      <?php endif; ?>
    </div>
  </div>

  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
