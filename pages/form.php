<?php include_once("../includes/config.php");
session_handle(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Applicant Form</title>
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link href="headers.css" rel="stylesheet"> -->
    <style>
        .btn{
            float:right;
            background-color:green;
            width:8rem;
            font-size:1.1rem;
            margin-bottom:5rem;
        }
        .add{
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include_once("header.php");


        $id = (isset($_SESSION["id"])) ? $_SESSION["id"] : "";
        if (isset($_POST["fname"])) {
            //var_dump($_POST);
            $form_id = add_applicant_details($_POST["fname"], $_POST["mname"], $_POST["gender"], $_POST["marital_status"], $_POST["address"], $_POST["state"], $_POST["pincode"], $_POST["city"], $_POST["dob"], $id, $_POST["course"]);
            add_applicant_academic_details($_POST["passing_exam"], $_POST["division"], $_POST["markspercentage"], $_POST["institute_name"], $_POST["board_name"], $form_id);
            update_status($id);
        }

        $message = "";
        $return_value = view_form_status($id, "form_done");
        if ($return_value === 1) {
            $message = 'Thank You, Your Response has been recorded successfully. Please check back the status of your form after a few days.';
            if (view_form_status($id, "enrolled_status") === 1) {
                $message = "Congraulations, Your Enrollment has been done Successfully.";
            }
            echo '<div class="card">
            <h5 class="card-header">Status</h5>
            <div class="card-body">
              <h5 class="card-title">Form Submitted</h5>
              <p class="card-text">' . $message . '</p>
            </div>
          </div>';
        } else {
            echo '
        <form class="form-horizontal" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend style="text-align: center;">Application Form</legend>
                <br>
                <hr class="dropdown-divider">

                <h4>Personal Details</h4>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="fname">Father\'s Name</label>
                    <div class="col-md-4">
                        <input id="fname" name="fname" type="text" placeholder="Mr. " class="form-control input-md" >

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="mname">Mother\'s Name</label>
                    <div class="col-md-4">
                        <input id="mname" name="mname" type="text" placeholder="Mrs. " class="form-control input-md" >

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="gender">Gender</label>
                    <div class="col-md-4">
                        <select id="gender" name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="marital_status">Marital Status</label>
                    <div class="col-md-4">
                        <select id="marital_status" name="marital_status" class="form-control">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="dob">Date of Birth</label>
                    <div class="col-md-4">
                        <input id="dob" name="dob" type="date" placeholder="Date of Birth" class="form-control input-md" >

                    </div>
                </div>
                <br>
                <hr class="dropdown-divider">
                <br>
                <h4>Address Details</h4>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="address">Permanent Address</label>
                    <div class="col-md-4">
                        <input id="address" name="address" type="text" placeholder="Street No, Locality, " class="form-control input-md" >

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="state">State</label>
                    <div class="col-md-4">
                        <select id="state" name="state" class="form-control">
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttaranchal">Uttaranchal</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="pincode">Pin Code</label>
                    <div class="col-md-4">
                        <input id="pincode" name="pincode" type="text" placeholder="" class="form-control input-md" >

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cIty">City</label>
                    <div class="col-md-4">
                        <input id="city" name="city" type="text" placeholder="City Name" class="form-control input-md" >

                    </div>
                </div>
                <br>
                <hr class="dropdown-divider">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="selectbasic">Course</label>
                    <div class="col-md-4">
                        <select id="course" name="course" class="form-control">';
            generate_course_options();
            echo '
                    </select>
                </div>
                </div>
                <br>

                <table>
                    <thead>
                        <th>Passing Exam</th>
                        <th>Division</th>
                        <th>Percentage of Marks</th>
                        <th>Institute Name</th>
                        <th>Board Name</th>
                    </thead>
                    <tbody>
                        <td>
                            <select id="passing_exam" name="passing_exam" class="form-control">
                                <option value="Matriculation">Matriculation</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Under Graduation">Under Graduation</option>
                                <option value="Post Graduation">Post Graduation</option>
                            </select>

                        </td>
                        <td>

                            <input id="division" name="division" type="text" placeholder="Division" class="form-control input-md">
                        </td>
                        <td>

                            <input id="markspercentage" name="markspercentage" type="text" placeholder="Percentage of Marks Obtained" class="form-control input-md">


                        </td>
                        <td>

                            <input id="institute_name" name="institute_name" type="text" placeholder="Institution Name" class="form-control input-md">

                        </td>
                        <td>

                            <input id="board_name" name="board_name" type="text" placeholder="Name of Board" class="form-control input-md">

                        </td>
                    </tbody>
                </table>
            </fieldset>
            
            <br>
            <input type="submit" class="btn " value="Submit">
          
        </form>
        <button class="add btn-primary" id="add">Add</button>';
        }
        ?>
        <!-- <button type="button" class="btn btn-primary pull-right">Next</button> -->
    </div>
    <script>
        const element = document.getElementById("add");
        const bd_name = document.getElementById("board_name");
        // console.log(element);
        element.addEventListener("click",function(){
            // console.log("clicked");
            let newNode = document.createElement("textarea");
                newNode.setAttribute("rows",3);

                bd_name.insertBefore(newNode,element);
               
        });
    </script>
</body>

</html>