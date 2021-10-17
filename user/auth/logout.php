<?php
require_once '../config/PHPheader.php';

if(logOut()){ $_SESSION['msg'] = 'Logged out successfully';} else {
	print_r($_SESSION['unID']);
}


?>