<!DOCTYPE html>
<html>
<head>
<title>Virtual Gift4U.com</title>
    <link rel="icon" href="images/olive.png">
    <link rel="stylesheet"href="css/style.css"type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<section>
    <div class="logincontainer">
      <div class="row">
        <div class="column">
          <img src="images/kltower.jpg" width="100%" height="100%">
          <div class="center">
            <p><img src="images/olive.png" width="30%"></p>
            <h1>Thank you friend!</h1> 
            <p><b>Already part of us? <br>Keep updated with us by signing in!</b></p>
            <p><button type="button" class="signupbtn" onclick="window.location.href='login.php'">Sign In</button></p>
          </div>
        </div>

        <div class="column">
          <form action="includes/register_action.php" method="post">
          <span class="close" onclick="window.location.href='homepage.php'">&times;</span>
          <center><h2>Sign Up to Virtual Gift4U</h2><hr></center>
          <center>Please fill in this form to create an account.</center>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>
			  
		  <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>	  

          <label for="psw"><b>Password</b></label>
          <label class="pswdesc">Must contain at least one number and one uppercase and lowercase letter, and minimum 8 character</label>
          <input type="password" placeholder="Enter Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="pswrepeat"  minlength="8" required>
    
          <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

              <button type="submit" name="btnRegister">Sign Up</a></button>
            </form>
        </div>

      </div>
    </div>
</section>

</body>
</html>
