<?php

  // connect to the database
  require('connect.php');

  if (isset($_POST) & !empty($_POST)) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "SELECT * FROM `kid` WHERE id='$id' AND name='$name'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);

    $dob = '';
    $gender = '';
    $weight = 0.0;
    $height = 0.0;
    $mmr = '';
    $bmi = 0.0;

    echo '<script src="js/jquery-3.4.0.min.js"></script>';

    if ($count == 1) {
      $row = mysqli_fetch_assoc($result);
      $dob = $row['dob'];
      $gender = $row['gender'];
      $weight = $row['weight'];
      $height = $row['height'];
      $mmr = $row['mmr'];
      $bmi = $weight / $height / $height;

      echo '<script type="text/javascript">
        $(document).ready(function(){
          document.getElementById("searchResult").style.display = "block";
        });</script>';
    } else {
      echo '<script type="text/javascript">
        $(document).ready(function(){
          $("#kidNotFound").modal();
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
		
   		<link rel="stylesheet" type="text/css" href="css/search.css">

		<title>EHR for Kids - Search</title>

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
          <li class="nav-item">
            <a class="nav-link" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Forbidden" data-content="Only medical expert can access this" href="#">Update</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <header class="page-header header container">
      <div class="description">
        <h1>Search</h1>
      </div>
    </header>

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
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </div>

    <!-- show error when the kid's record is not found and don't show the following -->

    <div class="container" id="searchResult" style="display: none;">
      <div class="card card-body">
        <form>
          <div class="row">
            <div class="col">
              <label for="dob">Date of Birth<small><em> (DDMMYYYY)</em></small></label>
              <input type="text" class="form-control" id="dob" readonly value="<?php echo $dob; ?>">
            </div>
            <div class="col">
              <label for="gender">Gender</label>
              <input type="text" class="form-control" id="gender" readonly value="<?php echo $gender; ?>">
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label for="weight">Weight<small><em> (kg)</em></small></label>
              <input type="text" class="form-control" id="weight" readonly value="<?php echo $weight; ?>">
            </div>
            <div class="col">
              <label for="height">Height<small><em> (m)</em></small></label>
              <input type="text" class="form-control" id="height" readonly value="<?php echo $height; ?>">
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label for="bmi">BMI</label>
              <input type="text" class="form-control" id="bmi" readonly value="<?php echo $bmi; ?>">
            </div>
            <div class="col">
              <label for="mmr">Measles, Mumps, and Rubella Vaccine</label>
              <input type="text" class="form-control" id="mmr" readonly value="<?php echo $mmr; ?>">
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal show if kid not found -->
    <div class="modal fade" id="kidNotFound" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Search Error</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Kid not found.</p>
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

    <script src="js/main.js"></script>

	</body>
</html>