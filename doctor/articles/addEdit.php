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

$actionLabel = !empty($_GET['id'])?'Edit':'Add';


// Get status message from session

?>
<?php require_once '../config/headerIn.php'; ?>

                                <!-- CODE HERE -->
                                <form method="post" action="userAction.php" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="doctor" required>
                                    <input type="hidden" name="unID" value="<?php echo $row['unID']; ?>" required>
                                    <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>" required>
                                    

                                    <?php if (isset($_GET['id']) && !empty($userData['image'])) { ?>
                                        <img src="images/<?php echo $userData['image']?>" class="rounded mx-auto d-block" alt="image" style="height: 200px;width: 200px; ">
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="comment">Article</label>
                                        <textarea class="form-control" id="comment" name="description" rows="5">
                                            <?php echo !empty($userData['description'])?$userData['description']:''; ?>
                                        </textarea>

                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">

                                    </div>
                                    <input type="hidden" name="id" value="<?php echo !empty($userData['id'])?$userData['id']:''; ?>">

                                    <div class="card-action">
                                        <input class="btn btn-success" type="submit" name="userSubmit" value="Submit">

                                    </div>
                                </form>
                                <!-- END CODE -->
                            <?php require_once '../config/footerIn.php'; ?>
