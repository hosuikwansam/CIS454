<?php
  
  // connect to the database
  require('connect.php');

  if (isset($_POST) & !empty($_POST)) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $mmr = $_POST['mmr'];

    echo '<script src="js/jquery-3.4.0.min.js"></script>';
    
    $sql = "INSERT INTO `kid` (id, name, dob, gender, weight, height, mmr) VALUES ('$id', '$name', '$dob', '$gender', '$weight', '$height', '$mmr')";
    if (mysqli_query($connection, $sql)) {
      echo '<script type="text/javascript">
        $(document).ready(function(){
          $("#insertSuccess").modal();
        });</script>';
    } else {
      echo '<script type="text/javascript">
        $(document).ready(function(){
          $("#insertFail").modal();
        });</script>';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
   		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		
   		<link rel="stylesheet" type="text/css" href="css/insert.css">

		<title>EHR for Kids - Insert</title>

	</head>

	<body>

		<nav class="navbar navbar-expand-md">
      <a class="navbar-brand" href="login.php">Welcome</a>
      <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="search_rm.php">Search</a>
          </li>
          <li class="nav-item" id="insertNav">
            <a class="nav-link" href="insert.php">Insert</a>
          </li>
        </ul>
      </div>
    </nav>

		<div class="container">
      <div class="page-header">
        <h1>Insert</h1>
      </div>
    </div>

    <div class="container">
      <form method="POST">

        <div class="row">
          <div class="col">
            <label for="id">Kid's ID</label>
            <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" required>
          </div>
          <div class="col">
            <label for="name">Kid's name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="dob">Date of Birth<small><em> (DDMMYYYY)</em></small></label>
            <input type="text" class="form-control" id="dob" placeholder="DDMMYYYY" name="dob" required>
          </div>
          <div class="col">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" placeholder="Male/Female" name="gender" required>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="weight">Weight<small><em> (kg)</em></small></label>
            <input type="text" class="form-control" id="weight" placeholder="Enter weight" name="weight" required>
          </div>
          <div class="col">
            <label for="height">Height<small><em> (m)</em></small></label>
            <input type="text" class="form-control" id="height" placeholder="Enter height" name="height" required>
          </div>
        </div>

        <div class="row">
          
          <div class="col">
            <label for="mmr">Measles, Mumps, and Rubella Vaccine</label>
            <input type="text" class="form-control" id="mmr" placeholder="Yes/No" name="mmr" required>
          </div>
          <div class="col">

          </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Insert</button>
      </form>
    </div>

    <!-- Modal show if insert is successful -->
    <div class="modal fade" id="insertSuccess" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Success</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>The record is successfully inserted</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal show if insert is failed -->
    <div class="modal fade" id="insertFail" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Fail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>The record is not inserted</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

		<!-- jQuery first, then Popper JS, then Bootstrap JS -->
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>