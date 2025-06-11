<?php
session_start();
if (!isset($_SESSION['username']) && !(isset($_GET['bypass']) && $_GET['bypass'] == 'true')) {
    header("Location: login.php");
    exit();
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
          <a href="index.php" class="links">Home</a>
          <a href="my-profile.php" class="links">My Profile</a>
          <a href="bugs.php" class="links active">Bugs</a>
          <a href="feedback.php" class="links">Feedback</a>
        </div>
      </div>
      <a href="./logout.php" class="submit">Logout</a>
    </div>
  </div>

  <div class="login-container d-flex flex-column">
    <h2 class="align-self-center">Low Level OS Command Injection</h2>
    <div class="login-box">
      <form method="get" class="form">
        <span class="input-span">
          <input type="text" name="host" placeholder="Enter command, e.g., ping 8.8.8.8" required />
          <input class="submit" type="submit" value="Execute" />
        </span>
      </form>

      <?php
      if (isset($_GET['host'])) {
          $host = $_GET['host'];
          echo "<pre class='text-white mt-3'>";
          $output = shell_exec($host);
          $lines = explode("\n", $output);
          foreach ($lines as $line) {
              if (stripos($line, 'ping') !== false || stripos($line, 'Reply') !== false || stripos($line, 'TTL') !== false) {
                  echo htmlspecialchars($line) . "\n";
              }
          }
          echo "</pre>";
      }
      ?>
    </div>
  </div>

  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
