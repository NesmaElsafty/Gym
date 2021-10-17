<?php

function connect(){
	$connect = mysqli_connect("localhost","root","","gym");
	if (mysqli_connect_errno()) {
	  return "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}

	return $connect;
}

function CheckEmail($table, $email){
	$connect = connect();

	$sql = "SELECT * FROM $table WHERE email = '".$email."'";
	// die($sql);
	$getEmail = mysqli_query($connect, $sql);
	return mysqli_num_rows($getEmail);
	
	}

function unIDCheck($table, $unID){
	$connect = connect();
	


	$sql = "SELECT * FROM $table WHERE unID = '".$unID."'";
	// die($sql);
	$getID = mysqli_query($connect, $sql);
	return mysqli_num_rows($getID);
	
	}

function uploadImage($fileName, $fileTmp){
	$target_dir = "images/";
	$target_file = $target_dir . basename($fileName);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		     return 'failed to upload image';
	}else{
		move_uploaded_file($fileTmp, $target_file);
		return true;
	}
}

function checkAuth($table, $url){
	if (isset($_SESSION['unID'])) {
	
	$connect = connect();

		$sql = "SELECT * from $table WHERE unID = '".$_SESSION['unID']."'";
		$auth = mysqli_query($connect,$sql);
		$chk = mysqli_fetch_assoc($auth);
		if (!empty($chk)) {
			return true;
		}else{
			$_SESSION['authError'] = "Please Login First";
			header('location:'.$url);
		}

	}else{
		$_SESSION['authError'] = "Please Login First";
		header('location:'.$url);
	}
}

function logOut(){
	if (isset($_SESSION['unID'])) {

			session_unset();
			session_destroy();

			$_SESSION['msg'] = "You logged out successfully";

			header('location:index.php');
			
			
		}else{
			header('location:index.php');
			
		}
	
}

function OldImg($table, $id){
	$connect = connect();



	$sql = "SELECT image FROM $table WHERE id = '".$id."'";
	$getImg = mysqli_query($connect, $sql);
	$img = mysqli_fetch_assoc($getImg);

	return $img['image'];

}

function updatePass($table){
	$connect = connect();


	$sql = "SELECT * FROM $table WHERE unID = '".$_POST['unID']."'";
		$getPass = mysqli_query($connect,$sql);
		$userPass = mysqli_fetch_assoc($getPass);
		$unID = $userPass['unID'];
		$oldPass = $_POST['OldPass'];

		if (password_verify($oldPass, $userPass['password']) || $oldPass == $userPass['password']) {
			$password = password_hash($_POST['password'] , PASSWORD_DEFAULT);

			$query = "UPDATE $table
						SET password = '".$password."'
						WHERE unID = '".$_POST['unID']."'";
			$updatePass = mysqli_query($connect,$query);
			if ($updatePass) {
				$_SESSION['msg'] = "Password Updated Successfully";
				header("location:addEdit.php?id=".$unID."");
			}else{
				$_SESSION['msg'] = "Failed To Update Password";
				header('location:addEdit.php?id='.$unID.'');

			}
		}else{
			$_SESSION['msg'] = "Your Password is Wrong..";
			header('location:addEdit.php?id='.$unID.'');
		}
}

function getData($table){
	$connect = connect();

	

	$sql = "SELECT * FROM $table WHERE unID = '".$_SESSION['unID']."'";
	$get = mysqli_query($connect, $sql);
	return mysqli_fetch_assoc($get); 
}
?>