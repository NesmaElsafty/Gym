<?php 
session_start();
require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';

if (isset($_SESSION['unID'])) {
	$sql = "SELECT * FROM clients WHERE unID = '".$_SESSION['unID']."'";
	$run = mysqli_query($connect, $sql);
	$data = mysqli_fetch_assoc($run);
}
// For Articles
$art_sql = "SELECT * FROM articles WHERE type != 'ads' ORDER BY created DESC";
$art = mysqli_query($connect,$art_sql);
$art_count = 0;

$articles = mysqli_fetch_All($art,MYSQLI_ASSOC);
$art_num = mysqli_num_rows($art);

$ad_sql = "SELECT * FROM articles WHERE type = 'ads'";
$ad = mysqli_query($connect,$ad_sql);
// $ads = mysqli_fetch_All($ad,MYSQLI_ASSOC);
// $last = end($ads);
// print_r($last);


//For Slider
$sup_sql = "SELECT * FROM supplements WHERE best_seller = 'true'";
$sup = mysqli_query($connect,$sup_sql);

$sup_count = 0; 
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Protein Box</title>



	<link rel="icon" href="config/New folder/images/WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg">
	<link rel="stylesheet" type="text/css" href="config/New folder/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="config/New folder/css/bootstrapmodefied.css">
	<link rel="stylesheet" type="text/css" href="config/New folder/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="config/New folder/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="config/New folder/css/mainpage.css">
	<link rel="stylesheet" type="text/css" href="config/New folder/css/cart.css">

</head>
<body>

	<!--start navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container" style="max-width: 1150px;">
			<a class="navbar-brand" href="#"><img src="config/New folder/images/WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg" alt="protien" class="img-fluid"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="calculator/index.php">Calculator</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="ourDoctor/index.php">Our Doctors</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Our Products
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="supplements/index.php">Supplement</a>
							<a class="dropdown-item" href="packages/index.php">Packges</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="menu/index.php">Menu</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="ourdata/about_us.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="ourdata/contact_us.php">contact Us</a>
					</li>
					

					<?php if (!empty($_SESSION['unID'])) { ?> 
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="user.png" class="img-responsive" style="width:40px;height: 40px;margin-left: 100px;">
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="auth/profile.php?id=<?php echo $_SESSION['unID']; ?>">My Profile</a>
								<a class="dropdown-item" href="auth/addEdit.php?id=<?php echo $_SESSION['unID']; ?>">Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="auth/logout.php?id=<?php echo $_SESSION['unID']; ?>">Log out</a>
							</div>
						</li>
						<?php if (!empty($data['doctor'])) {?>
							<li style="font-size: 30px;position: relative;right: -5px;top:13px" >
								<a href="chat/chatroom.php?id=<?php $_SESSION['unID']; ?>"><i class="far fa-comments" style="color: white;"></i></a>
								<span style="width:10px;height:10px;border-radius:50%;/"></span>
							</li>
						<?php } ?>

					<?php }else{ ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Regist
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="auth/addEdit.php">Sign Up</a>
								<a class="dropdown-item" href="auth/login.php">Sign In</a>
							</div>
						</li>
					<?php } ?>

					
					
				</ul>   
			</div>
		</div>
	</nav>
	<?php if (isset($_SESSION['msg'])) { ?>
		<div class="alert alert-success" style="text-align: center;" role="alert">
			<?php echo $_SESSION['msg'];  ?>
		</div>
		<?php 
	// exit();
		unset($_SESSION['msg']);
	} ?>
	<!--end navbar -->
	<!--start Ads-->
	<div class="container-fluid">

		<?php while ($last = mysqli_fetch_assoc($ad)){ 

			if (!empty($last['image']) && $last['assign'] == 1) { ?>
				<div class="ads" style="margin:20px 10px 0 0">
					<a href="<?php echo $last['url']; ?>">
						<img src="../admin/master/ads/images/<?php echo $last['image']; ?>" style="width:150px;height:550px;float:right; display: inline; ">
					</a>
				</div>

			<?php }elseif ($last['assign'] == 2) { ?>
				<div class="ads" style="margin:20px 10px 0 0">
					<a href="<?php echo $last['url']; ?>"><img src="../admin/master/ads/images/<?php echo $last['image']; ?>" style="width:150px;height:550px;float:left;display: inline;"></a>
				</div>
			<?php } } ?>
