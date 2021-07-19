<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="home.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <style>
        .outer_container{
            width:100%;
            height:100vh;
            /* background-color:black; */
            background-image:url("ruthson-zimmerman-Ws4wd-vJ9M0-unsplash.jpg");
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:scroll;
            color:black;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .inner_container{
            background-color:white;
            width:70%;
            padding: 2rem;
            border-top:1rem solid #4d4dff;
            clip-path: polygon(2% 0, 100% 0%, 100% 100%, 2% 100%, 0 50%);
            /* overflow-y: scroll;  */
            /* opacity:0.8; */
            /* height:30%; */
        }
        .image img{
            float:left;
        }
        .about h3{
            color:#7a7afc;
            margin-bottom:1rem;
            text-decoration:underline;
            text-decoration-color:black;
            font-weight:900;
        }
        .button-class button{
            float:right;
            background-color:#7a7afc;
            color:white;
            font-size:1.3rem;
            border:1px solid black;
            padding:0.3rem 2rem;
        }
        .button-class button:hover{
            background-color:black;
            cursor: pointer;
            border:2px solid #7a7afc;
        }
        p{
            display:inline;
        }
        @media screen and (max-width: 900px){
            .inner_container{
                margin-top:20rem;
                margin-bottom:20rem;
            }
        }
        @media screen and (max-width: 600px){
            .inner_container{
                margin-top:50%;
                margin-bottom:50%;
            }
        }
    </style>
</head>
<body>  
        <?php
            include "header.php"
        ?>
        <div class="outer_container">
                <div class="inner_container">
                    
                    <div class="image">
                        <img src="undraw_Coding_re_iv62.svg" alt="profile" width="30%" height="30%"/>
                    </div>
                    
                    <div class="about">
                       <h3>DK SHARMA</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores necessitatibus eligendi ipsam fuga non, ea quos deleniti officiis maxime recusandae, aliquid id, in voluptates unde pariatur sit consectetur aliquam sed voluptatem reprehenderit? Dolorem consequatur reiciendis commodi ullam corrupti quod temporibus nobis repellendus repudiandae eum. Harum et voluptates quod debitis hic.lorem20. Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto impedit fugiat similique quas blanditiis dolor aliquam quis temporibus autem iusto. <p id="ptag" style="display:none;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis accusantium incidunt quos illo, iure laudantium tempora libero dolore dolorem sunt nam expedita, nisi, cum alias quaerat? Optio facere Lorem ipsum dolor, sit amet consectetur adipisicing elit. At deleniti ea perferendis debitis soluta 
                        maxime nostrum delectus commodi reiciendis ullam consequuntur voluptate esse vel iusto repudiandae provident, doloremque asperiores harum laudantium eveniet doloribus reprehenderit fuga soluta officiis aperiam ducimus similique. Numquam fuga iste quo labore in nesciunt accusantium dignissimos excepturi animi ad rerum fugit deleniti omnis, eligendi facere expedita necessitatibus molestias? Illo veritatis consectetur commodi sit ducimus officia doloremque, incidunt odit saepe perferendis explicabo enim cum labore impedit porro quae omnis! A, corporis
                        </p></p>
                    </div>
                    <div class="button-class">
                        <button id="read">Read-More</button>
                    </div>
                </div>
        </div>
        <?php
            include "footer.php"
        ?>

<script src="home.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

        <script>
                    function readMore() {
                            let status = false;
                            const btn = document.getElementById("read");
                            const p = document.getElementById("ptag");
                            const in_con = document.getElementById("inner_container");

                            btn.addEventListener("click",function(){ 
                                if(!status){
                                    p.style.display = "inline";
                                    btn.innerHTML = "Read-Less";

                                    status=true;
                                }
                                else{
                                    p.style.display = "none";
                                    status=false;
                                    btn.innerHTML = "Read-More";
                                }
                            });
                    }
                    readMore();
        </script>
</body>
</html>