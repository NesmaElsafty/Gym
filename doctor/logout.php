<?php
session_start();

require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';
if(logOut()){ echo 'logged out';} else {echo 'failed to log out';}


?>