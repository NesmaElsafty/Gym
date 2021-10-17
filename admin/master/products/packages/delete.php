<?php 
require_once '../../../config/header.php';

if (isset($_GET['id'])) {
	$query = "SELECT * FROM packages WHERE id= '".$_GET['id']."'";
	$get = mysqli_query($connect,$query);
	$row = mysqli_fetch_assoc($get);

	$sql = "DELETE FROM packages WHERE type='package_meal' AND name ='".$row['name']."'";
	$delete = mysqli_query($connect, $sql);

	$sql2 = "DELETE FROM packages WHERE id='".$_GET['id']."'";
	// die($sql2);
	$delete2 = mysqli_query($connect,$sql2);

	if ($delete) {
		// echo 'record deleted ';
		header('location:index.php');
	}else{
		echo ' failed to delete record';
	}
}else{
	header('location:index.php'); // Login Page
 }
?>