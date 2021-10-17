<?php

// Start session
session_start();
require_once '../../config/header.php';

checkAuth('users','../index.php');
// Retrieve session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// Include and initialize DB class
// require_once '../../db.php';
$db = new DB();

// Fetch the users data
    

$users = $db->getRows('doctors');

// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<?php require_once '../../config/headerIn.php'; ?>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                        <a href="addEdit.php" class="btn btn-secondary"><li class="fas fa-plus"> Add New Doctor</li></a>

                        <!-- ============================================================== -->
                        <!-- card influencer one -->
                        <!-- ============================================================== -->
                        <?php if(!empty($users)){ $count = 0; foreach($users as $row){ $count++; ?>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="user-avatar float-xl-left pr-4 float-none">
                                                <?php if (!empty($row['image'])) { ?>
                                                    <img src="../../../doctor/images/<?php echo $row['image']; ?>" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                                <?php }else{ ?>
                                                <img src="avatar-1577909_960_720.png" class="rounded-circle user-avatar-xl">
                                                <?php } ?>
                                            </div>
                                            <div class="pl-xl-3">
                                                <div class="m-b-0">
                                                    <div class="user-avatar-name d-inline-block">
                                                        <h2 class="font-24 m-b-10"><?php echo $row['name']; ?></h2>
                                                    </div>
                                                    
                                                </div>
                                                <div class="user-avatar-address">
                                                    <p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i>
                                                        <?php echo $row['address']; ?>
                                                    <span class="m-l-20"><?php echo $row['age']; ?> Year Old</span>
                                                </span>
                                                    </p>
                                                    <p class="mb-2"><?php echo $row['email']; ?>
                                                    <span class="m-l-20">Cappacity: <?php echo $row['cappacity']; ?></span>
                                                    <span class="m-l-20">unID: <?php echo $row['unID']; ?></span></span>
                                                    </p>
                                                    <p class="mb-2">Type: <?php echo $row['type']; ?>
                                                    <span class="m-l-20">1st Plan: <?php echo $row['price1']; ?> L.E</span>
                                                <span class="m-l-20">2nd Plan: <?php echo $row['price2']; ?> L.E</span></span>
                                                    </p>
                                                    
                                                    <!-- <div class="mt-3">
                                                        <a href="#" class="mr-1 badge badge-light">Fitness</a><a href="#" class="mr-1 badge badge-light">Life Style</a><a href="#" class="mr-1 badge badge-light">Gym</a><a href="#" class="badge badge-light">Crossfit</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                <a href="addEdit.php?id=<?php echo $row['unID']; ?>" class="btn btn-info">Edit</a>
                                                <a href="userAction.php?action_type=delete&id=<?php echo $row['id']; ?>"  onclick="return confirm('Are you sure to delete?');" class="btn btn-secondary">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        <?php } }else{ ?>
                         <div class="alert alert-danger" role="alert">
                            No Admins Found
                        </div>
                    <?php } ?>
                </div>
                <!-- ============================================================== -->
                <!-- End Code -->
                <!-- ============================================================== --> 


<?php require_once '../../config/footerIn.php'; ?>