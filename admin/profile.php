<?php include_once("../includes/config.php");
session_handle(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/sidebar.css" rel="stylesheet">
</head>

<body>
    <?php include_once "sidebar.php"; ?>
    <div class="container">
        <?php
        $id = (isset($_SESSION["admin_id"])) ? $_SESSION["admin_id"] : "";
        if (isset($_POST["name"])) {
            $return_data = profile_update_admin($id, $_POST["name"], $_POST["email"], $_POST["username"]);
            if ($return_data === 1) {
                echo '<div class="alert alert-success" role="alert">Profile Updated Successfully!</div>';
            } else {
                echo '<div class="alert alert-error" role="alert">Error Occured!</div>';
            }
        }
        ?>
        

        <form method="POST">
            <h2>Profile</h2>
            <hr style="width: 80%;">

            <?php if (isset($_SESSION["admin_id"])) {
                edit_profile($_SESSION["admin_id"]);
            } ?>
            <br>

            <button type="submit" class="btn btn-primary">Save</button>
    </div>
</body>

</html>