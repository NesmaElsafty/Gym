<?php require_once '../config/PHPheader.php'; ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../New folder/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../New folder/css/bootstrapmodefied.css">
	<style>
		body
		{
			margin: 0;
			padding: 0;
			background: url(404-bg.png);
			background-size: cover;
			font-family: sans-serif;
		}
		.loginBox
		{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			width: 350px;
			height: 420px;
			padding: 80px 40px;
			box-sizing: border-box;
			background: rgba(0,0,0,.2);
			border-radius:10px 10px 10px 10px;

		}
		.user
		{
			width: 100px;
			height: 100px;
			border-radius: 50%;
			overflow: hidden;
			position: absolute;
			top: calc(-100px/2);
			left: calc(50% - 50px);
		}
		h2
		{
			margin: 0;
			padding: 0 0 20px;
			color:#31719e;
			text-align: center;
		}
		.loginBox p
		{
			margin: 0;
			padding: 0;
			font-weight: bold;
			color: #31719e;
		}
		.loginBox input
		{
			width: 100%;
			margin-bottom: 20px;
		}
		.loginBox input[type="text"],
		.loginBox input[type="password"]
		{
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			height: 40px;
			color: dimgray;
			font-size: 16px;
		}
		::placeholder
		{
			color: rgba(255,255,255,.5);
		}
		.loginBox input[type="submit"] /* hwa da s7?  Weslet :D*/
		{
			border: none;
			outline: none;
			height: 40px;
			color: white;
			font-size: 16px;
			background:palevioletred;
			cursor: pointer;
			border-radius: 20px;
		}
		.loginBox input[type="button"] /* hwa da s7?  Weslet :D*/
		{
			border: none;
			outline: none;
			height: 40px;
			color: white;
			font-size: 16px;
			background:palevioletred;
			cursor: pointer;
			border-radius: 20px;
		}
		.loginBox input[type="submit"]:hover
		{
			background:#E8A4BA;
			color:white;
		}
		.loginBox input[type="button"]:hover
		{
			background:#E8A4BA;
			color:white;
		}
		.loginBox a
		{
			color:#31719e;
			font-size: 14px;
			font-weight: bold;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="loginBox">
		<img src="WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg" class="user">
		<h2>Welcome</h2>
		<?php if (isset($_SESSION['msg'])) { ?>
			<div class="alert alert-success" style="text-align: center;" role="alert">
				<?php echo $_SESSION['msg'];  ?>
			</div>
			<?php 
	// exit();
			unset($_SESSION['msg']);
		} ?>
		<form  method="POST" action="check.php">
			<p>Email</p>
			<input type="text" name="email" placeholder="Email" required>
			<p>Password</p>
			<input type="password" name="password" placeholder="••••••" required>
			<input type="submit" name="login" value="login">
			<a href="../index.php"><input type="button" value="home"></a>
		</form>
	</div>
	<script src="../New folder/js/jquery-3.4.1.min.js"></script>  
<script src="../New folder/js/popper1.min.js"></script>       
<script src="../New folder/js/bootstrap.min.js"></script>
</body>
</html>