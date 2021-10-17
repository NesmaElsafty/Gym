<?php 
	require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';
	session_start();
	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST['passSubmit'])) {
        updatePass('doctors');
    }
    	
}else{
	
	$_SESSION['msg'] == "You Can't Browse This Page Directly";
	header("location:../index.php");
}
?>