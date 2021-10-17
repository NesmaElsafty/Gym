<?php

// Start session // HTML
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
    
    // Fetch the user data
    $conditions['where'] = array(
        'unID' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $userData = $db->getRows('users', $conditions);
}
$userData = !empty($sessData['userData'])?$sessData['userData']:$userData;
unset($_SESSION['sessData']['userData']);

$actionLabel = !empty($_GET['id'])?'Settings':'Add Admin';

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
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"><?php echo $actionLabel;?></h5>
                            
                            <?php if(!empty($_SESSION['msg'])){ ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-info"><?php echo $_SESSION['msg']; ?></div>
                                </div>
                                <?php unset($_SESSION['msg']);} ?>
                            <div class="card-body">
                                <form id="form" data-parsley-validate="" novalidate="" method="post" action="userAction.php"> 
                                 <?php if (isset($_GET['id'])) { ?>
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <input type="hidden" name="auth" value="<?php echo $_SESSION['auth'] ?>">
                                     <input type="hidden" name="unID" value="<?php echo $_SESSION['unID'] ?>">
                                 <?php }else{ ?>
                                    <input type="hidden" name="auth" value="admin">
                                    <input type="hidden" name="unID" value="<?php echo uniqid(); ?>">
                                 <?php } ?>

                                 <div class="form-group row">
                                    <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right">username</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputWebSite" type="text"  placeholder="username" class="form-control" value="<?php echo !empty($userData['name'])?$userData['name']:''; ?>" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Email</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputEmail2" type="email" data-parsley-type="email" placeholder="Email" class="form-control" value="<?php echo !empty($userData['email'])?$userData['email']:''; ?>" name="email" required>
                                    </div>
                                </div>

                                <?php if (empty($_GET['id'])) { ?>
                                    <div class="form-group row">
                                    <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Password</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputPassword2" type="password" name="password" value="0000" class="form-control" placeholder="password" readonly required>
                                    </div>
                                </div>
                                <?php } ?>
                                 
                                                
                                <div class="row pt-2 pt-sm-5 mt-1">
                                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                                    </div>
                                    <div class="col-sm-6 pl-0">
                                        <p class="text-right">
                                            <input name="userSubmit" type="submit" class="btn btn-space btn-primary">
                                            <a href="../home.php">
                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                                 <?php if (isset($_GET['id'])) { ?>
                            <form id="form" data-parsley-validate="" novalidate="" method="post" action="password.php"> 
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                     <input type="hidden" name="unID" value="<?php echo $_SESSION['unID'] ?>">                 
                                <div class="form-group row">
                                    <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Current</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputPassword2" type="password" name="OldPass" class="form-control" placeholder="Current Password" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">New</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputPassword2" type="password" name="password" class="form-control" placeholder="New password" required>
                                    </div>
                                </div>

                                <div class="row pt-2 pt-sm-5 mt-1">
                                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                                    </div>
                                    <div class="col-sm-6 pl-0">
                                        <p class="text-right">
                                            <input name="passSubmit" type="submit" class="btn btn-space btn-primary">
                                            <a href="../home.php">
                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Code -->
                <!-- ============================================================== --> 

<?php require_once '../../config/footerIn.php'; ?>
