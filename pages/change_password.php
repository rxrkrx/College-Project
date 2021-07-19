<?php include_once("../includes/config.php");
session_handle(); ?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link href="css/sidebar.css" rel="stylesheet"> -->
    <title>Change Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .outer_container {
            width: 100%;
            height: 100vh;
            background-color: #e6e6ff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .inner_container {
            border: 1px solid black;
            padding: 3rem;
            background-color: #fff;
        }

        .btn {
            float: right;
            width: 10rem;
        }

        .btn:hover {
            background-color: black;
            color: white;
        }

        img {
            float: right;
            margin-bottom: 0.5rem;
        }

        input[type="password"] {
            border: 0.5px solid black;
            opacity: 0.3;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div class="outer_container">
        <?php if (isset($_POST["password"])) {
            if (isset($_SESSION["teacher_id"])) {
                $id = (isset($_SESSION["teacher_id"])) ? $_SESSION["teacher_id"] : "";
                $user_type = "teacher";
            } else if (isset($_SESSION["student_id"])) {
                $id = (isset($_SESSION["student_id"])) ? $_SESSION["student_id"] : "";
                $user_type = "student";
            }
            $return_data = password_update($id, $_POST["password"], $user_type); //$_POST["user_type"])
            if ($return_data === 1) {
                echo '<div class="alert alert-success" role="alert">Password Changed Successfully!</div>';
            } else {
                echo '<div class="alert alert-error" role="alert">Error Occured!</div>';
            }
        }
        ?>
        <div class="inner_container">
            <img src="undraw_Security_on_re_e491.svg" alt="password" width="20%" height="20%" />
            <form method="POST">
                <label for="inputPassword5" class="form-label" style="font-weight:bold;font-size:2rem;">Password</label>
                <input type="password" id="inputPassword5" class="form-control" name="password" aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>

                <br>
                <button type="submit" class="btn btn-success">Change Password</button>
            </form>
        </div>

    </div>
</body>

</html>