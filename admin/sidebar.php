<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<div class="d-flex flex-column p-3 bg-dark text-white" style="width: 280px ; height:60rem">
    <a href="dashboard.php" class="d-flex align-items-center pb-3 mb-3  text-decoration-none border-bottom">
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
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center text-white rounded collapsed" data-bs-toggle="collapse" data-bs-target="#messages-collapse" aria-expanded="false">
                Messages
            </button>
            <div class="collapse" id="messages-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="messages.php" class="link-dark text-white rounded">View Messages</a></li>
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
                    <li><a href="dashboard.php?action=logout" class="link-dark text-white rounded">Sign out</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>