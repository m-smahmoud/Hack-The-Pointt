<?php
$flagResult = "";

// تحميل API Key من ملف XML
$xmlFile = "config/sitemap.xml";

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    $realKey = (string) $xml->apikey;
} else {
    $realKey = ""; // fallback في حال الملف مش موجود
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInput = $_POST["name"] ?? "";

    if ($userInput === $realKey) {
        $flagResult = "<p style='color: green; font-weight: bold;'>✅ Correct API Key</p>";
    } else {
        $flagResult = "<p style='color: red; font-weight: bold;'>❌ Incorrect API Key</p>";
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
    <link rel="stylesheet" href="./css/med-inf.css" >
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
        <a href="./login.php" class="submit">Login</a>
      </div>
    </div>
<!-- <fakekey>hiusdhvidssdjvsdk</fakekey> -->
    <div class="login-container d-flex flex-column">
      <h2 class="align-self-center">Medium Level Information Disclosure</h2>
      <div class="login-box">
        <form method="POST" class="form">
           <span class="input-span">
            <label for="name" class="label">Enter The API KEY </label>
            <input type="text" name="name" id="name" required autocomplete="off"/>
          </span>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
<!--/config  -->
        <div class="mt-3">
          <?php echo $flagResult; ?>
        </div>
      </div>
    </div>
  

     <!-- <seckey>csjicsncnsociuass</seckey> -->
    <!-- Check The Xml Files in Website -->

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
