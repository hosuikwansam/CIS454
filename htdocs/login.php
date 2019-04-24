<?php

  // connect to the database
  require('connect.php');

  if (isset($_POST) & !empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $row = mysqli_fetch_assoc($result);
      $type = $row['type'];
      if ($type == 'me') {
        header('Location: home_me.html');
      } else {
        header('Location: home_rm.html');
      }
    } else {
      echo '<script src="js/jquery-3.4.0.min.js"></script>';
      echo '<script type="text/javascript">
        $(document).ready(function(){
          $("#loginFail").modal();
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
		
   		<link rel="stylesheet" type="text/css" href="css/login.css">

		<title>EHR for Kids - Login</title>

	</head>

	<body>

		<header class="page-header header container">
			<div class="description">
				<h1>Electronic Health Record for Kids</h1>
			</div>
		</header>

		<div class="login-page">
  		<div class="form">
  			<form method="POST">
  				<div class="form-group">
   					<label for="username">Username</label>
    				<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
  				</div>
  				<div class="form-group">
    				<label for="passwordInput">Password</label>
    				<input type="text" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
  				</div>
  				<button type="submit" class="btn btn-success">Login</button>
      		<a class="message" href="home_guest.html">Guest login</a>
				</form>
  		</div>
		</div>

		<!-- Modal show if login fail -->
		<div class="modal fade" id="loginFail" tabindex="-1" role="dialog">
  		<div class="modal-dialog modal-dialog-centered">
    		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title">Login Error</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
        		<p>Wrong username or password.</p>
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