<?php 
session_start();
require_once '../config/header.php';


checkAuth('users','index.php');
$title = $_SESSION['name'];

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$admin = mysqli_fetch_assoc($get);

$_SESSION['auth'] = $admin['auth'];
$bc1 = ''; $bc2 = '';
?>
<?php require_once '../config/headerOut.php'; ?>

					<!-- ============================================================== -->
					<!-- Code -->
					<!-- ============================================================== -->
					<h1 style="text-align: center; margin-top: 150px; margin-bottom: -100px;">
						Welcome To Protien Box Admin Panel
					</h1>
					<!-- ============================================================== -->
					<!-- End Code -->
					<!-- ============================================================== -->	
<?php require_once '../config/footerOut.php'; ?>
