<?php include_once("../includes/config.php");
session_handle(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="headers.css" rel="stylesheet">
    <style>
        .outer_container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(153, 204, 255);
        }

        .inner_container {
            height: auto;
            width: fit-content;
            border: 1px solid black;
            background-color: white;
            color: black;
            font-family: 'Cormorant Garamond', serif;
            padding: 1.5rem;
            padding-top: 3rem;
            padding-bottom: 3rem;
            border-radius: 15px;
        }

        #tweetMe {
            float: left;
            margin: 0.1rem;
            margin-right: 1rem;
        }

        #tweetMe .fa-twitter:hover {
            animation: rot 1s ease-in;
        }

        @keyframes rot {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .fa {
            padding: 20px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-quote-left {
            color: blueviolet;
            padding: 10px;
        }

        #tweetMe {
            border: none;
            outline: none;
        }
    </style>
</head>

<body>
    <?php include("header.php");
    if (isset($_GET["action"])) {
        if ($_GET["action"] === "logout") {
            session_handle("logout");
        }
    }
    if (isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $message = "";
        $return_value = view_form_status($id, "form_done");
        if ($return_value === 1) {
            $message = "Form Done";
            if (view_form_status($id, "enrolled_status") === 1) {
                $message = "Congratulations, Your Enrollment has been Done.";
            } else {
                $message = "Please Check back in some days for status.";
            }
        } else {
            $message = "The Application Form is not Complete. Please Complete it.";
        }
    } else {
        $id = "";
    }
    ?>

    <div class="outer_container">
        <?php
        if (isset($_SESSION["id"])) {
            echo '<div class="card"><div class="card-header">Featured Information</div><div class="card-body">';
            echo '<h5 class="card-title">Status</h5>';
            echo '<p class="card-text">' . $message . '</p>';
            echo '<a href="form.php" class="btn btn-primary">Complete Application Form</a></div>';
        }
        ?>
        <div class="inner_container">
            <button id="tweetMe">
                <i class="fa fa-twitter"></i><br>
            </button>
            <blockquote class="blockquote text-center quote">
                <p class="mb-0"></p><br>
                <footer class="blockquote-footer"> <cite title="Source Title"></cite></footer>
            </blockquote>
        </div>
    </div>


    <script>
        const tweet = document.getElementById("tweetMe");
        var rand;

        function randomGenerate(data) {
            let x = Math.floor(Math.random() * 5000);
            rand = data[x]
            return rand;
        }


        function randomQuoteGenerate() {
            const xmlHttp = new XMLHttpRequest();
            let randomQuote;

            xmlHttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const realData = JSON.parse(this.responseText);
                    randomQuote = randomGenerate(realData.quotes);
                    // console.log(randomQuote.text);
                    // console.log(randomQuote.author);
                    document.getElementsByClassName("mb-0")[0].innerHTML = randomQuote.text;
                    document.getElementsByClassName("blockquote-footer")[0].innerHTML = randomQuote.author;
                }
            }

            xmlHttp.open("GET", "https://goquotes-api.herokuapp.com/api/v1/random?count=5000", true);
            xmlHttp.send();
        }
        randomQuoteGenerate();

        tweet.addEventListener("click", () => {
            let tweetPost = `https://twitter.com/intent/tweet?text=${rand.text} ${rand.author}`;
            window.open(tweetPost);
        });
    </script>
</body>

</html>