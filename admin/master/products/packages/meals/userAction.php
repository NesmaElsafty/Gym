<?php

require_once '../../../../config/header.php';

// error_reporting(0);
$RM = 0;

if (isset($_SERVER['REQUEST_METHOD'])) {
	
		$RM++;	
	
}else{
	// exit();
	header('addEdit.php');
}

if ($RM > 0 && isset($_POST['add'])) {
	// $id = $_POST['id'];
	$type = $_POST['type'];
	$name = $_POST['name'];
	$meal_name = $_POST['meal_name'];
	$meal_description = $_POST['meal_description'];
	$fats = $_POST['fats'];
	$calories = $_POST['calories'];
	$protein = $_POST['protein'];
	$carbs = $_POST['carbs'];

		$sql = "INSERT INTO packages (type,name,meal_description,meal_name,fats ,calories,protein,carbs) 
				VALUES ('".$type."','".$name."','".$meal_description."','".$meal_name."','".$fats."','".$calories."','".$protein."','".$carbs."')";
				// die($sql);
		$add = mysqli_query($connect,$sql);

		if ($add) {
			echo 'data added successfully';
			header("location:index.php?name=$name");
		}else{
			echo 'failed to add data';
		}

}elseif ($RM > 0 && isset($_POST['edit'])) {
	$id = $_POST['id'];
	$type = $_POST['type'];
	$name = $_POST['name'];
	$meal_name = $_POST['meal_name'];
	$meal_description = $_POST['meal_description'];
	$fats = $_POST['fats'];
	$calories = $_POST['calories'];
	$protein = $_POST['protein'];
	$carbs = $_POST['carbs'];
	
	
			$sql = "UPDATE packages
					SET name = '".$name."',
						 type = '".$type."',
						 meal_name = '".$meal_name."',
						 meal_description = '".$meal_description."',
						 fats = '".$fats."',
						 calories = '".$calories."',
						 protein = '".$protein."',
						 carbs = '".$carbs."'
					WHERE id = '".$id."'";
			$update = mysqli_query($connect,$sql);

			 if ($update) {
				echo 'updated';
			header("location:../index.php");

			}else{
				echo 'failed to update zeft';
			}

		}else{
	echo 'failed to find request method';
	// header('location:../index.php');
	
}

?>