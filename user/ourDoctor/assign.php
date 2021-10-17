<?php 
require_once '../config/PHPheader.php';

// checkAuth('clients','../../index.php');
if (!isset($_SESSION['unID'])) {
	$_SESSION['msg'] = 'Please Login First';
			header('location:../ourDoctor/index.php');
	exit();		
}else{
	$auth_sql = "SELECT * FROM clients WHERE unID = '".$_SESSION['unID']."'";
	$get_auth = mysqli_query($connect, $auth_sql);
	$auth = mysqli_fetch_assoc($get_auth);
	if (empty($auth)) {
			$_SESSION['msg'] = 'Please Login First';
			header('location:../index.php');
			exit();
		}else{
			if ($auth['result'] == 0) {
				$_SESSION['msg'] = 'Please Calculate your Needed Calories First';
				header('location:../ourDoctor/index.php');
				exit();
			}
		}
}

if (isset($_GET['id'])) {
$sql = "SELECT * FROM doctors WHERE id = '".$_GET['id']."'";
	$get = mysqli_query($connect,$sql);
	$doctor = mysqli_fetch_assoc($get); // validate

	if ($doctor['cappacity'] > 0) {

		//Send an Email To Doctor if !Sent exit;

		$query = "UPDATE clients
					SET doctor_unID = '".$doctor['unID']."', doctor_name = '".$doctor['name']."'
					WHERE unID = '".$_SESSION['unID']."'";
					// die($query);
		$asDoctor = mysqli_query($connect,$query);
		if ($asDoctor) {
				echo 'assigned';
				header('location:index.php');
			}else{
				echo 'failed to assign Doctor';
			}

			
	}else{
		echo 'doctor cappacity is over';
	}
}

?>