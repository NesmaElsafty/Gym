<?php 
require_once '../config/PHPheader.php';

if (isset($_GET['id'])) {
	$sql = "UPDATE clients
				SET doctor_name = '', doctor_unID = ''
				WHERE id='".$_GET['id']."'";
	$unfollow = mysqli_query($connect,$sql);
	if ($unfollow) {
			echo 'Email Sent To Doctor Successfully';
			header('location:index.php');
		}else{
			echo 'failed to unfollow';
		}	
}else{
	echo "can't find ID";
	exit();
}
?>