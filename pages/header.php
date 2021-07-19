<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32">
      <use xlink:href="#bootstrap"></use>
    </svg>
    <?php
    if (isset($_SESSION["id"])) {
      echo '<span class="fs-4">Applicant Panel</span>';
    } else if (isset($_SESSION["teacher_id"])) {
      echo '<span class="fs-4">Teacher Panel</span>';
    } else if (isset($_SESSION["student_id"])) {
      echo '<span class="fs-4">Student Panel</span>';
    }
    ?>
  </a>

  <ul class="nav nav-pills">
    <li class="nav-item"><a href="dashboard.php" class="nav-link active">Home</a></li>
    <?php
    if (isset($_SESSION["id"])) {
      echo '<li class="nav-item"><a href="form.php" class="nav-link">Form</a></li>';
    }
    if (isset($_SESSION["teacher_id"])) {
      echo '<li class="nav-item"><a href="students.php" class="nav-link">Students</a></li>';
    }
    if (isset($_SESSION["teacher_id"]) || isset($_SESSION["student_id"])) {
      echo '<li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>';
      echo '<li class="nav-item"><a href="attachment.php" class="nav-link">Attachments</a></li>';
      echo '<li class="nav-item"><a href="change_password.php" class="nav-link">Change Password</a></li>';
    } ?>
    <li class="nav-item"><a href="dashboard.php?action=logout" class="nav-link">Logout</a></li>
  </ul>
</header>