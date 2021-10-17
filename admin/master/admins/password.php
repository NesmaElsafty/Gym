<?php 
	session_start();
	
require_once '../../config/header.php';
	
	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST['passSubmit'])) {
        updatePass('users');
    }
    	
}else{
	
	$_SESSION['msg'] == "You Can't Browse This Page Directly";
	header("location:../index.php");
}
?>