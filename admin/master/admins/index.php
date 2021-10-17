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

$conditions['where'] = array(
    'auth' => 'admin',
);

$users = $db->getRows('users',$conditions);

// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<?php 
// session_start();
// require_once '../../connect.php';

// require_once '../../functions.php';

// checkAuth('users','index.php');

// $sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
// $get = mysqli_query($connect,$sql);
// $row = mysqli_fetch_assoc($get);

?>  

<?php require_once '../../config/headerIn.php'; ?>

                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                        <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] == 'master') { ?> 
                         <a href="addEdit.php" class="btn btn-secondary"><li class="fas fa-plus"> Add New Admin</li></a>
                        <?php } ?>
                               

                        <!-- ============================================================== -->
                        <!-- card influencer one -->
                        <!-- ============================================================== -->
                        <?php if(!empty($users)){ $count = 0; foreach($users as $row){ $count++; ?>

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
                                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="float-xl-right float-none mt-xl-0 mt-4">

                                                <a href="userAction.php?action_type=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-secondary">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } }else{ ?>
                           <div class="alert alert-secondary" role="alert">
                                No Admins Found
                            </div>
                        <?php } ?>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Code -->
                    <!-- ============================================================== --> 

<?php require_once '../../config/footerIn.php'; ?>