<?php include_once("../includes/config.php");
  session_handle();?>
  <html>

<head>
  <title>Add a Teacher</title>
  <!-- Bootstrap core CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="css/sidebar.css" rel="stylesheet">

</head>
<?php 
include("sidebar.php");


$data = "";
if (isset($_POST["name"])) {
  if (check_email($_POST["email"], "teacher") == 0) {
    add_teacher($_POST["name"], $_POST["email"], $_POST["password"], $_POST["phone"], $_POST["department"], $_POST["about"]);
    $data = '<div class="alert alert-success" role="alert"> Account Created Successfully.  </div>';
  } else {
    $data = '<div class="alert alert-error" role="alert"> Account with entered E-Mail already exists! </div>';
  }
}

?>

<body>
  <div class="container">

    <?php echo $data; ?>
    <form class="form-horizontal" method="POST">
      <fieldset>

        <!-- Form Name -->
        <legend>Add a Teacher</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name">Name</label>
          <div class="col-md-4">
            <input id="name" name="name" type="text" placeholder="Teacher's Name" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">E-Mail</label>
          <div class="col-md-4">
            <input id="email" name="email" type="text" placeholder="E-Mail address" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="phone">Phone No.</label>
          <div class="col-md-4">
            <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control input-md" required="">

          </div>
        </div>


        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="department">Department</label>
          <div class="col-md-4">
            <select id="department" name="department" class="form-control">
              <?php generate_course_options(); ?>
            </select>
          </div>
        </div>



        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password">Password</label>
          <div class="col-md-4">
            <input id="password" name="password" type="text" placeholder="Account Password" class="form-control input-md" required="">

          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="name">About</label>
          <div class="col-md-4">
            <input id="about" name="about" type="text" placeholder="About Section" class="form-control input-md" required="">

          </div>
        </div>
        <br>
      </fieldset>
      <!-- Button -->
      <div class="form-group">
        <div class="col-md-4">
          <button id="singlebutton" name="singlebutton" class="btn btn-primary" type="submit">Add Teacher</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>