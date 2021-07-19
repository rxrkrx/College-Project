<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
    <!-- Custom styles for this template -->
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

<body class="text-center w-25pc h-1by1 pattern-diagonal-stripes-md white bg-blue"> 
<!--<body>-->
<div id="particles-js"></div>
    
    <?php
    $data = "";
    $result = "";
    if (isset($_POST["email"]) && isset($_POST["role_select"])) {
        include("../includes/config.php");
        if ($_POST["role_select"] == "applicant") {
            $result = check_login($_POST["email"], $_POST["password"]);
        } elseif ($_POST["role_select"] == "teacher") {
            $result =  check_login($_POST["email"], $_POST["password"], "teacher");
        } elseif ($_POST["role_select"] == "student") {
            $result =  check_login($_POST["email"], $_POST["password"], "student");
        } else {
            echo " Error Occured";
        }

        if ($result == -1) {
            $data = '<div style="color:red;" role="alert">Invalid Username or Password Entered! </div><br>';
        } else {
            session_handle($_POST["role_select"], $result);
            echo("<script>location.href = 'dashboard.php';</script>");
            //header('Location: dashboard.php'); //?id=' . $result);
            exit();
        }
    }
    ?>
    
    <main class="form-signin">
        <form method="POST" style="position:relative ;background-color: white; padding:1.5rem; border-radius:15px">
            <h1 class="h2 mb-3 fw-normal">Login</h1>
            <div class="bg-primary" style="height: 5px; width:100%; border-radius: 2px;"></div>
            <br>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="role_select" id="btnradio1" autocomplete="off" value="applicant" checked>
                <label class="btn btn-outline-primary" for="btnradio1">Applicant</label>

                <input type="radio" class="btn-check" name="role_select" id="btnradio2" autocomplete="off" value="student">
                <label class="btn btn-outline-primary" for="btnradio2">Student</label>

                <input type="radio" class="btn-check" name="role_select" id="btnradio3" autocomplete="off" value="teacher">
                <label class="btn btn-outline-primary" for="btnradio3">Teacher</label>
            </div>
            <br><br>
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