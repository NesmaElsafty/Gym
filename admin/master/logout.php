<?php
session_start();

require_once '../config/header.php';

if(logOut()){
	$_SESSION['authError'] = 'you logged out successfully';
	header('location:index.php');
};


?>