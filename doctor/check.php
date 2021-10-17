<?php 
require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';

session_start();

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST['login'])) {
		$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

		$sql = "SELECT * FROM doctors WHERE email = '".$email."'";
		$get = mysqli_query($connect,$sql);
		$check = mysqli_fetch_assoc($get);

		if(mysqli_num_rows($get) == 0){
				$_SESSION['msg'] = 'please try to login again';
		 		header('location:index.php');
		 		
		}elseif ($password = password_verify($_POST['password'], $check['password'])||  $_POST['password'] === $check['password']){
	 		
		 		$_SESSION['name'] = $check['name'];
		 		$_SESSION['unID'] = $check['unID'];
		 		$_SESSION[$check['unID']] = $check['unID'];
		 		$_SESSION['auth'] = $check['auth'];
		 		$_SESSION['email'] = $check['email'];


		 		header('location:home.php');
		 	}else{
		 		$_SESSION['msg'] =  'please try to login again';
		 		header('location:index.php');
		 	}
		 } 
}else{
	header('location:index.php');
}
?>