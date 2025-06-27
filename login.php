<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login and signup Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css ">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #cfd8dc, #eceff1);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      width: 900px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      display: flex;
      overflow: hidden;
    }

    .login-info {
      background: url('products_image/1749386621_p2.png') center center/cover no-repeat;
      position: relative;
      color: white;
      padding: 50px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
      overflow: hidden;
    }

    .login-info::before {
      content: "";
      position: absolute;
      inset: 0;
      backdrop-filter: blur(6px);
      background-color: rgba(0, 0, 0, 0.4); /* dark overlay */
      z-index: 0;
    }

    .login-info h2,
    .login-info p {
      position: relative;
      z-index: 1;
    }

    .login-info h2 {
      font-weight: 700;
      font-size:34px;
      margin-bottom: 15px;
    }

    .login-info p {
      color: #e0e0e0;
    }

    .login-forms {
      flex: 1;
      padding: 40px;
      position: relative;
    }

    .form-toggle {
      text-align: center;
      margin-bottom: 25px;
    }

    .form-toggle button {
      border: none;
      background: transparent;
      font-weight: bold;
      font-size: 18px;
      color: #37474F;
      cursor: pointer;
      margin: 0 10px;
      transition: 0.3s;
    }

    .form-toggle button:hover {
      color: #FFB300;
      border-bottom: 2px solid #FFB300;
      border-radius: 4px;
    }

    .form-section {
      display: none;
      animation: fadeIn 0.5s ease-in-out;
    }

    .form-section.active {
      display: block;
    }

    .form-group {
      position: relative;
      margin-bottom: 25px;
    }

    .form-group i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
    }

    .form-control {
      padding-left: 35px;
      height: 45px;
      border-radius: 6px;
      width:100%;
    }

    .btn-primary {
      background-color: #FFB300;
      border: none;
      width: 100%;
      color: #37474F;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #ffa000;
    }

    .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 22px;
      color: #888;
      text-decoration: none;
    }

    .close-btn:hover {
      color: #FFB300;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }

    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
        width: 90%;
      }

      .login-info {
        padding: 30px;
        min-height: 200px;
      }
    }
  </style>
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


    <div id="login-form" class="form-section active">
      <h4 class="text-center mb-4">Log In to Your Account</h4>
      <form>
        <div class="form-group">
          <i class="fa fa-envelope"></i>
          <input type="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <i class="fa fa-lock"></i>
          <input type="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Log In</button>
      </form>
    </div>

    <div id="signup-form" class="form-section">
      <h4 class="text-center mb-4">Create a New Account</h4>
      <form action="login-register_process.php" method="post">
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
