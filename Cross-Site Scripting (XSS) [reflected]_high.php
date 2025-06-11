<?php
$search_term = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./imge/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/sql.css"> <!-- نفس CSS تبع Low -->
  <title>XSS High | Hack The Point</title>
</head>
<body>
  <div class="header">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="imge/image2.png" />
      <div class="nav-bar">
        <a href="home.php" class="links">Home</a>
        <a href="my-profile.php" class="links">My Profile</a>
        <a href="bugs.php" class="links active">Bugs</a>
        <a href="feedback.php" class="links">Feedback</a>
      </div>
      <a href="login.php" class="submit">Logout</a>
    </div>
  </div>

  <div class="login-container d-flex flex-column">
    <h2 class="align-self-center">High Level XSS</h2>
    <div class="login-box">
      <form method="get" action="Cross-Site Scripting (XSS) [reflected]_high.php" class="form">
        <div class="navbar-container">
          <div class="search-bar">
            <div class="InputContainer">
              <svg class="searchIcon" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M15.5 14h-.79l-.28-.27A6.518 6.518 0 0 0 16 9.5
                  6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5
                  4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5
                  9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
              </svg>
              <input
                class="input"
                id="search-input"
                name="search"
                placeholder="Search..."
                type="text"
                required
              />
            </div>
          </div>
        </div>
      </form>

      <div class="result mt-4" id="output"></div>
    </div>
  </div>

  <script>
    // DOM-based XSS
    const params = new URLSearchParams(window.location.search);
    const search = params.get('search');
    if (search) {
      document.getElementById('output').innerHTML = "You searched for: " + search;
    }
  </script>

  <script src="JS/all.min.js"></script>
  <script src="JS/bootstrap.bundle.min.js"></script>
</body>
</html>
