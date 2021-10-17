<?php 
require_once '../config/header.php';

session_start();

	// $MasterPassword = 'mario';

	// $hashed =  password_hash($password , PASSWORD_DEFAULT);
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST['login'])) {
		$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

		$sql = "SELECT * FROM users WHERE email = '".$email."'";
		// die($sql);
		$get = mysqli_query($connect,$sql);
		$check = mysqli_fetch_assoc($get);

		if(empty($check)){
				$_SESSION['loginError'] = 'Email is Worng';
		 		header('location:index.php');
		 		
		}elseif ($password = password_verify($_POST['password'], $check['password'])||  $_POST['password'] === $check['password']){
	 		
		 		$_SESSION['name'] = $check['name'];
		 		$_SESSION['id'] = $check['id'];
		 		$_SESSION['unID'] = $check['unID'];
		 		// $_SESSION[$check['unID']] = $check['unID'];
		 		$_SESSION['auth'] = $check['auth'];
		 		$_SESSION['email'] = $check['email'];


		 		header('location:home.php');
		 	}else{
		 		$_SESSION['loginError'] = 'Password is Wrong';
		 		header('location:index.php');
		 	}
		 } 
}else{
	header('location:index.php');
}
?>