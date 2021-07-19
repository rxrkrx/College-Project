<?php
include_once("../includes/config.php");
session_handle(); ?><html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="css/sidebar.css" rel="stylesheet">
</head>

<body>
  <?php include("sidebar.php");?>

  <div class="container">
    <button type="button" class="btn btn-primary">
      All Students <span class="badge bg-secondary"><?php echo view_count(7); ?></span>
    </button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">E-Mail</th>
          <th scope="col">Phone</th>
          <!-- <th scope="col">Department</th>-->
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php view_students(); ?>
      </tbody>
    </table>

  </div>
</body>

</html>