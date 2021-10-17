<?php 
session_start();
require_once '../../config/header.php';

checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

$actionLabel = !empty($_GET['id'])?'Edit':'Add';

$userData = array();
if(!empty($_GET['id'])){
    // Include and initialize DB class
    // include '../../db.php';
    $db = new DB();
    $_SESSION['supId'] = $_GET['id'];
    
    // Fetch the user data
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $userData = $db->getRows('ourdata', $conditions);
}

?>  
<?php require_once '../../config/headerIn.php'; ?>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><?php echo $actionLabel; ?> Our Data</h5>
                                    <div class="card-body">
                                        <form method="post" action="userAction.php" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo !empty($userData['id'])?$userData['id']:''; ?>">

                                            <input type="hidden" name="oldID" value="<?php echo !empty($_GET['id'])?$_GET['id']:''; ?>" required>
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input id="inputEmail" name="email" value="<?php echo !empty($userData['email'])?$userData['email']:''; ?>" type="email" placeholder="name@example.com" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Phone</label>
                                                <input id="inputText4" value="<?php echo !empty($userData['phone'])?$userData['phone']:''; ?>" type="number" name="phone" class="form-control" placeholder="Numbers">
                                            </div>
                                            
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                                <label class="custom-file-label" for="customFile"  >File Input</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">
                                                    <?php echo !empty($userData['description'])?$userData['description']:''; ?>
                                                </textarea>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputWebSite" class="col-form-label">Faceebook</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="inputWebSite" type="url" required="" data-parsley-type="url" value="<?php echo !empty($userData['facebook'])?$userData['facebook']:''; ?>" name="facebook" placeholder="URL" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputWebSite" class="col-form-label">Twitter</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="inputWebSite" type="url" required="" data-parsley-type="url" value="<?php echo !empty($userData['twitter'])?$userData['twitter']:''; ?>" placeholder="URL" name="twitter" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputWebSite" class="col-form-label">Instagram</label>
                                                <div class="col-9 col-lg-10">
                                                    <input id="inputWebSite" type="url" required="" data-parsley-type="url" value="<?php echo !empty($userData['instagram'])?$userData['instagram']:''; ?>" placeholder="URL" name="instagram" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row pt-2 pt-sm-5 mt-1">

                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" name="userSubmit" class="btn btn-space btn-primary">Submit</button>
                                                        <a href="../index.php">
                                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Code -->
                        <!-- ============================================================== --> 

<?php require_once '../../config/footerIn.php'; ?>