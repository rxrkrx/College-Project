<?php
include_once("../includes/config.php");
session_handle(); ?><html>

<head>
    <title>Admin Dashboard</title>
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/sidebar.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {

            display: grid;
            place-items: center;
            background-color: #f2e6d9;
            /* overflow-x: hidden;
            overflow-y: auto; */
        }

        .card {
            width: 500px;
            margin: 1rem;
            text-align: center;
            font-weight: bold;
            padding: 2rem;
            border: 2px solid black;
            background-image: linear-gradient(lightgreen, lightskyblue, green);
        }
    </style>

</head>

<body>

    <?php

    if (isset($_GET["action"])) {
        if ($_GET["action"] === "logout") {
            session_handle("logout");
        }
    }
    include("sidebar.php");
    ?>

    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><b>Applicants</b> 🧑‍💻</h5>
                        <p class="card-text"><?php echo view_count(1); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><b>Students</b> 🧑‍🎓</h5>
                        <p class="card-text"><?php echo view_count(7); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><b>Teachers</b> 👨‍🏫</h5>
                        <p class="card-text"><?php echo view_count(5); ?></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><b>Departments</b> 📚</h5>
                        <p class="card-text"><?php echo view_count(6); ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>