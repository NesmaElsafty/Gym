<?php 
session_start();
// error_reporting(0);
require_once '../config/header.php';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// exit();
if (isset($_SESSION['unID'])) {
	header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../config/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="../config/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../config/assets/libs/css/style.css">
	<link rel="stylesheet" href="../config/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<style>
		html,
		body {
			height: 100%;
		}

		body {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
		}
	</style>
</head>

<body>
	<!-- ============================================================== -->
	<!-- login page  -->
	<!-- ============================================================== -->
	<div class="splash-container">
		<div class="card ">
			<div class="card-header text-center"><!-- <img class="logo-img" src="assets/images/logo.png" alt="logo"> --><span class="splash-description">Please enter your the required info.</span></div>

			<?php 
				if (isset($_SESSION['authError'])) { 
			?>

				<div class="alert alert-success" style="text-align: center;" role="alert">
					<?php echo $_SESSION['authError']; ?>
				</div>

				<?php
					unset($_SESSION['authError']);
				}elseif (isset($_SESSION['loginError'])) { ?>
					
				<div class="alert alert-danger" style="text-align: center;" role="alert">
					<?php echo $_SESSION['loginError']; ?>
				</div>

			<?php unset($_SESSION['loginError']);} ?>

			<div class="card-body">
				<form action="check.php" method="POST">

					<div class="form-group">
						<input class="form-control form-control-lg" id="username" type="email" placeholder="Email" autocomplete="off" name="email" required>
					</div>
					<div class="form-group">
						<input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="password" required>
					</div>

					<button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
				</form>
			</div>
		</div>
	</div>

	<!-- ============================================================== -->
	<!-- end login page  -->
	<!-- ============================================================== -->
	<!-- Optional JavaScript -->
	<script src="../config/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	<script src="../config/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>

