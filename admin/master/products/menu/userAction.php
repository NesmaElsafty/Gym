<?php

require_once '../../../config/header.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$type = $_POST['type'];
	

	
		$sql = "INSERT INTO packages (name,type) 
				VALUES ('".$name."','".$type."')";
		$add = mysqli_query($connect,$sql);

		if ($add) {
			echo 'data added successfully';
			header('location:index.php');
		}else{
			echo 'failed to add data';
		}
	

}elseif ($RM > 0 && isset($_POST['edit'])) {
	$name = $_POST['name'];
	$id = $_POST['id'];
	
	$type = $_POST['type'];
	
			$sql = "UPDATE packages
					SET name = '".$name."',
						type = '".$type."'						 
					WHERE id = '".$id."'";
			$update = mysqli_query($connect,$sql);

			 if ($update) {
				echo 'updated';
				header('location:index.php');

			}else{
				echo 'failed to update zeft';
			}
	}else{
	echo 'failed to find request method';
	header('location:index.php');
}

?>