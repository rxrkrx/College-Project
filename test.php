<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sidebars/sidebars.css" rel="stylesheet">
    <style>
        .btn-toggle:hover,
        .btn-toggle:focus,
        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #0d6efd;
        }
    </style>
    <title>
        <? echo $title; ?>
    </title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <div class="d-flex flex-column p-3 bg-dark text-white" style="width: 280px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3  text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-5 text-white fw-semibold">Menu</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center text-white rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Applicants
                </button>
                <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="applicants.php" class="link-dark text-white rounded">View</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center text-white rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Students
                </button>
                <div class="collapse" id="dashboard-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled text-white fw-normal pb-1 small">
                        <li><a href="students.php" class="link-dark text-white rounded">View</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center text-white rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Teachers
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="add_teacher.php" class="link-dark text-white rounded">Add New</a></li>
                        <li><a href="teachers.php" class="link-dark text-white rounded">View</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center text-white rounded collapsed" data-bs-toggle="collapse" data-bs-target="#course-collapse" aria-expanded="false">
                    Course
                </button>
                <div class="collapse" id="course-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="add_course.php" class="link-dark text-white rounded">Add New</a></li>
                        <li><a href="courses.php" class="link-dark text-white rounded">View</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded text-white collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Account
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="profile.php" class="link-dark text-white rounded">Profile</a></li>
                        <li><a href="dashboard.php" class="link-dark text-white rounded">Dashboard</a></li>
                        <li><a href="change_password.php" class="link-dark text-white rounded">Change Password</a></li>
                        <li><a href="logout.php" class="link-dark text-white rounded">Sign out</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <header class="py-3 mb-4 border-bottom">

        <div class="d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4"><b>Admin Panel</b></span>
            </a>
        </div>
    </header>
    <div class="dropdown-divider"></div>
    <div class="container">


    </div>

</body>

</html>