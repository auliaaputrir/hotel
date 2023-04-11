<?php 
  session_start();

  require 'functions.php';

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $result = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);

      if($password === $row['password']){
            session_start();
            $_SESSION['username']=$row['username'];
            $_SESSION['idpgw']=$row['idpgw'];

            header('location: dashboard.php');
            //silakan buat session dan redirect disini

        }
    }
    $error = true;
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Admin Hotel Del Luna</title>

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="fontawesome/css/all.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post">
  <i class="fas fa-spa fa-5x"></i>
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="username" class="sr-only">Username</label>
  <input type="username" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
  <label for="password" class="sr-only">Password</label>
  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" name="login" id="login" value="login" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
</form>
</body>
</html>
