<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Eventrix | Log in</title>
  <link rel="shortcut icon" href="./dist/img/eventrix.png">
  <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>

  .login-box {
    background: transparent; /* Set the form background to transparent */
    animation: fadeInUp 0.8s ease-out; /* Add fade-in and slide-up animation */
    border-radius: 10px; /* Round the corners of the login box */
    overflow: hidden; /* Hide overflow to ensure rounded corners */
    backdrop-filter: blur(10px); /* Apply backdrop filter for blur effect */
    background-blur: 10px; /* Fallback for browsers that don't support backdrop-filter */
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .login-box form {
    background: rgba(255,255, 255, 0);
    padding: 20px;
    border-radius: 10px; 
	height:300px;/* Round the corners of the form */
  }

  .login-box-msg,
  .login-logo {
    color: #fff; /* Set text color to white or a color that suits your design */
  }

  .input-group {
    border-radius: 5px; /* Round the corners of the input fields */
  }
   video {
    object-fit: cover;
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
	
    left: 0;
    z-index: -1;
  }
  </style>
</head>

<body class="hold-transition login-page">
<video autoplay loop muted playsinline id="bgVideo">
  <source src="./dist/img/viii.mp4" type="video/mp4">
</video>
  <div class="login-box">
    <div class="login-logo">
      <img class='w-25' src="./dist/img/eventrix.png" alt="indoarsip-logo" style='border-radius:50px;'><br>
      <strong>Login to continue on this page</strong></a>
      <hr>
    </div>
    <!-- /.login-logo -->
    <div class="form-group">
      <form action="./include/login.php" method="post">
        <p class="login-box-msg">Log in </p>
        <div class="input-group mb-3">
          <input type="text" name='username' class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name='password' class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
             <?php 
              if (isset($_SESSION['error']) and !empty($_SESSION['error'])) {
                echo "<script>alert('Fail! ".$_SESSION['error']."');</script>";
                $_SESSION['error']="";
              }
              ?> 
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  </body>
</html>
