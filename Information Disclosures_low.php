<?php
$flagResult = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $flag = $_POST["name"] ?? "";

    if ($flag === "HaCktHepOiNt") {
        $flagResult = "<p style='color: green; font-weight: bold;'>✅ Correct Flag</p>";
    } else {
        $flagResult = "<p style='color: red; font-weight: bold;'>❌ Incorrect Flag</p>";
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
    <link rel="stylesheet" href="./css/low-inf.css" >
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
      <h2 class="align-self-center">Low Level Information Disclosure</h2>
      <div class="login-box">
        <form method="post" class="form">
           <span class="input-span">
            <label for="name" class="label">Enter The Flag</label>
            <input type="text" name="name" id="name" required placeholder="Hint: Flag In This Page" autocomplete="off"
          /></span>
          <!-- Flag = HaCktHepOiNt -->
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>

        <!-- عرض نتيجة الفلاج -->
        <div class="mt-3">
          <?php echo $flagResult; ?>
        </div>
      </div>
    </div>
  
    <!-- Font Awesome (for icons) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