<!-- START ARTICLES -->
			<div class="container">

				<?php 
				for ($i=0; $i <= 2; $i++) { 
					if (!empty($articles[$i]['image']) && $articles[$i]['type'] == 'doctor') { 
						?>
						<figure class="figure">

							<img src="../doctor/articles/images/<?php echo $articles[$i]['image']; ?>" class="figure-img img-fluid rounded" style="float: center" alt="A generic square placeholder image with rounded corners in a figure.">
							<blockquote class="blockquote">
								<p class="mb-0"><?php echo $articles[$i]['description'] ?></p>
							</blockquote>
							<figcaption class="figure-caption"><?php echo $articles[$i]['modified']; ?></figcaption>
						</figure>

					<?php }elseif(!empty($articles[$i]['image']) && $articles[$i]['type'] == 'admin'){ ?>
						<figure class="figure">
							<img src="../admin/master/articles/images/<?php echo $articles[$i]['image']; ?>" class="figure-img img-fluid rounded" style="float: center" alt="A generic square placeholder image with rounded corners in a figure.">
							<blockquote class="blockquote">
								<p class="mb-0"><?php echo $articles[$i]['description'] ?></p>
							</blockquote>
							<figcaption class="figure-caption"><?php echo $articles[$i]['modified']; ?></figcaption>
						</figure>

					<?php 	}elseif($articles[$i]['type'] == 'offer'){ ?>
						<figure class="figure">

							<img src="../admin/master/offers/images/<?php echo $articles[$i]['image']; ?>" class="figure-img img-fluid rounded" style="float: center" alt="A generic square placeholder image with rounded corners in a figure.">
							<blockquote class="blockquote">
								<p class="mb-0"><?php echo $articles[$i]['description'] ?></p>
							</blockquote>
							<figcaption class="figure-caption"><?php echo $articles[$i]['modified']; ?></figcaption>
						</figure>
					<?php }else{ ?>
						<div class="row">
							<h5 style="color: white;margin-top: 10px;"><?php echo $articles[$i]['description'] ?>
						</h5>
						<blockquote class="blockquote">
							<p class="mb-0"><?php echo $articles[$i]['modified'] ?></p>
						</blockquote>
						<hr>
					</div>

				<?php } } ?>
  	<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  		<div class="carousel-inner">

  			<div class="carousel-item active">
  				<div class="row">
  					<?php while ($supplement = mysqli_fetch_assoc($sup)){ ?>
  						<div class="col-3">
  							<div class="card" style="width: 99%;background-color: transparent;">
  								<a href="#"><img src="../admin/master/products/supplements/images/<?php echo $supplement['image'];?>" class="card-img-top" ></a>
  								<div class="card-body">
  									<p class="card-text" style="color: white;"><?php echo $supplement['name']; ?></p>
  								</div>
  							</div>
  						</div>
  					<?php } ?>       
  				</div>
  			</div> -->

  			<!-- <?php for ($x=0; $x <= 4 ; $x++) { ?> 
  				<div class="carousel-item">
  					<div class="row">
  						<?php while ($supplement = mysqli_fetch_assoc($sup)){ ?>
  							<div class="col-3">
  								<div class="card" style="width: 99%;background-color: transparent;">
  									<a href="#">
  										<img src="../admin/master/products/supplements/images/<?php echo $supplement['image'];?>" class="card-img-top">
  									</a>
  									<div class="card-body">
  										<p class="card-text" style="color: white;"><?php echo $supplement['name']; ?></p>
  									</div>
  								</div>
  							</div>
  						<?php } ?>       
  					</div>
  				</div>
  			<?php } ?>

  		</div>
  	</div> -->
