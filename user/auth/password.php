<?php 
require_once '../config/PHPheader.php';


	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST['passSubmit'])) {
        updatePass('clients');
    }
    	
}else{
	
	$_SESSION['msg'] == "You Can't Browse This Page Directly";
	header("location:../index.php");
}
?>