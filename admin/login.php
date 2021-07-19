<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <title>Admin Login</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <style>
    body {
      margin: 0;
      font-family: 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    #particles-js {
      background: #1774b6;
      position: absolute;
      height: 100%;
      width: 100%;
    }
  </style>

  <link href="css/styles.css" rel="stylesheet">
</head>

<body class="text-center">
  <div id="particles-js"></div>

  <?php
  $data = "";
  if (isset($_POST["email"])) {

    include("../includes/config.php");
    $result = check_login($_POST["email"], $_POST["password"], "admin");
    if ($result == -1) {
      $data = '<div style="color:red;" role="alert">Invalid Username or Password Entered! </div><br>';
    } else {
      session_handle("admin", $result);
      echo("<script>location.href = 'dashboard.php';</script>");
      //header('Location: dashboard.php'); //?id=' . $result);
      exit();
    }
  }
  ?>
  <main class="form-signin">
    <form method="POST" style="position:relative ;background-color: white; padding:1.5rem; border-radius:15px">
      <h1 class="h2 mb-3 fw-normal">Admin Login</h1>
      <?php echo $data; ?>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <br>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <script src="/app.js"></script>
</body>

</html>