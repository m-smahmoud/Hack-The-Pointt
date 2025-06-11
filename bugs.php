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
    <link rel="shortcut icon" href="imge/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bugs.css" />
    <title>Bugs | Hack The Point</title>
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
        <a href="logout.php" class="submit">Logout</a>
      </div>
    </div>

    <div class="about-section container">
      <h2>Bugs</h2>
      <div class="cards">
        <div class="d-flex justify-content-start flex-wrap">
          <?php
          $bugs = [
            "File Upload",
            "Information Disclosures",
            "OS Command Injection",
            "Cross-Site Scripting (XSS) [reflected]",
            "Cross-Site Scripting (XSS) [Stored]",
            "Business Logic",
            "Broken Access Control",
            "Cross-origin Resource Sharing (CORS)",
            "Sql Injection"
          ];

          foreach ($bugs as $bug) {
            $link = 'set.php?bug=' . urlencode($bug);
            echo '<div class="col-4 p-4">
                    <div class="card" id="card">
                      <div class="content">
                        <a href="' . $link . '">' . htmlspecialchars($bug) . '</a>
                      </div>
                    </div>
                  </div>';
          }
          ?>
        </div>
      </div>
    </div>

    <script<?php
// التحقق من اختيار مستوى الأمان وإعادة التوجيه للصفحة المناسبة
if (isset($_GET['level']) && isset($_GET['bug'])) {
    $bug = $_GET['bug'];
    $level = $_GET['level'];
    header("Location: {$bug}_{$level}.php");
    exit();
}
?>
