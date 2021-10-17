<?php
// Start session
// error_reporting(0);
session_start();

require_once '../../admin/config/connect.php';
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';

checkAuth('doctors','index.php');

$sql = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

if (isset($_GET['id'])) {
    $query = 'SELECT * FROM clients WHERE unID = "'.$_GET['id'].'"';
$gett = mysqli_query($connect,$query);
$clients = mysqli_fetch_assoc($gett);
}

?>
<?php require_once '../config/headerIn.php'; ?>

                                <!-- CODE HERE -->
                               
                                <blockquote class="blockquote" style="margin-left: 20px; display: inline-block;">
                                  <p class="mb-0">
                                      <h6><span> <strong>Result: </strong> <?php echo $clients['result'] ?></span><br></h6>
                                     <h6><span> <strong>Gender: </strong> <?php echo $clients['gender'] ?></span><br></h6>
                                     <h6><span> <strong>Favorit Food: </strong> <?php echo $clients['food'] ?></span></h6>
                                     <h6><span> <strong>Activity Level: </strong> <?php echo $clients['activity_level'] ?></span></h6>
                                     <h6><span> <strong>Routine: </strong> <?php echo $clients['routine'] ?></span></h6>
                                     <h6><span> <strong>Routine Issues: </strong> <?php echo $clients['routine_issues'] ?></span></h6>
                                     <h6><span> <strong>Goal: </strong> <?php echo $clients['goal'] ?></span></h6>
                                     <h6><span> <strong>Age: </strong> <?php echo $clients['age'] ?></span></h6>
                                     <h6><span> <strong>Height: </strong> <?php echo $clients['height'] ?> Cm</span></h6>
                                     <h6><span> <strong>Weight: </strong> <?php echo $clients['weight'] ?> Kg</span></h6>

                                  </p>
                                </blockquote>

                                
                                
                                <!-- END CODE -->
                           <?php require_once '../config/footerIn.php'; ?>