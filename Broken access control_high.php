<?php
session_start();

$users = [
    'user1' => ['password' => 'pass1', 'id' => 1],
    'user2' => ['password' => 'pass2', 'id' => 2],
    'user3' => ['password' => 'pass3', 'id' => 3],
    'user4' => ['password' => 'pass4', 'id' => 4],
    'admin' => ['password' => 'admin123', 'id' => 40],
];

// تسجيل الخروج
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: Broken access control_high.php");
    exit;
}

// تسجيل الدخول
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Username'], $_POST['password'])) {
    $u = $_POST['Username'];
    $p = $_POST['password'];
    if (isset($users[$u]) && $users[$u]['password'] === $p) {
        $_SESSION['user'] = $u;
        $_SESSION['id'] = $users[$u]['id'];
        header("Location: Broken access control_high.php?id=" . $_SESSION['id']);
        exit;
    } else {
        $error = "❌ اسم المستخدم أو كلمة المرور غير صحيحة.";
    }
}

// عرض الملف بناءً على ID في الرابط
$content = "";
if (isset($_GET['id'])) {
    $files = [
        1 => 'user1_profile.txt',
        2 => 'user2_profile.txt',
        3 => 'user3_profile.txt',
        4 => 'user4_profile.txt',
        40 => 'admin_secret_document.txt'
    ];

    $id = $_GET['id'];
    $fileResult = "<strong>📎 طلب عرض ملف للمستخدم ID:</strong> " . htmlspecialchars($id) . "<hr>";

    if (isset($files[$id])) {
        $filepath = __DIR__ . '/files/' . $files[$id];
        if (file_exists($filepath)) {
            $data = file_get_contents($filepath);
            $fileResult .= "<strong>📄 محتوى الملف:</strong><pre>" . htmlspecialchars($data) . "</pre>";
        } else {
            $fileResult .= "⚠️ الملف غير موجود.";
        }
        $content = $fileResult;
    } else {
        $content = "⚠️ لا يوجد ملف مرتبط بهذا المعرف.";
    }
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
    <link rel="stylesheet" href="./css/low-acc.css" />
    <title>Hack The Point</title>
    <style>
      .form input[type="text"] {
    border-radius: 0.5rem;
    padding: 1rem 0.75rem;
    width: 100%;
    border: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #00ff88;
    background-color: var(--clr-alpha);
    outline: 2px solid var(--bg-dark);}
    .form .submit{
justify-content: center;
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
      <h2 class="align-self-center">High Broken Access Control</h2>

      <?php if (!isset($_SESSION['user'])): ?>
        <div class="login-box" >
          <h3>Login</h3>
          <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
          <?php endif; ?>
          <form method="post" class="form">
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
        </div>
      <?php else: ?>
        <div style="color:#00ff88;" class="login-box text-center">
          <strong>Hi <?= htmlspecialchars($_SESSION['user']) ?> (ID: <?= $_SESSION['id'] ?>)</strong><br>
          <a href="?logout=1" class="btn btn-sm btn-outline-danger mt-2">Logout</a>
          <div class=" text-start p-2"><?= $content ?></div>

          <div class="mt-3">
            <form method="get" class="form">
               <input type="text" name="id" id="username" required />
              <button type="submit" class="submit ">Show File</button>
            </form>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
