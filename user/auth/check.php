<?php 
require_once '../config/PHPheader.php';


if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST['login'])) {
		$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

		$sql = "SELECT * FROM clients WHERE email = '".$email."'";
		$get = mysqli_query($connect,$sql);
		$check = mysqli_fetch_assoc($get);

		if(mysqli_num_rows($get) == 0){
				echo 'please try to login again';
		 		header('refresh:1;URL=index.php');
		 		
		}elseif ($password = password_verify($_POST['password'], $check['password'])||  $_POST['password'] === $check['password']){
	 			$_SESSION['name'] = $check['name'];
		 		$_SESSION['unID'] = $check['unID'];
		 		$_SESSION[$check['unID']] = $check['unID'];
		 		$_SESSION['email'] = $check['email'];
		 		$_SESSION['msg'] = 'Check your inbox you may has new msg';


		 		header('location:../index.php');
		 	}else{
		 		echo 'please try to login again';
		 		header('refresh:1;URL=../index.php');
		 	}
		 } 
}else{
	header('location:login.php');
}
?>