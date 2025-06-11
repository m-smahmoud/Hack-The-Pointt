<?php
// التحقق من اختيار مستوى الأمان وإعادة التوجيه للصفحة المناسبة
if (isset($_GET['level']) && isset($_GET['bug'])) {
    $bug = $_GET['bug'];
    $level = $_GET['level'];
    header("Location: {$bug}_{$level}.php");
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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/set.css" />
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
            <a href="feedback.php" class="links">Feedback</a>
          </div>
        </div>
        <a href="./login.html" class="submit">Login</a>
      </div>
    </div>

    <!-- About Us Section -->
    <div>
      <div class="about-section container">
        <h2>Set Security Level</h2>
        <p>Security Level is currently -----</p>
        <p>
          The security level changes the vulnerability level of
          <span>BUGS</span> :
        </p>
        
              <form class="d-flex flex-column align-items-start" method="get">
          
                <input type="hidden" name="bug" value="<?php echo isset($_GET['bug']) ? htmlspecialchars($_GET['bug']) : 'unknown'; ?>">
          <!-- From Uiverse.io by Smit-Prajapati -->
          <div class="radio-container">
            <input checked="" id="radio-free" name="level" value="high" type="radio" />
            
            <label for="radio-free">High</label>
            <input id="radio-basic"  name="level" value="medium" type="radio" />
            <label for="radio-basic">medium</label>
            <input id="radio-premium" name="level" value="low" type="radio" />
            <label for="radio-premium">Low</label>
            <div class="glider-container">
              <div class="glider"></div>
            </div>
          </div>
          <button type="submit" class="submit" style="margin-top: 15px;">Submit</button>
        </form>
      </div>
    </div>

    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
