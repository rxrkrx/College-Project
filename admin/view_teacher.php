<?php
  include_once("../includes/config.php");
  session_handle();?>
  <html>
<head>
    <title>View Teachers</title>
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/sidebar.css" rel="stylesheet">
</head>

<body>
<?php include("sidebar.php"); ?>
  <div class="container">
<table class="table">
 
  <tbody>
    <tr>
      <td scope="row">Applicant Name</td>
      <td>Mark</td>
    </tr>
    <tr>
      <th scope="row">Personal Details</th>
    </tr>
    <tr>
      <td scope="row">Father's Name</td>
      <td>Larry</td>
    </tr>
    <tr>
      <td scope="row">Mother's Name</td>
      <td>Larry</td>
    </tr>
    <tr>
      <td scope="row">Date of Birth</td>
      <td>Larry</td>
    </tr>
    <tr>
      <td scope="row">Marital Status</td>
      <td>Larry</td>
    </tr>
    <tr>
      <td scope="row">Gender</td>
      <td>Larry</td>
    </tr>
    <tr>
      <th scope="row">Contact Details</th>
    </tr>
    <tr>
      <td scope="row">Phone Number</td>
      <td>7209950013</td>
    </tr>
    <tr>
      <td scope="row">E-Mail</td>
      <td>test@email.com</td>
    </tr>
    <tr>
      <td scope="row">Permanent Address</td>
      <td>Street</td>
    </tr>
    <tr>
      <td scope="row">City</td>
      <td>Deoghar</td>
    </tr>
    <tr>
      <td scope="row">State</td>
      <td>Jharkhand</td>
    </tr>
    <tr>
      <td scope="row">Pincode</td>
      <td>814112</td>
    </tr>
    <tr>
      <th scope="row">Academic Details</th>
    </tr>
    <tr>
      <td scope="row">Father's Name</td>
      <td>Larry</td>
    </tr>
    <tr>
      <th scope="row">Additional Details</th>
    </tr>
    <tr>
      <td scope="row">Form Status</td>
      <td>Complete</td>
    </tr>
    <tr>
      <td scope="row">Form Status</td>
      <td>Complete</td>
    </tr>
  </tbody>
</table>
<a href="view_applicant.php?id='.$id.'" class="badge bg-success">Approve</a>
<a href="view_applicant.php?id='.$id.'" class="badge bg-danger">Reject</a>
  </div>

</body>
</html>