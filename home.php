<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js">
	</script>

    <link href="home.css" rel="stylesheet"/>
    <title>School Mangement System!</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h6 a{
            color:white;
            text-decoration:none;
        }
        h6 a:hover{
            color:white;
            text-decoration:none;
        }
        h6{
            margin-bottom:0rem;
        }
        h6 a img{
            background-color:white;
            width:2%;
            height:2%;
            margin-left:1rem;
            border-radius:50%;
        }
        .outer_container{
            width: 100%;
            height: auto;
            background-color: rgb(216, 219, 219);
            display: flex;
            justify-content: space-between;
            /* flex-wrap:wrap; */
            /* align-items: center; */
        }

        .image_div{
            background-image:url("domenico-loia-hGV2TfOh0ns-unsplash.jpg");
            height:1000px;
            background-repeat:no-repeat;
            background-size:cover;
            background-position:center;
            display:flex;
            position: relative;
            flex:50%;
        }
        .text_div{
            position:absolute;
            text-transform:capitalize;
            top:13rem;
            left:8rem;
            /* background:white; */
            /* border:1px solid black; */
        }
        .text_div h2{
            /* margin-top:3rem; */
            font-size:4rem;
            font-variant: small-caps;
        }
        .text_div p{
            font-size:1.2rem;
            line-height:1.6;
        }
        .borderapply{
            content: "";
            width: 16rem;
            height: 3px;
            border:2px solid red;
            position:relative;
            left:2.5rem;
        }
        #mybtn{
            border: 1px solid black;
            background-color:black;
            color:white;
            padding:0.5rem;
            width:8rem;
            cursor: pointer;
        }
        #mybtn:hover{
            background-color:white;
            color:black;
        }
        @media screen and (max-width: 1240px){
            .text_div{
                width:480px;
                top:16rem;
                left:80px;
                line-height:1.6;
            }
            .text_div h2{
                font-size:4rem;
            }
        }
        @media screen and (max-width: 1170px){
            .text_div{
                width:480px;
                top:16rem;
                left:40px;
                line-height:1.6;
            }
            .text_div h2{
                font-size:3.5rem;
                margin-bottom:1rem;
            }
            .borderapply{
                content: "";
                width: 12rem;
                height: 3px;
                border:2px solid red;
                position:relative;
                left:2.5rem;
            }
        }
        @media screen and (max-width: 1060px){
            .text_div{
                width:450px;
                top:15rem;
                left:30px;
                line-height:1.6;
            }
            .text_div h2{
                font-size:3rem;
            }
            .borderapply{
                content: "";
                width: 12rem;
                height: 3px;
                border:2px solid red;
                position:relative;
                left:2.5rem;
            }
        }
        @media screen and (max-width: 940px){
            .text_div{
                width:390px;
                top:15rem;
                left:30px;
                line-height:1.6;
            }
            .text_div h2{
                font-size:3rem;
            }
        }
        @media screen and (max-width: 850px){
            .text_div{
                width:330px;
                top:15rem;
                left:26px;
                line-height:1.6;
            }
            .text_div h2{
                font-size:3rem;
            }
            .borderapply{
                content: "";
                width: 12rem;
                height: 3px;
                border:2px solid red;
                position:relative;
                left:2rem;
            }
        }
        @media screen and (max-width: 770px){
            .text_div{
                width:300px;
                top:15rem;
                left:30px;
                line-height:30px;
            }
            .text_div h2{
                font-size:2.5rem;
            }
            .text_div p{
                font-size:0.8rem;
            }
            .borderapply{
                content: "";
                width: 10rem;
                height: 3px;
                border:2px solid red;
                position:relative;
                left:2rem;
            }
        }
        @media screen and (max-width: 460px){
            .text_div{
                width:250px;
                top:15rem;
                left:30px;
                line-height:30px;
            }
            .text_div h2{
                font-size:2.5rem;
            }
            .text_div p{
                font-size:0.8rem;
            }
            .borderapply{
                content: "";
                width: 10rem;
                height: 3px;
                border:2px solid red;
                position:relative;
                left:2rem;
            }
        }
        @media screen and (max-width: 376px){
            .text_div{
                width:200px;
                top:15rem;
                left:10px;
                line-height:30px;
            }
            .text_div h2{
                font-size:2rem;
            }
            .borderapply{
                content: "";
                width: 8rem;
                height: 3px;
                border:2px solid red;
                position:relative;
                left:1.5rem;
            }
        }
        .para{
            /* margin-left:5rem; */
        }
        .outer_content{
            width:100%;
            height:500px;
            display:flex;
            justify-content:space-between;
            margin-top:0.5rem;
            margin-bottom:0.5rem;
            position:relative;
            bottom:auto;
            background-color: black;
            color:white;
        }
        .image_content{
            /* background-color:red; */
            width:30%;
            height:450px;
            position:relative;
        }
        .image_content img{
            position:absolute;
            top:20px;
            right:60px;
            width:100%;
            height:100%;
        }
        .text_content{
            /* background-color:rgb(125, 209, 248); */
            width:50%;
            height:500px;
            /* overflow-y:scroll; */
            /* overflow:hidden; */
        }
        .text_content .elon{
            margin-left:30px;
        }
        .text_content h2{
             margin-top:3rem;
             text-decoration:underline;
             text-decoration-color:white;
             font-weight:900;
             background-position:center;
        }
        .text_content p{
            margin-top:40px;
            font-size:1.5rem;
        }
        .text_content h2{
             /* margin-left:2.5rem; */
             margin-right:8rem;
        }
        .btn_content{
            width:8rem;
            background-color:black;
            color:white;
            border:none;
            border-radius:0.3rem;
            padding:0.5rem;
            cursor: pointer;
            margin-left:2.5rem;
            outline:none;
        }
        .btn_content:hover{
            background-color:#fff;
            border:1px solid black;
            color:black;
        }
        @media screen and (max-width:992px){
            .outer_content{
                flex-direction:column;
                align-items:center;
                justify-content:center;
            }
            .image_content{
            /* background-color:red; */
            width:75%;
            height:2000px;
            margin-bottom:200px;
            }
            .text_content{
            /* background-color:rgb(125, 209, 248); */
                width:100%;
                height:500px;
            /* overflow-y:scroll; */
            /* overflow:hidden; */
            }
            .outer_content{     
                height:1000px;
            }
            .btn_content{
                margin-left:2rem;
            } 
            .image_content img{
                position:absolute;
                top:80px;
                left:8px;
                width:100%;
                height:430px;
            } 
        }
        @media screen and (max-width:722px){
            .image_content img{
                position:absolute;
                top:42px;
                left:8px;
                width:100%;
                height:430px;
            } 
        }
        @media screen and (max-width:560px){
            .image_content img{
                position:absolute;
                top:80px;
                left:8px;
                width:100%;
                height:400px;
            }
        }
        @media screen and (max-width:541px){
            .image_content img{
                position:absolute;
                top:100px;
                left:8px;
                width:100%;
                height:360px;
            }
        }
        @media screen and (max-width:457px){
            .image_content img{
                position:absolute;
                top:130px;
                left:8px;
                width:100%;
                height:350px;
            }
        }
        @media screen and (max-width:411px){
            .image_content img{
                position:absolute;
                top:165px;
                left:8px;
                width:100%;
                height:320px;
            }
        }
        @media screen and (max-width:377px){
            .image_content img{
                position:absolute;
                top:200px;
                left:8px;
                width:100%;
                height:280px;
            }
        }
        @media screen and (max-width:340px){
            .image_content img{
                position:absolute;
                top:320px;
                left:8px;
                width:100%;
                height:280px;
            }
            .outer_content{
                width:100%;
                height:1150px;
            }
        }
        #animate_div{
            width:100%;
            height: 500px;
            background-color:black;
            margin-bottom:0.5rem;
            display:flex;
            justify-content:space-between;
            /* position:relative; */
        }
        .theimage{
            width:30%;
            height:450px;
            /* background-image:url("https://images.unsplash.com/photo-1624001010212-f7bfd7cc74cb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NDB8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=600&q=60");
            background-repeat:no-repeat;
            background-size:cover;
            background-position:left center; */
            margin:1rem;
        }
        .theimage img{
            width:100%;
            height:450px;
        }
        /* @media screen and (max-width:988px){
            body{
                background-color:red;
            }
            .theimage{
                position:absolute;
                width:30%;
                height:450px;
                margin:1rem;
            }
            .theimage img{
                width:100%;
                height:450px;
            }
        } */
        @media screen and (max-width:992px){
            #animate_div{
                display:flex;
                flex-direction:column;
                height: 1000px;
            }
            .theimage{
                width:72%;
                height:450px;
                margin-left:16%;
            }
            .theimage img{
                width:100%;
                height:450px;
            }
            .animated-text{
                width: 70%;
                height: 450px;
                text-align: justify;
                margin-left:8rem;
            }
        }
        @media screen and (max-width:691px){
            #animate_div{
                height: 1000px;
            }
            .animated-text{
                width: 70%;
                height: 450px;
                text-align: justify;
                margin-left:6rem;
            }
            .animated-text{
               font-size:1000px;
            }
        }
        @media screen and (max-width:564px){
            #animate_div{
                height: 1050px;
            }
        }
        @media screen and (max-width:495px){
            #animate_div{
                height: 1100px;
            }
        }
        @media screen and (max-width:487px){
            .animated-text{
                width: 70%;
                height: 450px;
                text-align: justify;
                margin-left:4rem;
            }
        }
        @media screen and (max-width:420px){
            #animate_div{
                height: 1098px;
            }
        }
        #gototop{
            position:fixed;
            right:10px;
            bottom:10px;
            width:80px;
            height:80px;
            border-radius:50%;
            background-color:$fff;
            box-shadow:2px 2px 5px black;
            cursor: pointer;
            outline:none;
            color:#fff;
        }
        #gototop:active{
            background:transparent; 
            border:2px solid #fff;
        }
    </style>
