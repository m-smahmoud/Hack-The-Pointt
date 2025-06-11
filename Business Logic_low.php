<?php
session_start();

$correct_username = "admin";
$correct_password = "123456";
$lock_time = 30;

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['lockout_time'])) {
    $_SESSION['lockout_time'] = 0;
}

$lock_message = "";
$login_message = "";

if ($_SESSION['login_attempts'] >= 3) {
    $remaining = $_SESSION['lockout_time'] - time();
    if ($remaining > 0) {
        $lock_message = "🚫 Account is temporarily locked. Please try again after $remaining seconds.";
    } else {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($lock_message)) {
    $username = $_POST['Username'];
    $password = $_POST['password'];

    if ($username === $correct_username && $password === $correct_password) {
        $login_message = "✅ Welcome $username! Login successful.";
        $_SESSION['login_attempts'] = 0;
    } else {
        $_SESSION['login_attempts'] += 1;

        if ($_SESSION['login_attempts'] >= 3) {
            $_SESSION['lockout_time'] = time() + $lock_time;
            $login_message = "❌ Too many failed attempts. Your account is locked for $lock_time seconds.";
        } else {
            $remaining_attempts = 3 - $_SESSION['login_attempts'];
            $login_message = "❌ Incorrect username or password. $remaining_attempts attempt(s) remaining.";
        }
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
      .form input[type="text"], .form input[type="password"] {
        border-radius: 0.5rem;
        padding: 1rem 0.75rem;
        width: 100%;
        border: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #00ff88;
        background-color: var(--clr-alpha);
        outline: 2px solid var(--bg-dark);
      }
      .form .submit {
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
      <h2 class="align-self-center">Low Level Business Logic</h2>
      <div class="login-box">
        <h3>Login</h3>

        <?php if (!empty($lock_message)) : ?>
          <div class="alert alert-danger text-center"><?= $lock_message ?></div>
        <?php elseif (!empty($login_message)) : ?>
          <div class="alert text-center" style="color:<?= strpos($login_message, 'Welcome') !== false ? 'green' : 'red'; ?>;">
            <?= $login_message ?>
          </div>
        <?php endif; ?>

        <?php if (empty($lock_message)) : ?>
          <form method="POST" class="form">
            <span class="input-span">
              <label for="Username" class="label">Username</label>
              <input type="text" name="Username" id="Username" required />
            </span>
            <span class="input-span">
              <label for="password" class="label">Password</label>
              <input type="password" name="password" id="password" required />
            </span>
            <input class="submit mt-3" type="submit" value="Log in" />
          </form>
        <?php endif; ?>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
