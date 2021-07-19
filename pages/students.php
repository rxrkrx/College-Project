<?php include_once("../includes/config.php");
session_handle(); ?>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Students List</title>
  <style>
      /* .container{
        background-color:#f2d9d9;
        width:100%;
        height:auto;
      } */
      table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top:1.5rem;
        font-size:1.2rem;
      }
      thead tr th{
        padding-top: 12px;
        padding-bottom: 12px;
       
        background-color: black;
        color: white;
      }
      table tr:nth-child(even){background-color:  #ddd;}
      table tr:hover {background-color: #ddd;}

      table td,table th{
        border:1px solid black;
        text-align:center;
      }
      tbody td{
        padding:1rem;
      }
  </style>
</head>

<body>
  <?php
  include("header.php");
  ?>

  <div class="container">

    <button type="button" class="btn btn-primary">
      All Students <span class="badge bg-secondary"><?php echo view_count(7); ?></span>
    </button>

    <!--- To Complete -->
    <div style="overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>E-Mail</th>
          <th>Phone</th>
          <!-- <th scope="col">Department</th>
          <th scope="col">Action</th>-->
        </tr>
      </thead>
      <tbody>
        <?php
        view_students("limited");
        ?>
      </tbody>
    </table>

    </div>

  </div>
</body>

</html>