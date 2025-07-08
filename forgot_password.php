<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      font-family: 'Segoe UI', sans-serif;
    }
    .forgot-container {
      max-width: 400px;
      margin: 80px auto;
      background: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
    .forgot-container h3 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    .form-control {
      border-radius: 30px;
    }
    .btn-custom {
      background-color: #2575fc;
      color: #fff;
      border-radius: 30px;
      font-weight: bold;
      transition: 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #1a5edb;
    }
    .back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #555;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="forgot-container">
    <h3>🔐 Forgot Password</h3>

    <?php
    if (isset($_SESSION['forgot_error'])) {
        echo '<div class="alert alert-danger">'.$_SESSION['forgot_error'].'</div>';
        unset($_SESSION['forgot_error']);
    }

    if (isset($_SESSION['forgot_success'])) {
        echo '<div class="alert alert-success">'.$_SESSION['forgot_success'].'</div>';
        unset($_SESSION['forgot_success']);
    }
    ?>

    <form action="forgot_password_process.php" method="post">
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <button type="submit" class="btn btn-custom btn-block">Send Reset Link</button>
    </form>

    <a href="login.php" class="back-link">← Back to Login</a>
  </div>

</body>
</html>