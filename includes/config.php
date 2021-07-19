<?php
//Obtain Database Credentials from file.
require_once("database_creds.php");
//Create a New mysqli Object
$mysqli = new mysqli($hostname, $username, $password, $db_name);

function check_email($email, $account_type = "none")
{
  global $mysqli;
  $data = "";
  $sql = "";

  if ($account_type === "none") {
    $sql = "SELECT email FROM Register WHERE email IN (?)";
  } elseif ($account_type === "teacher") {
    $sql = "SELECT email FROM teachers_details WHERE email IN (?)";
  } elseif ($account_type === "student") {
    $sql = "SELECT email FROM student_users WHERE email IN (?)";
  }
  $stmt = $mysqli->prepare($sql);

  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows() == 0) {
    $data = 0;
  } else {
    $data = 1;
  }
  //Above will return 0 if E-Mail is New and 1 if not.

  $stmt->close();
  return $data;
}

function check_login($email, $password, $role = 0)
{
  global $mysqli;
  $data = "";
  $table_name = "";
  if ($role === 0) {
    $table_name = "Register";
  } elseif ($role === "teacher") {
    $table_name = "teachers_details";
  } elseif ($role === "student") {
    $table_name = "student_users";
  } elseif ($role === "admin") {
    $table_name = "admin";
  }
  if ($stmt = $mysqli->prepare("SELECT id,email FROM " . $table_name . " where email=? AND password=?")) {
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows() == 1) #Checking the output of rows
    {
      /* bind variables to prepared statement */
      $stmt->bind_result($id, $email_record);
      $stmt->fetch(); #Fetching Results
      $data = $id;
    } else {
      $data = -1;
    }
    /* close statement */
    $stmt->close();
    //return User ID
    return $data;
  }
}

function register_applicant($name, $email, $password,  $phone)
{
  global $mysqli;
  $data = "";

  if ($stmt = $mysqli->prepare("INSERT INTO Register (Name, Email, password, Phone) VALUES (?, ?, ?, ?)")) {
    $stmt->bind_param("ssss", $name, $email, $password, $phone);
    $stmt->execute();
  }
  $stmt->close();
}

function view_applicants()
{
  global $mysqli;
  $data = [];

  if ($stmt = $mysqli->prepare("SELECT id, Name, Email, Phone,form_done, enrolled_status, reg_date FROM Register")) {
    $stmt->bind_result($id, $name, $email, $phone, $form_status, $enroll_status, $reg_date);
    $stmt->execute();
    $result = $stmt->store_result();
    //Below Code will Print List of All Applicants

    while ($stmt->fetch()) {
      echo "<tr>";
      echo "<th scope='row'>" . $id . "</th>";
      echo "<td>" . $name . "</td>";
      echo "<td>" . $email . "</td>";
      echo "<td>" . $phone . "</td>";
      echo "<td>" . (($form_status === 1) ? '✅' : '❌') . "</td>";
      echo "<td>" . (($enroll_status === 1) ? '✅' : '❌') . "</td>";
      echo "<td>" . $reg_date . "</td>";
      echo "<td>";
      echo '<a href="view.php?id=' . $id . '&user=applicant"><span class="badge bg-primary">View</span></a>';
      echo "</td>";
      echo "</tr>";
    }
  }
}

function view_teachers()
{
  global $mysqli;
  $data = [];

  if ($stmt = $mysqli->prepare("SELECT id, name, email, phone, department FROM teachers_details")) {
    $stmt->bind_result($id, $name, $email, $phone, $department);
    $stmt->execute();
    $result = $stmt->store_result();
    //Below Code will Print List of All Applicants
    while ($stmt->fetch()) {
      echo "<tr>";
      echo "<th scope='row'>" . $id . "</th>";
      echo "<td>" . $name . "</td>";
      echo "<td>" . $email . "</td>";
      echo "<td>" . $phone . "</td>";
      echo "<td>" . $department . "</td>";
      echo "<td>";
      echo '<a href="view.php?id=' . $id . '&user=teacher" class="badge bg-primary">View</a>';
      echo "</td>";
      echo "</tr>";
    }
  }
}

