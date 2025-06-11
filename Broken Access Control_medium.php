<?php
session_start();

// بيانات المستخدمين
$users = [
    'user1' => ['password' => 'pass1', 'id' => '1'],
    'user2' => ['password' => 'pass2', 'id' => '2'],
    'user3' => ['password' => 'pass3', 'id' => '3'],
    'user4' => ['password' => 'pass4', 'id' => '4'],
    'user5' => ['password' => 'pass5', 'id' => '5'],
    'admin' => ['password' => 'adminpass', 'id' => '40']
];

// تسجيل الخروج
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: Broken Access Control_medium.php");
    exit;
}

$fileResult = "";
$showFile = false;

// تسجيل الدخول
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Username'], $_POST['password'])) {
    $u = $_POST['Username'];
    $p = $_POST['password'];

    if (isset($users[$u]) && $users[$u]['password'] === $p) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $u;
        $_SESSION['user_id'] = $users[$u]['id'];
    } else {
        $fileResult = "<div class='alert alert-danger'>اسم المستخدم أو كلمة السر غير صحيحة.</div>";
    }
}

// عرض الملف
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['file']) && isset($_SESSION['logged_in'])) {
    $user_files = [
        '1' => 'user1_profile.txt',
        '2' => 'user2_profile.txt',
        '3' => 'user3_profile.txt',
        '4' => 'user4_profile.txt',
        '5' => 'user5_profile.txt',
        '40' => 'admin_secret_document.txt'
    ];

    $view_id = $_POST['file'];
    $fileResult .= "<strong> ID:</strong> " . htmlspecialchars($view_id) . "<hr>";

    if (array_key_exists($view_id, $user_files)) {
        $filename = $user_files[$view_id];
        $filepath = __DIR__ . '/files/' . $filename;

        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            $fileResult .= "<strong>File Content:</strong><pre>" . htmlspecialchars($content) . "</pre>";
        } else {
            $fileResult .= "<strong>خطأ:</strong> الملف غير موجود.";
        }
    } else {
        $fileResult .= "<strong>خطأ:</strong> لا يوجد ملف مرتبط بهذا المعرف.";
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
  <link rel="stylesheet" href="./css/low-acc.css">
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
    <h2 class="align-self-center">Medium Broken Access Control</h2>
    <div class="login-box" style="color:#00ff88;">
      <?php if (!isset($_SESSION['logged_in'])): ?>
        <h3>Login</h3>
        <form method="POST" class="form">
          <span class="input-span">
            <label for="Username" class="label">Username</label>
            <input type="text" name="Username" id="Username" required />
          </span>
          <span class="input-span">
            <label for="password" class="label">Password</label>
            <input type="password" name="password" id="password" required />
          </span>
          <input class="submit" type="submit" value="Log in" />
        </form>
      <?php else: ?>
        <div class="mb-2 text-center">
          <strong>Hi <?= htmlspecialchars($_SESSION['username']) ?> (ID: <?= $_SESSION['user_id'] ?>)</strong><br>
          <a href="?logout=true" class="btn btn-sm btn-outline-danger mt-2">Logout</a>
        </div>
        <form method="POST" class="form mt-3">
          <span class="input-span">
            <label for="file" class="label">Access User File by ID</label>
            <input type="text" name="file" id="file" required />
          </span>
          <input class="submit" type="submit" value="Show File" />
        </form>
      <?php endif; ?>

      <?php if ($showFile || $fileResult): ?>
        <div class="alert mt-4"><?= $fileResult ?></div>
      <?php endif; ?>
    </div>
  </div>

  <!-- JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
