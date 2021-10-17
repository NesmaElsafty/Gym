<?php 
session_start();
require_once '../config/header.php';


checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);
$bc1 = ''; $bc2 = '';

?>	

<?php require_once '../config/headerOut.php'; ?>

					<!-- ============================================================== -->
					<!-- Code -->
					<!-- ============================================================== -->
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                           
                                                <div class="pl-xl-3">
                                                    <div class="m-b-0">
                                                        <div class="user-avatar-name d-inline-block">
                                                            <h2 class="font-24 m-b-10"><?php echo $row['name']; ?></h2>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="user-avatar-address">
                                                        <p class="mb-2"><i class=" fas fa-bolt mr-2  text-primary"></i><?php echo $row['email']; ?><span class="m-l-10"><?php echo $row['auth']; ?><span class="m-l-20"><?php echo $row['unID']; ?></span></span>
                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
					<!-- ============================================================== -->
					<!-- End Code -->
					<!-- ============================================================== -->	

<?php require_once '../config/footerOut.php'; ?>
