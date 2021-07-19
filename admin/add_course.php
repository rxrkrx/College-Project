<?php include_once("../includes/config.php");
session_handle(); ?>
<!doctype html>
<html lang="en">

<head>
  <?php
  include_once "header.php";
  head_tag("Add Course");
  ?>
  <link href="css/sidebar.css" rel="stylesheet">
</head>

<body>
  <?php
  include_once "sidebar.php"; ?>
  <div class="container">
    <?php //include_once("header.php");

    //handle POST Request
    if (isset($_POST["course_name"])) {
      $return_data = add_course($_POST["course_name"], $_POST["course_about"]);
      if ($return_data === 1) {
        echo '<div class="alert alert-success" role="alert">
            Course Added Successfully!
          </div>';
      } else {
        echo '<div class="alert alert-error" role="alert">
                 Error Occured!
                </div>';
      }
    }

    ?>
    <br>
    <form method="POST">
      <h3>Add a Course</h3>
      <hr>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Course Name</label>
        <input type="text" class="form-control" name="course_name" id="exampleFormControlInput1" placeholder="Course Name">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">About</label>
        <textarea class="form-control" name="course_about" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add Course</button>
    </form>
  </div>
</body>

</html>