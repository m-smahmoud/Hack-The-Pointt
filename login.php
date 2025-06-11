<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "بيانات الدخول غير صحيحة.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="imge/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/login.css" />
  <title>Hack The Point - Login</title>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <div class="text-center">
        <div class="logo">
          <img src="imge/logo.png222.png" alt="logo" style="width: 227px;" />
        </div>
        <p>To get started, you need to login here.</p>
      </div>

      <form action="login.php" method="post" class="form">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger text-center"><?php echo $error; ?></div>
        <?php endif; ?>

        <span class="input-span">
          <label for="username" class="label">Username</label>
          <input type="text" name="username" id="username" required />
        </span>

        <span class="input-span">
          <label for="password" class="label">Password</label>
          <input type="password" name="password" id="password" required />
        </span>

        <span class="span"><a href="#">Forgot password?</a></span>
        <input class="submit" type="submit" value="Log in" />
        <span class="span">Don't have an account? <a href="#">Sign up</a></span>
      </form>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
  <script src="JS/all.min.js"></script>
</body>
</html>
