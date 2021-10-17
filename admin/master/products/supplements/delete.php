<?php 
require_once '../../../config/header.php';



if (isset($_GET['id'])) {
	$sql = "DELETE FROM supplements WHERE id = '".$_GET['id']."'";
	$delete = mysqli_query($connect, $sql);

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