function view_count($choice)
{
  global $mysqli;
  $data = "";
  $sql = "";
  switch ($choice) {
    case 1:
      $sql = "SELECT count(*) FROM Register";
      break;
    case 2:
      $sql = "SELECT count(*) FROM Register WHERE enrolled_status = 1";
      break;
    case 3:
      $sql = "SELECT count(*) FROM Register WHERE enrolled_status = 0";
      break;
    case 4:
      $sql = "SELECT count(*) FROM Register WHERE form_done is NULL";
      break;
    case 5:
      $sql = "SELECT count(*) FROM teachers_details";
      break;
    case 6:
      $sql = "SELECT count(*) FROM Course";
      break;
    case 7:
      $sql = "SELECT count(*) FROM student_users";
      break;
  }
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_result($count);
  $stmt->execute();

  $stmt->store_result();
  $stmt->fetch();
  $data = $count;
  return $data;
}

function add_teacher($name, $email, $password,  $phone, $department, $about)
{
  global $mysqli;
  $data = "";
  if ($stmt = $mysqli->prepare("INSERT INTO teachers_details (name, email, password, phone, department, about) VALUES (?, ?, ?,?, ?, ?)")) {
    $stmt->bind_param("ssssss", $name, $email, $password,  $phone, $department, $about);
    $stmt->execute();
  }
  $stmt->close();
}

function view_applicant($id)
{
  global $mysqli;
  $data = [];
  $stmt = $mysqli->prepare("SELECT id, Name, Email, Phone, form_done, enrolled_status, reg_date FROM Register where id = ?");
  $stmt->bind_param("s", $id);
  $stmt->bind_result($id, $name, $email, $phone, $form_status, $enroll_status, $reg_date);
  $stmt->execute();
  $result = $stmt->store_result();

  $stmt->fetch();

  $stmt = $mysqli->prepare("SELECT form_id, father_name, mother_name, dob, marital_status, gender, address, state, city, pincode, course_name  FROM form where reg_id = ?");
  $stmt->bind_param("s", $id);
  $stmt->bind_result($form_id, $father_name, $mother_name, $dob, $marital_status, $gender, $address, $state, $city, $pincode, $course_id);
  $stmt->execute();
  $result = $stmt->store_result();

  $stmt->fetch();
  //Need to update
  $stmt = $mysqli->prepare("SELECT course_name FROM Course WHERE id=?");
  $stmt->bind_param("s", $course_id);
  $stmt->bind_result($course_name);
  $stmt->execute();
  $stmt->store_result();
  $stmt->fetch();

  echo '<table class="table">';
  echo '<tbody>';
  echo '<tr>';
  echo '<td scope="row">Applicant Name</td>';
  echo '<td>' . $name . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Course Applied For</td>';
  echo '<td>' . $course_name . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<th scope="row">Personal Details</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Father\'s Name</td>';
  echo '<td>' . $father_name . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Mother\'s Name</td>';
  echo '<td>' . $mother_name . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Date of Birth</td>';
  echo '<td>' . $dob . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Marital Status</td>';
  echo '<td>' . $marital_status . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Gender</td>';
  echo '<td>' . $gender . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<th scope="row">Contact Details</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Phone Number</td>';
  echo '<td>' . $phone . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">E-Mail</td>';
  echo '<td>' . $email . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Permanent Address</td>';
  echo '<td>' . $address . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">City</td>';
  echo '<td>' . $city . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">State</td>';
  echo '<td>' . $state . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Pincode</td>';
  echo '<td>' . $pincode . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '</tbody>';
  echo '</table>';

  echo '<table class="table">';
  echo '<thead>';
  echo '<h5><b>Academic Details</b></h5>';
  $stmt = $mysqli->prepare("SELECT exam_pass, institute_name, division, percentage, board_name FROM academic_details WHERE form_id = ?");
  $stmt->bind_param('s', $form_id);
  $stmt->bind_result($exam_pass, $institute_name, $division, $percentage, $board_name);
  $stmt->execute();
  $result = $stmt->store_result();
  echo  '<tr><th scope="col">#</th><th scope="col">Exam</th><th scope="col">Institute Name</th><th scope="col">Distinction</th><th scope="col">Percentage</th><th scope="col">Board Name</th></tr></thead>';
  echo '<tbody>';
  $count = 1;
  while ($stmt->fetch()) {
    echo '<tr>';
    echo '<th scope="row">' . $count . '</th>';
    echo '<td>' . $exam_pass . '</td>';
    echo '<td>' . $institute_name . '</td>';
    echo '<td>' . $division . '</td>';
    echo '<td>' . $percentage . '</td>';
    echo '<td>' . $board_name . '</td>';
    echo '</tr>';
    $count++;
  }
  echo ' </tbody></table>';
  echo '<table class="table">';
  echo '<th scope="col">Application</th><th scope="col">Status</th>';
  echo '<tbody>';
  echo '<tr>';
  echo '<td scope="row">Form Status</td>';
  echo '<td>' . (($form_status === 1) ? ('Complete') : ('InComplete')) . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Enrollment Status</td>';
  echo '<td>' . (($enroll_status === 1) ? ('Complete') : ('InComplete')) . '</td>';
  echo '</tr>';
  echo '</tbody>';
  echo '</table>';

  if ($enroll_status !== 1) {
    if ($enroll_status === 0) {
      echo '<div class="alert alert-danger" role="alert">Applicant Rejected. </div>';
    }
    echo '<br>';
    echo '<a href="action.php?id=' . $id . '&user=applicant&action=accept" class="badge bg-success">Approve</a>';
    echo '<a href="action.php?id=' . $id . '&user=applicant&action=reject" class="badge bg-danger">Reject</a>';
  } else {
    echo '<div class="alert alert-success" role="alert">
    Applicant Successfully Approved.
  </div>';
  }
}

