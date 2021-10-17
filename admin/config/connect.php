<?php

$connect = mysqli_connect("localhost","root","","gym");

// session_start();

if ($connect){
	// echo 'connected';
}else{
	echo 'failed to connect ';
}

$auth = 0;

// if (isset($_SESSION['auth'])) {
// 	$auth = 1;
// }else{
	// header('location:../index.php');
// }

?>