<?php 
require_once '../config/PHPheader.php';

$sql = "SELECT * FROM ourdata";
$get = mysqli_query($connect,$sql);
$about_us = mysqli_fetch_assoc($get);
$actionLabel = 'About Us';
?>
<?php require_once '../config/header.php'; ?>
        <!--end navbar -->
      
     <div class="container">

     	<div class="card mb-3" style="margin-top: 50px; padding-bottom: 90px;">
		  <img src="../../admin/master/ourdata/images/<?php echo $about_us['image'] ?>" class="card-img-top">
		  <div class="card-body">
		    <p class="card-text"><?php echo $about_us['description']; ?></p>
		  </div>
		</div>
       
     </div>
     
<?php require_once '../config/footer.php'; ?>
    