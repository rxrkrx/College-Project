<?php include_once("../includes/config.php");
session_handle(); 
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Upload Content</title>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="container">
        <?php if (isset($_SESSION["teacher_id"])) {
            echo '<form action="" method="post" enctype="multipart/form-data">
        <h2>Upload a New Attachment</h2>
            Title: <input type="text" name="title" placeholder="Title"><br>
            <textarea name="text" rows="4" cols="50" placeholder="Content Body"></textarea><br>
            File : <input type="file" name="fileToUpload" id="fileToUpload"></br>
            <button type="button" class="btn btn-primary">Upload</button>
        </form>
        <hr>
        <br>';
        } ?>
        <br>
        <h2>Attachments</h2>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                <?php view_attachments(); ?>
            </tbody>
        </table>
    </div>
    <?php
    if (isset($_POST["title"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 0;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }


        // Allow certain file formats
        if (
            $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
            && $fileType != "gif" && $fileType != "doc" && $fileType != "docx" && $fileType != "pdf" && $fileType != "txt"
        ) {
            echo "Sorry, " . $fileType . "is not allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                /*$_FILES["fileToUpload"]["name"]*/
                $teacher_id = 1;
                $title = $_POST["title"];
                $content = $_POST["text"];
                $filename = basename($_FILES["fileToUpload"]["name"]);
                add_attachment($teacher_id, $title, $content, $filename);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>
</body>

</html>