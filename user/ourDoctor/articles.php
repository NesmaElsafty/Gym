<?php 
require_once '../config/PHPheader.php';


if (isset($_GET['id'])) {

	$sql = "SELECT * FROM articles WHERE unID = '".$_GET['id']."' ORDER BY created DESC";
	$get = mysqli_query($connect,$sql);
	// $article = mysqli_fetch_assoc($get); // validate
}
$sql = "SELECT * FROM doctors where unID = '".$_GET['id']."'";
$gett = mysqli_query($connect,$sql);
$info = mysqli_fetch_assoc($gett);

?>
<?php require_once '../config/header.php'; ?>

	<!--end navbar -->
	<!--start articles-->
	<div class="container-fluid">
		<!-- For Ads -->

		<div class="container">
		 
			<?php while ($articles = mysqli_fetch_assoc($get)){ ?>
				<?php if (!empty($articles['image'])) { ?>
				<div class="row">
					<img src="../admin/master/articles/images/<?php echo $articles['image']; ?>" class="img-responsive" style="width: 80px;height: 80px;margin-top: 50px;">
				</div>
			<?php } ?>
				<div class="row">
					<h5 style="color: white;margin-top: 10px;"><?php echo $articles['description'] ?></h5>
					<p><?php echo $articles['modified']; ?></p>
					<hr>
				</div>

				<?php } ?>

<?php require_once '../config/footer.php'; ?>
		