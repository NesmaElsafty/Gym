<?php 
// error_reporting(0);
session_start();

require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';



// include '../admin/functions.php';

if (isset($_SESSION[$_SESSION['unID']])) {

		$sql = "SELECT * from doctors WHERE unID = '".$_SESSION['unID']."'";
		$auth = mysqli_query($connect,$sql);
		$chk = mysqli_fetch_assoc($auth);

		if (!empty($chk)) {
			header('location:home.php');
		}else{
			header('location:login/login/index.php');
			exit();
		}
}else{
			header('location:login/login/index.php');
			exit();
}

if (isset($_SESSION['msg'])) {
 echo $_SESSION['msg'];
}	

unset($_SESSION['msg']);
unset($_SESSION['auth']);


?>