</head>

<body>
    <?php
        include "header.php"
    ?>
    <main>
        <section>
            <!-- <img src="vasily-koloda-8CqDvPuo_kI-unsplash.jpg" alt="Image not loaded"
                style="width: 100%;height: 90vh;" /> -->
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y29sbGVnZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Los Angeles" width="100%" height="500">
                        <div class="carousel-caption">
                          <h3>Los Angeles</h3>
                          <p>We had such a great time in LA!</p>
                        </div>   
                      </div>
                      <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8Y29sbGVnZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Chicago" width="1100" height="500">
                        <div class="carousel-caption">
                          <h3>Chicago</h3>
                          <p>Thank you, Chicago!</p>
                        </div>   
                      </div>
                      <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGNvbGxlZ2V8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="New York" width="1100" height="500">
                        <div class="carousel-caption">
                          <h3>New York</h3>
                          <p>We love the Big Apple!</p>
                        </div>   
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  </div>
        </section>
        <section>
                    <div class="outer_content">
                            <div class="text_content">
                                <h2 class="elon">Elon Musk</h2>
                                <p class="elon">An outstanding engineer, inventor and entrepreneur, co-founder of PayPal, founder of SpaceX, Tesla, SolarCity, and The Boring Company.</p>
                                <h2 class="elon">SpaceX</h2>
                                <p class="elon">"Today a trip to Mars and life on the red planet seems impossible, but we need to make this dream a reality for our lifetime. Any person who wish to go to Mars, should have the opportunit".</p>
                            </div>
                            <div class="image_content">
                                <img src="https://images.unsplash.com/photo-1624535466750-07c40d92b309?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyNHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="image" />
                            </div>
                    </div> 
                
        </section>
        <section>
            <div id="animate_div">
                <div class="theimage">
                    <img src="domenico-loia-hGV2TfOh0ns-unsplash.jpg" alt="image"/>
                </div>
                <div class="animated-text">
                    <h1 id="animate-text"><span>I</span>M<span>DHIRAJ KUMAR</span></h1>
                    <p style="color:#fff;font-size:1.5rem;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error voluptatem veritatis fugit qui velit, placeat consequuntur, deserunt recusandae dolores veniam dolorem reprehenderit, natus architecto hic eum laborum earum mollitia neque ea pariatur ab impedit. Odit doloremque nobis beatae, est molestias repudiandae amet, architecto sequi, et nam enim nostrum quaerat dolorem?</p>
                </div>
            </div>
        </section>
        <section>
                <div class="image_div">
                        <div class="text_div">
                            <h2>ABC School<div class="borderapply"></div></h2>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium.<br>Praesentium, quibusdam.Lorem ipsum dolor sit, amet consectetur fdfd.</p>
                            <a href="http://localhost/phppro/College/College%20Project/about_school.php"><button id="mybtn" style="width: 9rem;font-weight:bold;">About School</button></a>
                        </div>
                </div>
           
        </section>
        <section>
            <h1 id="mods">Our Module</h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card" >
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1621570273800-1b50b0173a97?ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Student">
                            <div class="card-body">
                                <h2 class="card-title text-center" style="color:black">Student</h2>
                                <h4 class="count text-center">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1593642532871-8b12e02d091c?ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxMzN8fHxlbnwwfHx8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Student">
                            <div class="card-body">
                                <h2 class="card-title text-center" style="color:black">Teachers</h2>
                                <h4 class="count text-center">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top" src="morgan-harper-nichols-OMXPrCAhxrE-unsplash.jpg" alt="Student">
                            <div class="card-body">
                                <h2 class="card-title text-center" style="color:black">Courses</h2>
                                <h4 class="count text-center">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <!-- <h1 id="mods">Our Module</h1> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1621570273800-1b50b0173a97?ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Student">
                            <div class="card-body">
                                <h2 class="card-title text-center" style="color:black">Student</h2>
                                <p class="para text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident magnam id voluptate eum repudiandae voluptas perferendis nobis, esse odit.</p>
                                <a href="" class="btn btn-dark" style="margin:auto;display:block;">Click Here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1593642532871-8b12e02d091c?ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxMzN8fHxlbnwwfHx8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Student">
                            <div class="card-body">
                                <h2 class="card-title text-center" style="color:black ">Teachers</h2>
                                <p class="para text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident magnam id voluptate eum repudiandae voluptas perferendis nobis, esse odit.</p>
                                <a href="" class="btn btn-dark" style="margin:auto;display:block;">Click Here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top" src="morgan-harper-nichols-OMXPrCAhxrE-unsplash.jpg" alt="Student">
                            <div class="card-body">
                                <h2 class="card-title text-center" style="color:black">Courses</h2>
                                <p class="para text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident magnam id voluptate eum repudiandae voluptas perferendis nobis, esse odit.</p>
                                <a href="" class="btn btn-dark" style="margin:auto;display:block;">Click Here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><br>
            <!-- <h6 style="background-color:black;color:white;text-align:center;"><a href="#nav">GO - TO - TOP<img src="chevron-upwards-arrow.png"/></a></h6> -->

            <button id="gototop">
                <img src="chevron-upwards-arrow.png" alt="top"  width="50%" height="50%"/>
            </button>
    </main>
        <?php
                include "footer.php";
        ?>
    <!-- student teacher courses placement -->

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
    <script src=
        "particlejs/particles.js-master/particles.js">
    </script>
    <script>
        const btnScrollTop = document.querySelector("#gototop");

        btnScrollTop.addEventListener("click",function(){
            // window.scrollTo(0,0);

            window.scrollTo({
                top:0,
                left:0,
                behaviour:"smooth"
            });

            // console.log(x);
            
        });
    </script>
</body>

</html>