function view_teacher($id)
{
  global $mysqli;
  $data = [];
  if ($stmt = $mysqli->prepare("SELECT id, name, email, phone, department, about FROM teachers_details where id = ?")) {
    $stmt->bind_param("s", $id);
    $stmt->bind_result($id, $name, $email, $phone, $department, $about);
    $stmt->execute();
    $result = $stmt->store_result();

    $stmt->fetch();
    echo '<table class="table">';
    echo '<tbody>';
    echo '<tr>';
    echo '<td scope="row">Teacher Name</td>';
    echo '<td><input id="name" name="name" type="text" placeholder="Teacher\'s Name" value="' . $name . '"class="form-control input-md" required=""></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th scope="row">Contact Details</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td scope="row">Phone Number</td>';
    echo '<td><input id="phone" name="phone" type="text" placeholder="Phone Number" value="' . $phone . '"class="form-control input-md" required=""></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td scope="row">E-Mail</td>';
    echo '<td><input id="email" name="email" type="text" placeholder="E-Mail address" value="' . $email . '" class="form-control input-md" required=""></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td scope="row">Department</td>';
    echo '<td><select id="department" name="department" class="form-control">';
    generate_course_options($department);
    echo '</select></div></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td scope="row">About</td>';
    echo '<td><input id="about" name="about" type="text" placeholder="About Section" value="' . $about . '" class="form-control input-md" required=""></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
    //echo '<a href="edit.php?id=' . $id . '&user=teacher" class="badge bg-primary">Edit</a>';
    echo '<button type="submit" class="btn btn-primary">Save</button>';
  }
  $stmt->close();
}

function add_applicant_details($fname, $mname, $gender, $marital_status, $address, $state, $pincode, $city, $dob, $id, $course)
{
  global $mysqli;
  $data = "";
  if ($stmt = $mysqli->prepare("INSERT INTO form (father_name, mother_name, dob, marital_status, gender, address, state, city, pincode, reg_id, course_name) VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?)")) {
    $date = date("Y-m-d", strtotime($dob));
    $stmt->bind_param("sssssssssis", $fname, $mname, $dob, $marital_status, $gender, $address, $state, $city, $pincode, $id, $course);

    $stmt->execute();
  } else {
    print("Error Occured");
  }

  if ($stmt = $mysqli->prepare("SELECT form_id FROM form WHERE reg_id = ?")) {
    $stmt->bind_param("i", $id);
    $stmt->bind_result($form_id);
    $stmt->execute();
    $result = $stmt->store_result();
    $stmt->fetch();
    $data = $form_id;
  }

  $stmt->close();
  return $data;
}

