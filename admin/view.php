<?php
  include_once("../includes/config.php");
  session_handle();?>
  <html>

<head>
  <title>View</title>
  <!-- Bootstrap core CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="css/sidebar.css" rel="stylesheet">
</head>

<body>
  <?php include("sidebar.php"); ?>
  <div class="container">
    <?php
    if (isset($_GET['id'])) {
      if (isset($_GET['user'])) {
        if ($_GET['user'] === 'teacher') {
          $id = $_GET["id"];
          if (isset($_POST["name"])) {
            $return_data = profile_update_teacher($id, $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["about"], $_POST["department"]);
            if ($return_data === 1) {
              echo '<div class="alert alert-success" role="alert">Profile Updated Successfully!</div>';
            } else {
              echo '<div class="alert alert-error" role="alert">Error Occured!</div>';
            }
          }
          echo '<form class="form" method="POST">';
          view_teacher($_GET["id"]);
          echo '</form>';
        } elseif ($_GET['user'] === 'applicant') {
          view_applicant($_GET["id"]);
        } elseif ($_GET['user'] === 'student') {
          view_student($_GET["id"]);
        }
      }
    }
    ?>
</body>
</html>