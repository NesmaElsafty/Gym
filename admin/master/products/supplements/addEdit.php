
<?php 
session_start();
require_once '../../../config/header.php';


checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

$action = '';
if (isset($_GET['id'])) {
    $action = 'edit'; 
    $sql = "SELECT * FROM supplements where id = '".$_GET['id']."'";
    $get = mysqli_query($connect,$sql);
    $rows=mysqli_fetch_assoc($get);
}else{
    $action = 'add';
}
?>  

<?php require_once '../../../config/Proheader.php'; ?>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $action; ?> Product</h5>
                                <div class="card-body">
                                    <form action="userAction.php" method="post" enctype="multipart/form-data"> 
                                        <input type="hidden" name="id" value="<?php echo !empty($_GET['id'])?$_GET['id']:''; ?>">

                                        <label for="validationCustom01">Name</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" value="<?php echo !empty($rows['name'])?$rows['name']:''; ?>"  required>

                                        <br>
                                        <?php if(isset($_GET['id'])){ ?>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">File Input</label>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="image" class="custom-file-input" id="customFile" required>
                                                <label class="custom-file-label" for="customFile">File Input</label>
                                            </div>
                                        <?php } ?>
                                        
                                        <div class="form-row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Price</label>
                                                <input type="number" class="form-control" id="validationCustom03" placeholder="Price" name="price" value="<?php echo !empty($rows['price'])?$rows['price']:''; ?>" required>
                                                
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Storage</label>
                                                <input type="number" class="form-control" name="storage" id="validationCustom04" placeholder="Storage" value="<?php echo !empty($rows['storage'])?$rows['storage']:''; ?>" required>
                                                
                                            </div>
                                            <?php if (!empty($rows['best_seller'])) { ?> 
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" id="invalidCheck" name="best_seller" checked>
                                                            <label class="form-check-label" for="invalidCheck">
                                                                Best Seller
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }else{ ?>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" id="invalidCheck" name="best_seller">
                                                            <label class="form-check-label" for="invalidCheck">
                                                                Best Seller
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" name="<?php echo $action; ?>" type="submit">Submit form</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Code -->
                    <!-- ============================================================== --> 
<?php require_once '../../../config/Profooter.php'; ?>