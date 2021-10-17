<?php 

session_start();
require_once '../../config/header.php';

    
checkAuth('users','../index.php');

if (isset($_GET['id'])) {
	$sql = "DELETE FROM clients WHERE unID = '".$_GET['id']."'";
	$delete = mysqli_query($connect,$sql);
	if (isset($delete)) {
		echo 'Deleted';
		header('loction:index.php');
	}else{
		echo 'failed to delete client';
	}
}else{
	header('location:index.php');
}
?>