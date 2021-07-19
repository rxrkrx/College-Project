<?php include_once("../includes/config.php");
session_handle(); ?>
<html>

<head>
    <title>Profile</title>
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link href="css/sidebar.css" rel="stylesheet"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        /* form{
            width:50%;
            margin:auto;
        } */
        .outer_container {
            background-color: #c2d6d6;
            color: black;
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 50%;
            line-height: 3rem;
        }

        #singlebutton {
            margin-top: 1rem;
            float: right;
            width: 8rem;
        }
    </style>
</head>
<?php
include("header.php");

//update below code
$data = "";
$id = "";
if (isset($_SESSION["teacher_id"])) {
    $id = (isset($_SESSION["teacher_id"])) ? $_SESSION["teacher_id"] : "";
} else if (isset($_SESSION["student_id"])) {
    $id = (isset($_SESSION["student_id"])) ? $_SESSION["student_id"] : "";
}
if (isset($_POST["name"])) {
    if (isset($_SESSION["teacher_id"])) {
        $return_data = profile_update_teacher($id, $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["about"]);
    } else if (isset($_SESSION["student_id"])) {
        $return_data = profile_update_student($id, $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["address"], $_POST["state"], $_POST["city"], $_POST["pincode"]);
    }

    if ($return_data === 1) {
        echo '<div class="alert alert-success" role="alert">
            Profile Updated Successfully!
          </div>';
    } else {
        echo '<div class="alert alert-error" role="alert">
                 Error Occured!
                </div>';
    }
}

?>

<body>

    <div class="outer_container">
        <img src="undraw_Update_re_swkp.svg" alt="profile" width="30%" height="20%" />
        <div class="container">
            
            <form class="form-horizontal" method="POST">
                <!-- <img src="undraw_profile_pic_ic5t.svg" alt="profile" width="20%" height="20%"/> -->
                <fieldset>
                    <!-- Form Name -->
                    <legend style="font-weight:bold;text-align:center;">Profile</legend>
                    <?php echo $data; ?>

                    <!--- Need to Create App. Function for it -->
                    <?php if (isset($_SESSION["teacher_id"])) {
                        edit_profile_teacher($id);
                    } else if (isset($_SESSION["student_id"])) {
                        edit_profile_student($id);
                    }
                    ?>
                    <br>
                </fieldset>
            </form>
        </div>
    </div>

</body>

</html>