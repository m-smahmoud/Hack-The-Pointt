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
          <a href="home.php" class="links">Home</a>
          <a href="my-profile.php" class="links">My Profile</a>
          <a href="bugs.php" class="links active">Bugs</a>
          <a href="feedback.php" class="links">Feedback</a>
        </div>
      </div>
      <a href="./logout.php" class="submit">Logout</a>
    </div>
  </div>

  <div class="login-container d-flex flex-column">
    <h2 class="align-self-center">Medium Level OS Command Injection</h2>
    <div class="login-box">
      <form method="post" class="form">
        <span class="input-span">
          <input type="text" name="ip" placeholder="e.g., 8.8.8.8" required />
          <input class="submit" type="submit" value="Ping" />
        </span>
      </form>

      <?php
      if (isset($_POST['ip'])) {
          $ip = $_POST['ip'];
          echo "<pre class='text-white mt-3'>";
          system("ping -n 3 " . $ip);
          echo "</pre>";
      }
      ?>
    </div>
  </div>

  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
