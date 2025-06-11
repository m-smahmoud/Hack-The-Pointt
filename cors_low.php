<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="./css/bug-login.css" >
  <title>Hack The Point - CORS Low</title>
</head>
<body>
  <div class="header">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="imge/image2.png" />
      <div class="nav-bar">
        <a href="home.php" class="links">Home</a>
        <a href="my-profile.php" class="links">My Profile</a>
        <a href="bugs.php" class="links active">Bugs</a>
        <a href="set.php" class="links">Set Security Level</a>
        <a href="feedback.php" class="links">Feedback</a>
      </div>
      <a href="./login.php" class="submit">Logout</a>
    </div>
  </div>

  <div class="login-container">
    <div class="login-box">
      <h2 class="align-self-center">CORS - Low Level</h2>
      <p>تم إعداد هذه الصفحة لتوضيح ثغرة Cross-Origin Resource Sharing.</p>
      <button onclick="exploitCORS()" class="submit">Send CORS Request</button>
      <pre id="result"></pre>
    </div>
  </div>

  <script>
    function exploitCORS() {
      fetch("http://localhost/myproject/cors-low-api.php", {
        method: 'GET',
        credentials: 'include'
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById("result").textContent = "✅ تم استغلال الثغرة:\n" + JSON.stringify(data, null, 2);
      })
      .catch(error => {
        document.getElementById("result").textContent = "❌ فشل الطلب: " + error;
      });
    }
  </script>

  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
