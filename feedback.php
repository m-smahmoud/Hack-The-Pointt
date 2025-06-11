<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/feedback.css" />
    <title>Hack The Point</title>
  </head>
  <body>
    <!-- Header with Logo & Site Name -->
    <div class="header">
      <div class="container d-flex justify-content-between align-items-center">
        <img src="imge/image2.png" />
        <div>
          <div class="nav-bar">
            <a href="home.php" class="links">Home</a>
            <a href="my-profile.php" class="links">My Profile</a>
            <a href="bugs.php" class="links">Bugs</a>
            <a href="feedback.php" class="links active">Feedback</a>
          </div>
        </div>
        <a href="logout.php" class="submit">Logout</a>
      </div>
    </div>

    <!-- Feedback Form -->
    <div class="login-container">
      <div class="login-box">
        <form action="home.php" method="post" class="form">
          <span class="input-span">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" required />
          </span>
          <span class="input-span">
            <label for="email" class="label">Email</label>
            <input type="email" name="email" id="email" required />
          </span>
          <span class="input-span">
            <label for="feedback" class="label">Your Feedback</label>
            <textarea name="feedback" id="feedback" rows="4" required></textarea>
          </span>
          <input class="submit" type="submit" value="Submit" />
        </form>
      </div>
    </div>

    <h2 id="typewriter" style="color: #00ff88; text-align: center; font-size: 2rem; margin-top: 30px;"></h2>
    <script>
      const texts = ["You tested it. Now rate it", "You tested it. Now rate it", "You tested it. Now rate it"];
      let count = 0;
      let index = 0;
      let currentText = '';
      let letter = '';

      (function type() {
        if (count === texts.length) { count = 0; }
        currentText = texts[count];
        letter = currentText.slice(0, ++index);

        document.getElementById('typewriter').textContent = letter;
        if (letter.length === currentText.length) {
          count++;
          index = 0;
          setTimeout(type, 1000);
        } else {
          setTimeout(type, 100);
        }
      })();
    </script>

    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
