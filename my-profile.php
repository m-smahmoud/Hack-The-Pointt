<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/my-profile.css" />
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
            <a href="my-profile.php" class="links active">My Profile</a>
            <a href="bugs.php" class="links">Bugs</a>
            <a href="feedback.php" class="links">Feedback</a>
          </div>
        </div>
        <a href="./login.php" class="submit">Logout</a>
      </div>
    </div>

    <div class="login-container">
      <div class="login-box">
        <form action="home.html" class="form">
          <span class="input-span">
            <label for="name" class="label">Student Name</label>
            <input type="text" name="name" id="name" required
          /></span>
          <span class="input-span">
            <label for="email" class="label">Email</label>
            <input type="email" name="email" id="email" required
          /></span>
          <span class="input-span">
            <label for="pincode" class="label">Pincode</label>
            <input type="text" name="Pincode" id="Pincode" required
          /></span>
          <span class="input-span">
            <label for="file-upload" class="label custom-file-upload">Upload Photo</label>
            <input type="file" id="file-upload" required />
          </span>
          <input class="submit" type="submit" value="Submit" style="margin-top: 15px;"/>
        </form>
      </div>
    </div>









    <!-- Font Awesome (for icons) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="JS/all.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
