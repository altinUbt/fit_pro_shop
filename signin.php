<?php

include_once 'signinControll.php'

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <title>SignIn</title>
</head>

<body>
  <section>
    <div class="login">
      <h1 class="input-signIn">SignIn</h1>
      <p>Create account</p>
      <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="input-container">
          <img src="assets/images/userIcon.png" width="24px" height="24px" />
          <input type="text" placeholder="Username" id="username" name="username" />
        </div>
        <div class="input-container">
          <img src="assets/images/emailIcon.png" width="24px" height="24px" />
          <input type="email" placeholder="Email" id="email" name="email" />
          <span id="emailError" class="error"></span>
        </div>
        <div class="input-container">
          <img src="assets/images/passwordIcon.png" width="24px" height="24px" />
          <input type="password" placeholder="Password" id="password" name="password" />
          <span id="passwordError" class="error"></span>
        </div>
        <div>
          <!-- <button class="button">Sign In</button> -->
          <input class="signBtn" type="submit" value="SignUp" name="signinBtn">
        </div>
        <p>Already have a account <a href="login.php">Login</a></p>
    </div>
  </section>
  </form>
  <script src="script.js"></script>
</body>

</html>