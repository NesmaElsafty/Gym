<?php
// Start session
// error_reporting(0);
session_start(); 
require_once '../../config/header.php';


checkAuth('users','../index.php');
// Retrieve session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// Get user data
$userData = array();
if(!empty($_GET['id'])){
    // Include and initialize DB class
   
    $db = new DB();
    $_SESSION['supId'] = $_GET['id'];
    
    // Fetch the user data
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $userData = $db->getRows('articles', $conditions);
}
$userData = !empty($sessData['userData'])?$sessData['userData']:$userData;
unset($_SESSION['sessData']['userData']);

$actionLabel = !empty($_GET['id'])?'Edit':'Add';

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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                <h5 class="card-header"><?php echo $actionLabel; ?> Article</h5>
                                <div class="card-body">
                                    <form method="post" action="userAction.php" enctype="multipart/form-data">
                                        <input type="hidden" name="oldID" value="<?php echo !empty($_GET['id'])?$_GET['id']:''; ?>" required>
                                        <input type="hidden" name="type" value="admin" required>
                                        <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>" required>
                                        <input type="hidden" name="id" value="<?php echo !empty($userData['id'])?$userData['id']:''; ?>">

                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">File Input</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Article Body</label>
                                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                                                <?php echo !empty($userData['description'])?$userData['description']:''; ?>
                                            </textarea>
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                            <p class="text-left">
                                                <button type="submit" name="userSubmit" class="btn btn-space btn-primary">Submit</button>
                                                <a href="index.php">
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </a>
                                            </p>
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