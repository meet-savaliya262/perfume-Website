<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login and signup Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css ">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/loginpage.css">
  
</head>
<body>
  

<div class="login-container">
  <div class="login-info">
    <h2>Welcome to Sugandhak Perfume</h2>
    <p>Discover pur perfume and shop the finest fragrances with elegance</p>
  </div>

  <div class="login-forms">
    <a href="index.php" class="close-btn" title="Back to Home"><i class="fas fa-times"></i></a>

    <div class="form-toggle">
      <button id="loginBtn" class="active" onclick="toggleForm('login')">Login</button> |
      <button id="signupBtn" onclick="toggleForm('signup')">Sign Up</button>
    </div>

    <!-- login -->
    <?php
      if(isset($_SESSION['wrongpass'])) 
      {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  '.$_SESSION['wrongpass'].'
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
                </div>';
          unset($_SESSION['wrongpass']);
      }
    ?>
    <div id="login-form" class="form-section active">
      <h4 class="text-center mb-4">Log In to Your Account</h4>
      <form action="login_process.php" method="post">

      

        <div class="form-group">
          <i class="fa fa-envelope"></i>
          <input type="email" class="form-control" name="login_email" placeholder="Email" required>
        </div>
       
        <div class="form-group">
          <i class="fa fa-lock"></i>
          <input type="password" class="form-control" name="login_password" placeholder="Password" required>
        </div>    

        <button type="submit" class="btn btn-primary">Log In</button>
        <?php
            if(! empty($_SESSION['error']))
            {
                unset($_SESSION['error']);
            }
        ?>
        
        <br /><br />
        <!-- <div class="form-group text-right">
          <a href="forgot_password.php" class="text-muted">Forgot Password?</a>
        </div> -->
      </form>
    </div>

    <!-- signup -->
 
    <div id="signup-form" class="form-section">
      <h4 class="text-center mb-4">Create a New Account</h4>
      <form action="signup_process.php" method="post">
        <div class="form-group">
          <i class="fa fa-user"></i>
          <input type="text" class="form-control" name="fnm" placeholder="Full Name" required>
        </div>
        <div class="form-group">
          <i class="fa fa-envelope"></i>
          <input type="email" class="form-control" name="email"  placeholder="Email" required>
        </div>
        <div class="form-group">
          <i class="fa fa-phone"></i>
          <input type="text" class="form-control" name="mno"  placeholder="Mobile no" maxlength="10" required>
        </div>
        <div class="form-group">
          <i class="fa fa-lock"></i>
          <input type="password" class="form-control" name="pwd" placeholder="Password" required>
        </div>
        <div class="form-group">
          <i class="fa fa-lock"></i>
          <input type="password" class="form-control" name="cpwd"  placeholder="Retype-Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
    </div>
  </div>
</div>

<script>
  function toggleForm(type) {
    document.getElementById('login-form').classList.remove('active');
    document.getElementById('signup-form').classList.remove('active');
    document.getElementById(type + '-form').classList.add('active');
  }
</script>

</body>
</html>
