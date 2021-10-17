<?php
// Start session
// error_reporting(0);
session_start();
require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';
checkAuth('doctors','index.php');

$sql = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);
$title = 'Profile';
?>
<?php require_once 'config/headerOut.php'; ?>

<!-- CODE HERE -->
<img src="images/<?php echo $row['image']; ?>" class="rounded float-left" style="height: 150px;width: 150px;">
<blockquote class="blockquote" style="margin-left: 20px; display: inline-block;">
  <p class="mb-0">
   <h6><span> <strong>Name:</strong> <?php echo $row['name'] ?></span><br></h6>
   <h6><span> <strong>Title:</strong> <?php echo $row['type'] ?></span><br></h6>
   <h6><span> <strong>Email:</strong> <?php echo $row['email'] ?></span><br></h6>
   <h6><span> <strong>Age:</strong> <?php echo $row['age'] ?></span><br></h6>
   <h6><span> <strong>Address:</strong> <?php echo $row['address'] ?></span><br></h6>
   <h6><span> <strong>1st Price:</strong> <?php echo $row['price1'] ?></span><br></h6>
   <h6><span> <strong>2nd Price:</strong> <?php echo $row['price2'] ?></span><br></h6>
   <h6><span> <strong>Cappacity Limit:</strong> <?php echo $row['cappacity'] ?></span></h6>

 </p>
</blockquote>
<br>
<br>
<br>
<div>
 <h6> <strong><?php echo $row['description'] ?></strong></h6>
 
</div>

<!-- END CODE -->
<?php require_once 'config/footerOut.php'; ?>