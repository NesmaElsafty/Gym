<?php 
$ad_sql = "SELECT * FROM articles WHERE type = 'ads'";
$ad = mysqli_query($connect,$ad_sql); 
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $actionLabel; ?></title>

		<link rel="icon" href="../config/New folder/images/WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/bootstrapmodefied.css">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/mainpage.css">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/contact.css">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/register.css">

        <link rel="stylesheet" type="text/css" href="../config/New folder/css/cart.css">
        <link rel="stylesheet" type="text/css" href="../config/New folder/css/popup.css">
		<link rel="stylesheet" type="text/css" href="../config/New folder/css/meals.css">
		<link rel="stylesheet" type="text/css" href="../config/New folder/css/effort.css">
		<link rel="stylesheet" type="text/css" href="../config/New folder/css/effort3.css">
		<link rel="stylesheet" type="text/css" href="../config/New folder/css/weight.css">

</head>
<body>

	<!--start navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container" style="max-width: 1150px;">
			<a class="navbar-brand" href="#"><img src="../config/New folder/images/WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg" alt="protien" class="img-fluid"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../calculator/index.php">Calculator</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../ourDoctor/index.php">Our Doctors</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Our Products
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="../supplements/index.php">Supplement</a>
							<a class="dropdown-item" href="../packages/index.php">Packges</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../menu/index.php">Menu</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../ourdata/about_us.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../ourdata/contact_us.php">contact Us</a>
					</li>
					

					<?php if (!empty($data)) { ?> 
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="../user.png" class="img-responsive" style="width:40px;height: 40px;margin-left: 100px;">
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../auth/profile.php?id=<?php echo $_SESSION['unID']; ?>">My Profile</a>
								<a class="dropdown-item" href="../auth/addEdit.php?id=<?php echo $_SESSION['unID']; ?>">Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../auth/logout.php?id=<?php echo $_SESSION['unID']; ?>">Log out</a>
							</div>
						</li>
						<?php if (!empty($data['doctor'])) {?>
							<li style="font-size: 30px;position: relative;right: -5px;top:13px" >
								<a href="../chat/chatroom.php?id=<?php $_SESSION['unID']; ?>"><i class="far fa-comments" style="color: white;"></i></a>
								<span style="width:10px;height:10px;border-radius:50%;/"></span>
							</li>
						<?php } ?>

					<?php }else{ ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Regist
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../auth/addEdit.php">Sign Up</a>
								<a class="dropdown-item" href="../auth/login.php">Sign In</a>
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
						<img src="../../admin/master/ads/images/<?php echo $last['image']; ?>" style="width:150px;height:550px;float:right; display: inline; ">
					</a>
				</div>

			<?php }elseif ($last['assign'] == 2) { ?>
				<div class="ads" style="margin:20px 10px 0 0">
					<a href="<?php echo $last['url']; ?>"><img src="../../admin/master/ads/images/<?php echo $last['image']; ?>" style="width:150px;height:550px;float:left;display: inline;"></a>
				</div>
			<?php } } ?>