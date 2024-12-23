<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['email'])) {
  header('Location:index.php');
  exit;
}

require_once 'LoginControll.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Login</title>
</head>

<body>
  <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <section>
      <div class="login">
        <h1 class="input-login">Log In</h1>
        <div class="input-container">
          <div class="icon-container">
            <img src="assets/images/emailIcon.png" width="24px" height="24px" />
          </div>
          <input type="email" placeholder="Email" id="email" name="email" />
        </div>
        <span id="emailError" class="error"></span>
        <div class="input-container">
          <div class="icon-container">
            <img src="assets/images/passwordIcon.png" width="24px" height="24px" />
          </div>
          <input type="password" placeholder="Password" id="password" name="password" />
        </div>
        <span id="passwordError" class="error"></span>
        <div>
          <input type="submit" class="signBtn" value="Login" name="loginBtn" />
        </div>
        <div class="remember">
          <input type="checkbox" id="rememberMe" style="color: white" />Remember Me
        </div>
        <div class="options">
          <p>Don't have a account <a href="signin.php">Register</a></p>
        </div>
      </div>
    </section>
  </form>
  <script src="script.js"></script>
</body>

</html>