<!DOCTYPE html>
<html lang="en">
<head>
<!-- Previous COlor: #18b6a3; -->
    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        #particles-js {
            background: #1774b6; 
            position: absolute;
            height: 100%;
            width: 100%;
        } 
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div id="particles-js"></div>

    <?php
    include "header.php";
    include_once("includes/config.php");
    $message = "";
    if (isset($_POST["name"])) {
        $return_data = add_message($_POST["name"], $_POST["phone"], $_POST["email"], $_POST["comment"]);

        if ($return_data === 1) {
            $message = '<div class="alert alert-success" role="alert">Your Message Recorded Successfully!</div>';
        } else {
            $message = '<div class="alert alert-error" role="alert">Error Occured!</div>';
        }
    }
    ?>
    <div class="container bg-light" style="position: relative; width:55%; border-radius: 5px; padding: 15px 20px; margin-top: 1%;">
        <h2 class="text-center">Contact <span>Us</span></h2>
        <form method="POST" autocomplete="off">

            <?php echo $message; ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no">Phone Number</label>
                <input type="number" name="phone" id="no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="com">Comment</label>
                <textarea name="comment" id="com" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success font-weight-bold conatct_btn text-uppercase">Submit</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="/app.js"></script>
</body>

</html>