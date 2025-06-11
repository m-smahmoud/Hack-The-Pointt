<?php
// PHP في الأعلى قبل HTML لمعالجة عرض الملف
$showFile = false;
$fileResult = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['file'])) {
    header('Content-Type: text/html; charset=utf-8');

    $user_files = [
        'user1' => 'user1_profile.txt',
        'user2' => 'user2_profile.txt',
        'admin' => 'admin_secret_document.txt'
    ];

    $requested_user_id = $_POST['file'];
    $fileResult .= "<strong>طلب عرض ملف للمستخدم:</strong> " . htmlspecialchars($requested_user_id) . "<br><hr>";

    if (array_key_exists($requested_user_id, $user_files)) {
        $filename = $user_files[$requested_user_id];
        $filepath = __DIR__ . '/files/' . $filename;

        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            $fileResult .= "<strong>محتوى الملف:</strong><pre>" . htmlspecialchars($content) . "</pre>";
        } else {
            $fileResult .= "<strong>خطأ:</strong> الملف غير موجود.";
        }
    } else {
        $fileResult .= "<strong>خطأ:</strong> معرّف المستخدم غير صحيح.";
    }

    $showFile = true;
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
    <link rel="stylesheet" href="./css/low-acc.css" >
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
      <h2 class="align-self-center">Low Broken Access Control</h2>
      <div class="login-box">
        <h3>Login</h3>
        <form method="post" class="form">
          <span class="input-span">
            <label for="Username" class="label">Username</label>
            <input type="text" name="username" id="Username" />
          </span>
          <span class="input-span">
            <label for="password" class="label">Password</label>
            <input type="password"  name="password" id="password" required />
          </span>
          <span class="input-span">
            <label for="file" class="label">Access User File</label>
            <input type="text" name="file" id="file" />
          </span>
          <input class="submit" type="submit" value="Log in" />
        </form>

        <?php if ($showFile): ?>
          <div class="result-box" style="color:#00ff88; padding:10px;">
            <?= $fileResult ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
