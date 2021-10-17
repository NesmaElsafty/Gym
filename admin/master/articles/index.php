<?php
// Start session
session_start();
require_once '../../config/header.php';

checkAuth('users','../index.php');
// Retrieve session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// Include and initialize DB class
$db = new DB();

// Fetch the users data
$users = $db->getRows('articles');

// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<?php require_once '../../config/headerIn.php'; ?>
                    <a href="addEdit.php" class="btn btn-secondary"><li class="fas fa-plus"> Add Article</li></a>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    <?php if(!empty($users)){ $count = 0; foreach($users as $row){ $count++; 
                        if ($row['type'] == 'admin') { ?>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header"><?php echo $row['name']; ?></h5>

                                        <div class="card-body">
                                            <div class="media">
                                                <?php if(empty($row['image'])){ ?> 
                                                <img class="mr-3 user-avatar-lg rounded" src="../assets/images/avatar-1.jpg" alt="Generic placeholder image">
                                                <?php }else{ ?>
                                                    <img class="mr-3 user-avatar-lg rounded" src="images/<?php echo $row['image']; ?>" alt="Generic placeholder image">
                                                <?php } ?>
                                                <div class="media-body">
                                                    <!-- <h5>Media heading</h5> -->
                                                <p><?php echo $row['description']; ?></p>
                                                <?php if($row['type'] == 'admin'){ ?>
                                                <a href="addEdit.php?id=<?php echo $row['id']; ?>"><li class="fas fa-pencil-alt"></li></a>
                                                <?php } ?>
                                                <a href="userAction.php?action_type=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?');"><li class="fas fa-trash-alt"></li></a>
                                                <span><?php echo $row['modified'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                 <?php   } } }else{ ?>
                    <div class="alert alert-danger" role="alert">
                        No Articles yet
                    </div> 
                <?php } ?>
                <!-- ============================================================== -->
                <!-- End Code -->
                <!-- ============================================================== --> 

   
<?php require_once '../../config/footerIn.php'; ?>
