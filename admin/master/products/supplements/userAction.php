<?php

require_once '../../../config/header.php';


if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$price = $_POST['price'];
	$storage = $_POST['storage'];
	$best_seller = $_POST['best_seller'];
	$image = $_FILES["image"]["name"];
	$tmp = $_FILES["image"]["tmp_name"];

	if (uploadImage($image,$tmp)) {
		$sql = "INSERT INTO supplements (name,price,storage,best_seller,image) 
				VALUES ('".$name."','".$price."','".$storage."','".$best_seller."','".$image."')";
				// die($sql);
		$add = mysqli_query($connect,$sql);

		if ($add) {
			echo 'data added successfully';
			header('location:index.php');
		}else{
			echo 'failed to add data';
		}
	}

}elseif ($RM > 0 && isset($_POST['edit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$storage = $_POST['storage'];
	$best_seller = $_POST['best_seller'];
	$image = $_FILES["image"]["name"];
	$tmp = $_FILES["image"]["tmp_name"];

	$updated = 'updated';
	$failed  ='failed';
	
	if ($image != '') {
		$upload = uploadImage($image,$tmp);
		if ($upload) {
			$sql = "UPDATE supplements
					SET name = '".$name."',
						 price = '".$price."',
						 storage = '".$storage."',
						 best_seller = '".$best_seller."',
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
		$sql = "UPDATE supplements
					SET name = '".$name."',
						 price = '".$price."',
						 storage = '".$storage."',
						 best_seller = '".$best_seller."'
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