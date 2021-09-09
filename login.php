<!DOCTYPE html>
<html>
<head>
<title>Virtual Gift4U.com</title>
    <link rel="icon" href="images/olive.png">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section>
    <div class="logincontainer">
      <div class="row">
        <div class="column">
          <img src="images/klccoverlay.jpg" width="100%" height="100%">
          <div class="center">
            <p><img src="images/olive.png" width="30%"></p>
            <h1>Welcome friend!</h1> 
            <p><b>New here? <br>Sign Up for free now to start a journey with us!</b></p>
            <p><button type="button" class="signupbtn" onclick="window.location.href='register.php'">Sign Up</button></p>
          </div>
        </div>

        <div class="column">
          <form action="includes/login_action.php" method="post">
          <span class="close" onclick="window.location.href='homepage.php'">&times;</span>
          <center><br><br><br><h2>Sign In to Virtual Gift4U</h2><hr><br><br></center>
            <img src="images/usr.png" width="5%"> 
              <label for="uname"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>
              <br><br>
              <img src="images/locked.png" width="3%"> 
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" required>
              <br><br>
              <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
              <button type="submit"  name="btnLogin">Login</a></button>
              <span class="psw">Forgot <a href="forgotpassword.php">password?</a></span>

            </form>
        </div>

      </div>
    </div>
</section>
</body>
</html>
