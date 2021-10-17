<?php 

session_start();
require_once '../../admin/config/connect.php';
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';

if (isset($_GET['id'])) {
	$sql = "UPDATE clients
				SET doctor = '', doctor_unID = ''
				WHERE unID='".$_GET['id']."'";
	$unfollow = mysqli_query($connect,$sql);
	if ($unfollow) {
			echo 'Email Sent To Client Successfully';
		}else{
			echo 'failed to Delete Client';
		}	
}else{
	echo "can't find ID";
	exit();
}
?>