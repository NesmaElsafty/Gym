<?php 
error_reporting(0);
require_once '../../../admin/config/connect.php';
require_once '../../../admin/config/functions.php';
require_once '../../../admin/config/db.php';

session_start();

// include '../admin/functions.php';
if (isset($_SESSION[$_SESSION['unID']])) {

	$sql = "SELECT * from doctors WHERE unID = '".$_SESSION['unID']."'";
	$auth = mysqli_query($connect,$sql);
	$chk = mysqli_fetch_assoc($auth);

	if (!empty($chk)) {
		header('location:../../home.php');
	}else{
			// header('location:login/index.php');
	}
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	<?php					
					if (isset($_SESSION['msg'])) {?>
						<div class="alert alert-success" role="alert" style="text-align: center;">
							<?php echo $_SESSION['msg']; ?>
						</div>
						<?php unset($_SESSION['msg']); } ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" action="../../check.php" method="POST">
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg" alt="AVATAR">
					</span>
					


						<div class="wrap-input100 validate-input m-b-50" data-validate="Enter email">
							<input class="input100" type="email" name="email" required>
							<span class="focus-input100" data-placeholder="email"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
							<input class="input100" type="password" name="password" required>
							<span class="focus-input100" data-placeholder="Password"></span>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit" name="login">
								Login
							</button>
						</div>

					<!-- <ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li> -->

						
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>