function add_applicant_academic_details($exam_pass, $division, $markspercentage, $institute_name, $board_name, $form_id)
{
  global $mysqli;
  if ($stmt = $mysqli->prepare("INSERT INTO academic_details (exam_pass, institute_name, division, percentage, board_name, form_id) VALUES (?, ?, ?, ?, ?, ?)")) {
    $stmt->bind_param("sssdsi", $exam_pass, $institute_name, $division, $markspercentage, $board_name, $form_id);
    $stmt->execute();
  }


  $stmt->close();
}

function update_status($id)
{
  global $mysqli;
  if ($stmt = $mysqli->prepare("UPDATE Register  SET form_done = 1 WHERE id = ?")) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
  }
  $stmt->close();
}

function profile_action($id, $choice)
{
  global $mysqli;
  $action = "";
  if ($stmt = $mysqli->prepare("UPDATE Register  SET enrolled_status = ? WHERE id = ?")) {
    if ($choice === "accept") {
      $action = 1;
      add_student($id);
    } elseif ($choice === "reject") {
      $action = 0;
    }
    $stmt->bind_param("ii", $action, $id);
    $stmt->execute();
  }
  $stmt->close();
}

function password_update($id, $password, $user_type)
{
  global $mysqli;
  $data = -1;
  $sql = ""; //SQL Query
  if ($user_type === "admin") {
    $sql = "UPDATE admin SET password = ? WHERE id = ?";
  } elseif ($user_type === "applicant") {
    $sql = "UPDATE Register SET password = ? WHERE id = ?";
  } elseif ($user_type === "teacher") {
    $sql = "UPDATE teachers_details SET password = ? WHERE id = ?";
  } elseif ($user_type === "student") {
    $sql = "UPDATE student_users SET password = ? WHERE id = ?";
  }
  if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("si", $password, $id);
    $stmt->execute();
    $data = 1;
  }
  $stmt->close();
  return $data;
}

function view_courses()
{
  global $mysqli;
  $data = [];

  if ($stmt = $mysqli->prepare("SELECT id, course_name FROM Course")) {
    $stmt->bind_result($id, $name);
    $stmt->execute();
    $result = $stmt->store_result();

    while ($stmt->fetch()) {
      echo "<tr>";
      echo "<th scope='row'>" . $id . "</th>";
      echo "<td>" . $name . "</td>";
      echo "</tr>";
    }
  }
}
function add_course($name, $about)
{
  global $mysqli;
  $data = -1;

  if ($stmt = $mysqli->prepare("INSERT INTO Course (course_name, about) VALUES (?, ?)")) {
    $stmt->bind_param("ss", $name, $about);
    $stmt->execute();
    $data = 1;
  }

  $stmt->close();
  return $data;
}

function edit_profile($id, $role = 0)
{
  global $mysqli;
  $data = "";

  if ($stmt = $mysqli->prepare("SELECT id, username, email, name FROM admin WHERE id = ?")) {
    $stmt->bind_param("i", $id);
    $stmt->bind_result($id, $username, $email, $name);
    $stmt->execute();
    $result = $stmt->store_result();

    $stmt->fetch();
    echo '<div class="form-group">';
    echo '<label class="col-md-4 control-label" for="name">Name</label>';
    echo '<div class="col-md-4">';
    echo '<input id="name" name="name" type="text" value="' . $name . '" placeholder="User\'s Name" class="form-control input-md">';

    echo '</div></div>';

    echo '<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-Mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" value="' . $email . '" placeholder="E-Mail Address" class="form-control input-md">
  </div></div>';

    echo '<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" value="' . $username . '" placeholder="Username" class="form-control input-md">';
  }
}

function profile_update_admin($id, $name, $email, $username)
{
  global $mysqli;
  $data = -1;

  if ($stmt = $mysqli->prepare("UPDATE admin SET username=?, name=?, email=? WHERE id = ?")) {
    $stmt->bind_param("sssi", $username, $name, $email, $id);
    $stmt->execute();
    $data = 1;
  }
  $stmt->close();
  return $data;
}

