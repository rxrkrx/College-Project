<?php include_once("../includes/config.php");
session_handle(); ?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/sidebar.css" rel="stylesheet">
    <style>
        body{
            background-color:lightgrey;
        }
        .container{
            display:grid;
            place-items:center;
        }
        .btn-success:hover{
            background-color:white;
            border:1px solid green;
            color:black;
            transition:1s;
        }
        .form-label{
            font-weight:bold;
        }

    </style>
</head>

<body>
    <?php include("sidebar.php"); ?>
    <div class="container">
        <?php if (isset($_POST["password"])) {
            $id =(isset($_SESSION["admin_id"]))?$_SESSION["admin_id"]:"";
            $user_type = "admin";
            $return_data = password_update($id, $_POST["password"], $user_type); //$_POST["user_type"])
            if ($return_data === 1) {
                echo '<div class="alert alert-success" role="alert">Password Changed Successfully!</div>';
            } else {
                echo '<div class="alert alert-error" role="alert">Error Occured!</div>';
            }
        }
        ?>
        <form method="POST">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" name="password" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float:right;">Change Password</button>
        </form>
    </div>
</body>

</html>