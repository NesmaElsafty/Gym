
<?php 
session_start();

require_once '../../config/header.php';

checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

// Include and initialize DB class
// require_once '../../db.php';
$db = new DB();

// Fetch the users data
$users = $db->getRows('ourdata');

    // $conditions['where'] = array(
    //     'id' => $users['id']
    // );
$conditions['return_type'] = 'single';
$userData = $db->getRows('ourdata', $conditions);

?>  
<?php require_once '../../config/headerIn.php'; ?>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                        <?php if ($userData == '') { ?>
                                <a href="addEdit.php" class="btn btn-secondary"><i class="plus"></i> ADD Data</a>
                        <?php }else{ ?>
                                <a href="addEdit.php?id=<?php echo $userData['id']; ?>" class="btn btn-secondary"><i class="plus"></i> Edit Data</a>
                        <?php } ?>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card" id="align">
                                <div class="card-body">
                                    <h3 class="text-left">About Us</h3>
                                    <div class="card" id="images">
                                        <div class="card-body">
                                            <img src="images/<?php echo $userData['image']; ?>" class="img-fluid mr-3" alt="Responsive image">
                                            
                                        </div>
                                    </div>
                                    <p class="text-left"><?php echo $userData['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card" id="align">
                                <div class="card-body">
                                    <h3 class="text-left">Contact Us</h3>
                                    <h5 class="text-left">
                                        Email: <?php echo $userData['email']; ?> <br>
                                        phone: <?php echo $userData['phone']; ?> <br>
                                        facebook: <?php echo $userData['facebook']; ?> <br>
                                        twitter: <?php echo $userData['twitter']; ?> <br>
                                        instagram: <?php echo $userData['instagram']; ?> <br>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- End Code -->
                    <!-- ============================================================== --> 

<?php require_once '../../config/footerIn.php'; ?>