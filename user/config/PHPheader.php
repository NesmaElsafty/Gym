<?php  

require_once '../../admin/config/connect.php';
session_start();
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';

// checkAuth('clients','../index.php');
if (isset($_SESSION['unID'])) {
  

  $sql= "SELECT * FROM clients WHERE unID = '".$_SESSION['unID']."'";
  $get = mysqli_query($connect,$sql);
  $data = mysqli_fetch_assoc($get);
}

?>