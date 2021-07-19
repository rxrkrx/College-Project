<?php include_once("../includes/config.php");
session_handle(); ?>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="css/sidebar.css" rel="stylesheet">

</head>

<body>
  <?php include("sidebar.php");?>

  <div class="container">
    <br>

    <button type="button" class="btn btn-primary">
      All Applicants <span class="badge bg-secondary"><?php echo view_count(1); ?></span>
    </button>

    <button type="button" class="btn btn-primary">
      Accepted Applicants <span class="badge bg-secondary"><?php echo view_count(2); ?></span>
    </button>

    <button type="button" class="btn btn-primary">
      Rejected Applicants <span class="badge bg-secondary"><?php echo view_count(3); ?></span>
    </button>

    <button type="button" class="btn btn-primary">
      Incomplete Applicants <span class="badge bg-secondary"><?php echo view_count(4); ?></span>
    </button>


    <br><br>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">E-Mail</th>
          <th scope="col">Phone</th>
          <th scope="col">Form Status</th>
          <th scope="col">Enrollment Status</th>
          <th scope="col">Reg. Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php view_applicants(); ?>
      </tbody>
    </table>
  </div>
</body>

</html>