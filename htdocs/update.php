<?php

  if (isset($_POST) & !empty($_POST)) {
    $rules = $_POST['rules'];

    echo '<script src="js/jquery-3.4.0.min.js"></script>';

    if ($rulesFile = fopen("rules.txt", "w")) {
      fwrite($rulesFile, $rules);
      fclose($rulesFile);

      echo '<script type="text/javascript">
        $(document).ready(function(){
          $("#rulesSuccess").modal();
        });</script>';
    } else {
      echo '<script type="text/javascript">
        $(document).ready(function(){
          $("#rulesFail").modal();
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
		
   		<link rel="stylesheet" type="text/css" href="css/update.css">

		<title>EHR for Kids - Update</title>

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
            <a class="nav-link" href="search_me.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update.php">Update</a>
          </li>
        </ul>
      </div>
    </nav>

		<div class="container">
      <div class="page-header">
        <h1>Update</h1>
      </div>
    </div>

    <div class="container">
      <form method="POST">
        <div class="form-group">
          <label for="medicalRule">Input the medical rule below</label>
          <textarea class="form-control" id="medicalRule" rows="10" name="rules"></textarea>
        </div>
        <input class="btn btn-success" type="submit" value="Submit">
        <input class="btn btn-secondary" type="reset" value="Reset">
      </form>
    </div>

    <!-- Modal show if fail to open file -->
    <div class="modal fade" id="rulesFail" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">File Error</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Cannot open rules.txt file for update.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal show if update is successful -->
    <div class="modal fade" id="rulesSuccess" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Success</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>The medical rule is successfully updated</p>
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