function add_student($id)
{
  global $mysqli;
  $data = [];

  $stmt = $mysqli->prepare("SELECT Name, Email, Phone, password FROM Register where id = ?");
  $stmt->bind_param("i", $id);
  $stmt->bind_result($name, $email, $phone, $password);
  $stmt->execute();
  $result = $stmt->store_result();

  $stmt->fetch();

  $stmt = $mysqli->prepare("SELECT form_id FROM form where reg_id = ?");
  $stmt->bind_param("i", $id);
  $stmt->bind_result($form_id);
  $stmt->execute();
  $result = $stmt->store_result();
  $stmt->fetch();

  if ($stmt = $mysqli->prepare("INSERT INTO student_users (name, email, phone, password, form_id) VALUES (?, ?, ?, ?, ?)")) {
    $stmt->bind_param("ssssi", $name, $email, $phone, $password, $form_id);
    $stmt->execute();
    $data = 1;
  } else {
    print("Error Occured");
  }

  $stmt->close();
}

function view_students($mode = "")
{
  global $mysqli;
  $data = 1;

  if ($stmt = $mysqli->prepare("SELECT id, name, email, phone, form_id FROM student_users")) {
    $stmt->bind_result($id, $name, $email, $phone, $form_id);
    $stmt->execute();
    $result = $stmt->store_result();

    while ($stmt->fetch()) {
      echo "<tr>";
      echo "<th>" . $data . "</th>";
      echo "<td>" . $name . "</td>";
      echo "<td>" . $email . "</td>";
      echo "<td>" . $phone . "</td>";
      if ($mode === "") {
        echo "<td>";
        echo '<a href="view.php?id=' . $id . '&user=student" class="badge bg-primary">View</a>';
        echo "</td>";
      }
      echo "</tr>";
      $data++;
    }
  }
}

