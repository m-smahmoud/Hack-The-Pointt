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
            <a href="bugs.php" class="links">Bugs</a>
            <a href="feedback.php" class="links">Feedback</a>
          </div>
        </div>
        <a href="./login.php" class="submit">Logout</a>
      </div>
    </div>

    <div class="login-container d-flex flex-column">>
      <h2 class="align-self-center">Medium Level Business Logic</h2>
      <div class="login-box">
        <h3 class="align-self-center">Login</h3>
        <form action="home.php" class="form">
          <span class="input-span">
            <label for="name" class="label">Username</label>
            <input type="text" name="name" id="name" required />
          </span>
          <span class="input-span">
            <label for="password" class="label">Password</label>
            <input type="password" name="password" id="password" required />
          </span>
          <input class="submit" type="submit" value="Login" />
        </form>
      </div>
    </div>

    <!-- منع كليك يمين واختصارات لوحة المفاتيح لفحص الصفحة -->
    <script>
      // منع كليك يمين
      document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
      });

      // منع اختصارات المطورين (F12, Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U)
      document.onkeydown = function(e) {
        if (
          e.keyCode == 123 || // F12
          (e.ctrlKey && e.shiftKey && (e.keyCode == 73 || e.keyCode == 74)) || // Ctrl+Shift+I or Ctrl+Shift+J
          (e.ctrlKey && e.keyCode == 85) // Ctrl+U
        ) {
          return false;
        }
      };
    </script>

    <!-- Font Awesome (for icons) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
