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
 $conditions['where'] = array(
        'type' => 'ads'
    );
    $users = $db->getRows('articles', $conditions);
// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<?php require_once '../../config/headerIn.php'; ?>
                    <a href="addEdit.php" class="btn btn-secondary"><li class="fas fa-plus"> Add Ads</li></a>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    <?php if(!empty($users)){ $count = 0; foreach($users as $row){ $count++; 
                        if ($row['type'] == 'ads') { ?>
                             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <!-- .card -->
                                <div class="card card-figure">
                                    <!-- .card-figure -->
                                    <figure class="figure">
                                        <img class="img-fluid" src="images/<?php echo $row['image']; ?>" alt="Card image cap">
                                        <!-- .figure-caption -->
                                        <figcaption class="figure-caption">
                                             <?php if (!empty($row['assign'])) { ?>
                                                <span><?php echo $row['assign'] ?> One </span>
                                                    <?php } ?>
                                            <div style="float: right;">
                                            <span><?php echo $row['modified'] ?></span>
                                                   
                                            <a href="addEdit.php?id=<?php echo $row['id']; ?>"><li class="fas fa-pencil-alt"></li></a>
                                                <a href="userAction.php?action_type=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?');"><li class="fas fa-trash-alt"></li></a>
                                                
                                            </div>
                                            <div style="float: center">
                                                <a href="<?php echo $row['url'] ?>">
                                            <span><?php echo $row['url'] ?></span>
                                                </a>
                                            </div>
                                        </figcaption>
                                        <!-- /.figure-caption -->
                                    </figure>
                                    <!-- /.card-figure -->
                                </div>
                                <!-- /.card -->
                            </div>
                 <?php   }  } }else{ ?>
                    <div class="alert alert-danger" role="alert">
                        No ads yet
                    </div> 
                <?php } ?>
                <!-- ============================================================== -->
                <!-- End Code -->
                <!-- ============================================================== --> 


<?php require_once '../../config/footerIn.php'; ?>