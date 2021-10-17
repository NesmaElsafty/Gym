<?php

require_once '../../../config/header.php';


if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$phase = $_POST['phase'];
	
	$image = $_FILES["image"]["name"];
	$tmp = $_FILES["image"]["tmp_name"];

	if (uploadImage($image,$tmp)) {
		$sql = "INSERT INTO packages (name,price,type,phase,image) 
				VALUES ('".$name."','".$price."','".$type."','".$phase."','".$image."')";
		$add = mysqli_query($connect,$sql);

		if ($add) {
			echo 'data added successfully';
			header('location:index.php');
		}else{
			echo 'failed to add data';
		}
	}

}elseif ($RM > 0 && isset($_POST['edit'])) {
	$name = $_POST['name'];
	$id = $_POST['id'];
	$price = $_POST['price'];
	$phase = $_POST['phase'];
	$type = $_POST['type'];
	
	$image = $_FILES["image"]["name"];
	$tmp = $_FILES["image"]["tmp_name"];

	if ($image != '') {
		$upload = uploadImage($image,$tmp);
		if ($upload) {
			$sql = "UPDATE packages
					SET name = '".$name."',
						type = '".$type."',
						 price = '".$price."',
						 phase = '".$phase."',
						 image = '".$image."'
					WHERE id = '".$id."'";
			$update = mysqli_query($connect,$sql);

			 if ($update) {
				echo 'updated with image';
				header('location:index.php');

			}else{
				echo 'failed to update zeft';
			}

		}
	}else{
		$sql = "UPDATE packages
					SET name = '".$name."',
						type = '".$type."',
						 price = '".$price."',
						 phase = '".$phase."'
					WHERE id ='".$id."'";
					// die($sql);
			$update = mysqli_query($connect,$sql);

			if ($update) {
				// echo 'All updated';
				header('location:index.php');
			}else{
				echo 'failed to update zeft';
			}
			 
	}
}else{
	echo 'failed to find request method';
	header('location:index.php');
	
}

?>