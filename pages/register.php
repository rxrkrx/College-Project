<!doctype html>
<html lang="en">

<head>
  <title>Applicant Register</title>
  <!-- Bootstrap core CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">

  <style>
    *{
      margin: 0;
      padding: 0;
    }
    body{
      background-color:green;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet">
</head>

<body class="text-center">

  <?php

  $data = "";
  include("../includes/config.php");
  if (isset($_POST["name"])) {
    //if (strcmp($_POST["password"], $_POST["cnfpassword"])) {
      if (check_email($_POST["email"]) == 0) {
        register_applicant($_POST["name"], $_POST["email"], $_POST["password"], $_POST["phoneno"]);
        $data = '<div class="alert alert-success" role="alert"> Account Created Successfully. Please Signin </div>';
      } else {
        $data = '<div class="alert alert-error" role="alert"> Account with entered E-Mail already exists! </div>';
      }
    /*} else {
      $data = '<div class="alert alert-warning" role="alert"> Password and Confirm Password do not match! </div>';
    }*/
  }
  ?>

  <main class="form-signin">
    <form action="register.php" method="POST"  autocomplete="off" onsubmit="return validate()">
      <!-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <!-- To Add Image at top in Login Page -->
      <h1 class="h2 mb-3 fw-normal">Applicant Register</h1>
      <br>
      <?php echo $data; ?>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingName" placeholder="" name="name">
        <label for="floatingName">Name</label>
        <p class="in1"></p>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="email_id" placeholder="name@example.com" name="email">
        <label for="email_id">Email address</label>
         <p class="in2"></p>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <label for="password">Password</label>
         <p class="in3"></p>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="cnfpassword">
        <label for="confirmPassword">Confirm Password</label>
         <p class="in4"></p>
      </div>
      <div class="form-floating">
        <input type="number" class="form-control" id="phoneNo" placeholder="Phone No." name="phoneno">
        <label for="phoneNo">Phone Number</label>
         <p class="in5"></p>
      </div>
      <input class="w-100 btn btn-lg btn-success" type="submit" value="Submit"/>
    </form>
  </main>
  <script src="validation.js"></script>
</body>

</html>




<!-- <form action="register.php" method="POST"  autocomplete="off" id="register_form">

      <h1 class="h2 mb-3 fw-normal">Applicant Register</h1>
      <br>
      <?php //echo $data; ?>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingName" placeholder="" name="name">
        <label for="floatingName">Name</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="cnfpassword">
        <label for="floatingPassword">Confirm Password</label>
      </div>
      <div class="form-floating">
        <input type="number" class="form-control" id="floatingPhoneNo" placeholder="Phone No." name="phoneno">
        <label for="floatingPhoneNo">Phone Number</label>
      </div>
      <button class="w-100 btn btn-lg btn-success" type="button" onclick="validate()">SignUp</button>
    </form> -->