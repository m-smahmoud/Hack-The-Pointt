<?php  
if (isset($_POST['Upload'])) {  
    $target_path = "hackpoint/myprofile/";  // هنا بتحط مسار مجلد حفظ الصور
    $target_path = $target_path . basename($_FILES['uploaded']['name']);  
    
    if (!move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {  
        echo '<pre>';
        echo '❌ Your image was not uploaded.';
        echo '</pre>';  
    } else {  
        echo '<pre>';  
        echo '✅ File uploaded successfully: ' . $target_path;
        echo '</pre>';       
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
      <a href="./login.html" class="submit">Logout</a>
    </div>
  </div>

  <div class="login-container">
    <div class="login-box">
      <form action="" method="POST" enctype="multipart/form-data" class="form">
        <span class="input-span">
          <label for="name" class="label">Student Name</label>
          <input type="text" name="name" id="name" required />
        </span>
        <span class="input-span">
          <label for="email" class="label">Email</label>
          <input type="email" name="email" id="email" required />
        </span>
        <span class="input-span">
          <label for="Pincode" class="label">Pincode</label>
          <input type="text" name="Pincode" id="Pincode" required />
        </span>
        <span class="input-span">
          <label for="uploaded" class="label custom-file-upload">Upload Photo</label>
          <input type="file" name="uploaded" id="uploaded" required />
        </span>
        <input class="submit" type="submit" value="Upload" name="Upload" style="margin-top: 15px;" />
      </form>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
