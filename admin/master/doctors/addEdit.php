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
    $userData = $db->getRows('doctors', $conditions);
}
$userData = !empty($sessData['userData'])?$sessData['userData']:$userData;
unset($_SESSION['sessData']['userData']);

$actionLabel = !empty($_GET['id'])?'Settings':'Add Doctor';

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

        <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
            <div class="col-xs-12">
                <div class="alert alert-success"><?php echo $statusMsg; ?></div>
            </div>
        <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
            <div class="col-xs-12">
                <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
            </div>
        <?php } ?>
        <div class="card-body">
            <form id="form" data-parsley-validate="" novalidate="" method="post" action="userAction.php"> 

                <input type="hidden" name="unID" value="<?php echo !empty($userData['unID'])?$userData['unID']: uniqid(); ?>">




                <div class="form-group row">
                    <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right">username</label>
                    <div class="col-9 col-lg-10">
                        <input id="inputWebSite" type="text" value="<?php echo !empty($userData['name'])?$userData['name']:''; ?>"  placeholder="username" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Email</label>
                    <div class="col-9 col-lg-10">
                        <input id="inputEmail2" type="email" data-parsley-type="email" placeholder="Email" class="form-control" name="email" value="<?php echo !empty($userData['email'])?$userData['email']:''; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-3 col-lg-2 col-form-label text-right">Plan one</label>
                    <div class="col-9 col-lg-10">
                        <input id="price1" type="number" value="<?php echo !empty($userData['price1'])?$userData['price1']:''; ?>"  placeholder="Ex: 300L.E" class="form-control" name="price1" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-3 col-lg-2 col-form-label text-right">Plan Two</label>
                    <div class="col-9 col-lg-10">
                        <input id="price2" type="number" value="<?php echo !empty($userData['price2'])?$userData['price2']:''; ?>" placeholder="Ex: 300L.E" class="form-control" name="price2" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Password</label>
                    <div class="col-9 col-lg-10">
                        <input id="inputPassword2" type="password" readonly name="password" class="form-control" value="123" >
                    </div>
                </div>
                <?php if (!empty($userData['type'])){ 
                        if ($userData['type'] == 'doctor') { ?>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="type" value="doctor" class="custom-control-input" checked>
                                <span class="custom-control-label">Doctor</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="type" value="trainer" class="custom-control-input">
                                <span class="custom-control-label">Trainer</span>
                            </label>
                <?php       }elseif ($userData['type'] == 'trainer') { ?>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="type" value="doctor" class="custom-control-input">
                                <span class="custom-control-label">Doctor</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="type" value="trainer" class="custom-control-input" checked>
                                <span class="custom-control-label">Trainer</span>
                            </label>
                
            <?php } }else{ ?>
                        <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="type" value="doctor" class="custom-control-input">
                                <span class="custom-control-label">Doctor</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="type" value="trainer" class="custom-control-input">
                                <span class="custom-control-label">Trainer</span>
                            </label>
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
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Code -->
<!-- ============================================================== --> 

<?php require_once '../../config/footerIn.php'; ?>