function view_form_status($id, $column)
{
  global $mysqli;
  $data = "";
  $stmt = $mysqli->prepare("SELECT " . $column . " FROM Register WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->bind_result($count);
  $stmt->execute();

  $stmt->store_result();
  $stmt->fetch();
  $data = $count;
  return $data;
}

function profile_update_teacher($id, $name, $email, $phone, $about, $department = "")
{
  global $mysqli;
  $data = -1;
  $sql = "";
  if ($department !== "") {
    $sql = "UPDATE teachers_details SET name=?, email=?, phone= ?,about=?, department=? WHERE id = ?";
  } else {
    $sql = "UPDATE teachers_details SET name=?, email=?, phone= ?,about=? WHERE id = ?";
  }
  if ($stmt = $mysqli->prepare($sql)) {
    if ($department !== "") {
      $stmt->bind_param("sssssi", $name, $email, $phone, $about, $department, $id);
    } else {
      $stmt->bind_param("ssssi", $name, $email, $phone, $about, $id);
    }
    $stmt->execute();
    $data = 1;
  }
  $stmt->close();
  return $data;
}

function edit_profile_teacher($id, $role = 0)
{
  global $mysqli;
  $data = "";
  if ($stmt = $mysqli->prepare("SELECT id, email, name, phone, about FROM teachers_details WHERE id = ?")) {
    $stmt->bind_param("i", $id);
    $stmt->bind_result($id, $email, $name, $phone, $about);
    $stmt->execute();
    $result = $stmt->store_result();

    $stmt->fetch();
    echo '<div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Teachers name" value="' . $name . '">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email</label>
      <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email-Address" value="' . $email . '">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Phone No</label>
      <input type="number" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Phone-No" value="' . $phone . '">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">About</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="about" rows="3">' . $about . '</textarea>
  </div>
    <button id="singlebutton" name="singlebutton" class="btn btn-success" type="submit">Save</button>';
  }
}

function profile_update_student($id, $name, $email, $phone, $address, $state, $city, $pincode)
{
  global $mysqli;
  $data = -1;

  if ($stmt = $mysqli->prepare("UPDATE student_users SET name=?, email=?, phone= ? WHERE id = ?")) {
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
    $stmt->execute();

    $stmt = $mysqli->prepare("SELECT form_id FROM student_users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->bind_result($form_id);
    $stmt->execute();
    $stmt->store_result();

    $stmt->fetch();

    $stmt = $mysqli->prepare("UPDATE form SET address=?, state=?, city= ?, pincode= ? WHERE form_id = ?");
    $stmt->bind_param("ssssi", $address, $state, $city, $pincode, $form_id);
    $stmt->execute();

    $data = 1;
  }
  $stmt->close();
  return $data;
}

function edit_profile_student($id, $role = 0)
{
  global $mysqli;
  $data = "";

  if ($stmt = $mysqli->prepare("SELECT form_id, email, name, phone FROM student_users WHERE id = ?")) {
    $stmt->bind_param("i", $id);
    $stmt->bind_result($form_id, $email, $name, $phone);
    $stmt->execute();
    $result = $stmt->store_result();

    $stmt->fetch();
    echo '<div class="form-group">
      <label class="control-label" for="name">Name</label>
      <div>
        <input id="name" name="name" type="text" placeholder="Student\'s Name" value="' . $name . '" class="form-control input-md" required="">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="email">E-Mail</label>
      <div>
        <input id="email" name="email" type="text" placeholder="E-Mail address" value="' . $email . '" class="form-control input-md" required="">
    </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="phone">Phone No.</label>
      <div>
        <input id="phone" name="phone" type="text" placeholder="Phone Number" value="' . $phone . '" class="form-control input-md" required="">
      </div>
    </div>';

    $stmt = $mysqli->prepare("SELECT address, state, city, pincode FROM form WHERE form_id = ?");
    $stmt->bind_param("i", $form_id);
    $stmt->bind_result($address, $state, $city, $pincode);
    $stmt->execute();
    $stmt->fetch();

    echo '<br><h5>Address Details</h5>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>  
  <div>
  <input id="address" name="address" type="text" placeholder="Street No, Locality" value="' . $address . '" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City</label>  
  <div>
  <input id="city" name="city" type="text" placeholder="City Name" value="' . $city . '" class="form-control input-md" required="">
   </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="state">State</label>  
  <div>
  <input id="state" name="state" type="text" placeholder="State Name" value="' . $state . '" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pincode">Pin Code</label>  
  <div>
  <input id="pincode" name="pincode" type="text" placeholder="Pin Code" value="' . $pincode . '" class="form-control input-md" required="">
  </div>
  <div>
  <button id="singlebutton" name="singlebutton" class="btn btn-primary" type="submit">Save</button>
</div>
</div>';

    $data = 1;
  }
  $stmt->close();
  return $data;
}

function add_message($name, $phone, $email, $message)
{
  global $mysqli;
  $data = -1;
  if ($stmt = $mysqli->prepare("INSERT INTO contact_us (name, phone, email, message) VALUES (?, ?, ?, ?)")) {
    $stmt->bind_param("ssss", $name, $phone, $email, $message);
    $stmt->execute();
    $data = 1;
    $stmt->close();
  }
  return $data;
}

function view_messages()
{
  global $mysqli;
  $data = 1;

  if ($stmt = $mysqli->prepare("SELECT id, name, email, phone, message FROM contact_us order by id desc")) {
    $stmt->bind_result($id, $name, $email, $phone, $message);
    $stmt->execute();
    $result = $stmt->store_result();

    while ($stmt->fetch()) {
      echo "<tr>";
      echo "<th scope='row'>" . $data . "</th>";
      echo "<td>" . $name . "</td>";
      echo "<td>" . $email . "</td>";
      echo "<td>" . $phone . "</td>";
      echo "<td>" . $message . "</td>";
      echo "</tr>";
      $data++;
    }
  }
}

function view_student($id)
{
  global $mysqli;
  $data = [];
  $stmt = $mysqli->prepare("SELECT id, name, email, phone, form_id FROM student_users where id = ?");
  $stmt->bind_param("s", $id);
  $stmt->bind_result($id, $name, $email, $phone, $form_id);
  $stmt->execute();
  $result = $stmt->store_result();

  $stmt->fetch();

  $stmt = $mysqli->prepare("SELECT father_name, mother_name, dob, marital_status, gender, address, state, city, pincode  FROM form where form_id = ?");
  $stmt->bind_param("s", $form_id);
  $stmt->bind_result($father_name, $mother_name, $dob, $marital_status, $gender, $address, $state, $city, $pincode);
  $stmt->execute();
  $result = $stmt->store_result();

  $stmt->fetch();
  echo '<table class="table">';

  echo '<tbody>';
  echo '<tr>';
  echo '<td scope="row">Student Name</td>';
  echo '<td>' . $name . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<th scope="row">Personal Details</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Father\'s Name</td>';
  echo '<td>' . $father_name . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Mother\'s Name</td>';
  echo '<td>' . $mother_name . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Date of Birth</td>';
  echo '<td>' . $dob . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Marital Status</td>';
  echo '<td>' . $marital_status . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Gender</td>';
  echo '<td>' . $gender . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<th scope="row">Contact Details</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Phone Number</td>';
  echo '<td>' . $phone . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">E-Mail</td>';
  echo '<td>' . $email . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Permanent Address</td>';
  echo '<td>' . $address . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">City</td>';
  echo '<td>' . $city . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">State</td>';
  echo '<td>' . $state . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td scope="row">Pincode</td>';
  echo '<td>' . $pincode . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '</tbody>';
  echo '</table>';

  echo '<table class="table">';
  echo '<thead>';
  echo '<h5><b>Academic Details</b></h5>';
  $stmt = $mysqli->prepare("SELECT exam_pass, institute_name, division, percentage, board_name FROM academic_details WHERE form_id = ?");
  $stmt->bind_param('i', $form_id);
  $stmt->bind_result($exam_pass, $institute_name, $division, $percentage, $board_name);
  $stmt->execute();
  $result = $stmt->store_result();
  echo  '<tr><th scope="col">#</th><th scope="col">Exam</th><th scope="col">Institute Name</th><th scope="col">Distinction</th><th scope="col">Percentage</th><th scope="col">Board Name</th></tr></thead>';
  echo '<tbody>';
  $count = 1;
  while ($stmt->fetch()) {
    echo '<tr>';
    echo '<th scope="row">' . $count . '</th>';
    echo '<td>' . $exam_pass . '</td>';
    echo '<td>' . $institute_name . '</td>';
    echo '<td>' . $division . '</td>';
    echo '<td>' . $percentage . '</td>';
    echo '<td>' . $board_name . '</td>';
    echo '</tr>';
    $count++;
  }
}

function generate_course_options($department = 0)
{
  global $mysqli;

  if ($stmt = $mysqli->prepare("SELECT id, course_name FROM Course")) {
    $stmt->bind_result($id, $course_name);
    $stmt->execute();
    $result = $stmt->store_result();

    while ($stmt->fetch()) {
      if ($department == $id) {
        echo  '<option value="' . $id . '" selected>' . $course_name . '</option>';
      } else {
        echo  '<option value="' . $id . '">' . $course_name . '</option>';
      }
    }
  }
}

function session_handle($mode = "", $id = 0)
{
  if (!isset($_SESSION)) {
    session_start();
  }
  if ($mode === "applicant") {
    $_SESSION["id"] = $id;
  } elseif ($mode === "student") {
    $_SESSION["student_id"] = $id;
  } elseif ($mode === "teacher") {
    $_SESSION["teacher_id"] = $id;
  } elseif ($mode === "admin") {
    $_SESSION["admin_id"] = $id;
  } elseif ($mode === "logout") {
    if (isset($_SESSION)) {
      // remove all session variables
      session_unset();
      // destroy the session
      session_destroy();
    }
  }
  if (isset($_SESSION)) {
    if (count($_SESSION) === 0) {
      echo("<script>location.href = 'login.php';</script>");
      //header("Location: login.php");
      exit();
    }
  }
}

function add_attachment($teacher_id, $title, $content, $filename)
{
  global $mysqli;
  $data = -1;
  if ($stmt = $mysqli->prepare("INSERT INTO fileuploads (teacher_id, title, content, filename) VALUES (?, ?, ?, ?)")) {
    $stmt->bind_param("ssss", $teacher_id, $title, $content, $filename);
    $stmt->execute();
    $data = 1;
    $stmt->close();
  }
  return $data;
}

function view_attachments()
{
  global $mysqli;

  if ($stmt = $mysqli->prepare("SELECT id, title, content, filename FROM fileuploads order by id desc")) {
    $stmt->bind_result($id, $title, $content, $filename);
    $stmt->execute();
    $result = $stmt->store_result();

    while ($stmt->fetch()) {
      echo "<tr>";
      echo "<th scope='row'>" . $id . "</th>";
      echo "<td>" . $title . "</td>";
      echo "<td>" . $content . "</td>";
      echo "<td><a href='uploads/" . $filename . "'>View File</a></td>";
      echo "</tr>";
    }
  }
}