<!-- 
  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
  		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
  		<span class="sr-only">Previous</span>
  	</a>
  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  		<span class="carousel-control-next-icon" aria-hidden="true"></span>
  		<span class="sr-only">Next</span>
  	</a> -->





  <?php 
  for ($y=3; $y <= 5; $y++) { 
  	if (!empty($articles[$y]['image']) && $articles[$y]['type'] == 'doctor') { 
  		?>
  		<figure class="figure">

  			<img src="../doctor/articles/images/<?php echo $articles[$y]['image']; ?>" class="figure-img img-fluid rounded" style="float: center" alt="A generic square placeholder image with rounded corners in a figure.">
  			<blockquote class="blockquote">
  				<p class="mb-0"><?php echo $articles[$y]['description'] ?></p>
  			</blockquote>
  			<figcaption class="figure-caption"><?php echo $articles[$y]['modified']; ?></figcaption>
  		</figure>



  	<?php }elseif(!empty($articles[$y]['image']) && $articles[$y]['type'] == 'admin'){ ?>
  		<figure class="figure">
  			<img src="../admin/master/articles/images/<?php echo $articles[$y]['image']; ?>" class="figure-img img-fluid rounded" style="float: center" alt="A generic square placeholder image with rounded corners in a figure.">
  			<blockquote class="blockquote">
  				<p class="mb-0"><?php echo $articles[$y]['description'] ?></p>
  			</blockquote>
  			<figcaption class="figure-caption"><?php echo $articles[$y]['modified']; ?></figcaption>
  		</figure>

  	<?php 	}elseif($articles[$y]['type'] == 'offer'){ ?>
  		<figure class="figure">

  			<img src="../admin/master/offers/images/<?php echo $articles[$y]['image']; ?>" class="figure-img img-fluid rounded" style="float: center" alt="A generic square placeholder image with rounded corners in a figure.">
  			<blockquote class="blockquote">
  				<p class="mb-0"><?php echo $articles[$y]['description'] ?></p>
  			</blockquote>
  			<figcaption class="figure-caption"><?php echo $articles[$y]['modified']; ?></figcaption>
  		</figure>
  	<?php }else{ ?>
  		<div class="row">
  			<h5 style="color: white;margin-top: 10px;"><?php echo $articles[$y]['description'] ?>
  		</h5>
  		<blockquote class="blockquote">
  			<p class="mb-0"><?php echo $articles[$y]['modified'] ?></p>
  		</blockquote>
  		<hr>
  	</div>

  <?php } } ?>

  <!--end articles-->
  <!--start slider-->
  <!-- <div class="container"> -->
  	<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  		<div class="carousel-inner">

  			<div class="carousel-item active">
  				<div class="row">
  					<?php while ($supplement = mysqli_fetch_assoc($sup)){ ?>
  						<div class="col-3">
  							<div class="card" style="width: 99%;background-color: transparent;">
  								<a href="#"><img src="../admin/master/products/supplements/images/<?php echo $supplement['image'];?>" class="card-img-top" ></a>
  								<div class="card-body">
  									<p class="card-text" style="color: white;"><?php echo $supplement['name']; ?></p>
  								</div>
  							</div>
  						</div>
  					<?php } ?>       
  				</div>
  			</div>

  			<?php for ($z=0; $z <= 4 ; $z++) { ?> 
  				<div class="carousel-item">
  					<div class="row">
  						<?php while ($supplement = mysqli_fetch_assoc($sup)){ ?>
  							<div class="col-3">
  								<div class="card" style="width: 99%;background-color: transparent;">
  									<a href="#">
  										<img src="../admin/master/products/supplements/images/<?php echo $supplement['image'];?>" class="card-img-top">
  									</a>
  									<div class="card-body">
  										<p class="card-text" style="color: white;"><?php echo $supplement['name']; ?></p>
  									</div>
  								</div>
  							</div>
  						<?php } ?>       
  					</div>
  				</div>
  			<?php } ?>

  		</div>
  	</div>

  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
  		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
  		<span class="sr-only">Previous</span>
  	</a>
  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  		<span class="carousel-control-next-icon" aria-hidden="true"></span>
  		<span class="sr-only">Next</span>
  	</a> -->

  	<!--end slider-->
  	<!--start articles-->
  </div>
</div>

<!--start footer-->
<?php 
$sql = "SELECT * FROM ourdata";
$get = mysqli_query($connect,$sql);
$contact_us = mysqli_fetch_assoc($get);
?>
<div class="footer">
	<div class="container">

		<ul>
			<li>
				<a href="<?php echo $about_us['facebook']; ?>">
				<img src="config/New folder/images/iconimg37077.png" title="facebook">
			</a>
		</li>

			<li>
				<a href="<?php echo $about_us['instagram']; ?>">
				<img src="config/New folder/images/instagram (1).png" title="instgram">
			</a>
		</li>

			<li>
				<a href="<?php echo $about_us['twitter']; ?>">
				<img src="config/New folder/images/578614-64.png" title="twitter">
			</a>
		</li>
			
			<li>
			<a href="#">
					<img src="config/New folder/images/shopping-cart.png" title="cart" style="height:30px;width:30px;margin-left: 10px;">
			</a>
			</li>
			<!-- <li>

			<a href="#">
					  <p style="font-size:18px;color: white;">your cart</p>
			</a>
			</li> -->

		</ul>
		copy write &copy; 2019 <a href=""> Coding Squad </a>

	</div>
</div>
<!--end footer-->
<script src="config/New folder/js/jquery-3.4.1.min.js"></script>  
<script src="config/New folder/js/popper1.min.js"></script>       
<script src="config/New folder/js/bootstrap.min.js"></script>
<script src="config/New folder/js/cart1.js"></script>


</body>
</html>