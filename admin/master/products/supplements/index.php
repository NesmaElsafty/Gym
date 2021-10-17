
<?php 
session_start();
require_once '../../../config/header.php';

    
checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);


$sql = "SELECT * FROM supplements";
$get = mysqli_query($connect,$sql);

?>  

 <?php require_once '../../../config/Proheader.php'; ?>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    <a href="addEdit.php" class="btn btn-secondary"><li class="fas fa-plus"> Add Supplement</li></a>

                    <div class="row">
                    <?php while($row=mysqli_fetch_assoc($get)){ 
                        if ($row['best_seller'] != 'true'){
                    ?>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-2"><?php echo $row['name']; ?></h3>
                                        <!-- <h6 class="card-subtitle text-muted">Lorem ipusm dolro sit amet</h6> -->
                                    </div>
                                    <img class="img-fluid" src="images/<?php echo $row['image']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>Price:</strong> <?php echo $row['price']; ?>L.E <br>
                                            <strong>Storage:</strong> <?php echo $row['storage']; ?><br>
                                        </p>
                                        <a href="addEdit.php?id=<?php echo $row['id']; ?>" class="card-link">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="card-link">Delete</a>
                                    </div>
                                </div>
                            </div>
                             <?php }else{ ?>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-2"><?php echo $row['name']; ?></h3>
                                        <h6 class="card-subtitle text-muted">Best Seller</h6>
                                    </div>
                                    <img class="img-fluid" src="images/<?php echo $row['image']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>Price:</strong> <?php echo $row['price']; ?>L.E <br>
                                            <strong>Storage:</strong> <?php echo $row['storage']; ?><br>
                                        </p>
                                        <a href="addEdit.php?id=<?php echo $row['id']; ?>" class="card-link">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="card-link">Delete</a>
                                    </div>
                                </div>
                            </div>
                             <?php }  } ?>
                             
                             
                    <!-- ============================================================== -->
                    <!-- End Code -->
                    <!-- ============================================================== --> 

             <?php require_once '../../../config/Profooter.php'; ?>