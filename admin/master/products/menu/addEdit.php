
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
    $sql = "SELECT * FROM packages where id = '".$_GET['id']."'";
    $get = mysqli_query($connect,$sql);
    $rows =mysqli_fetch_assoc($get);
}else{
    $action = 'add';
}
?>

<?php require_once '../../../config/Proheader.php'; ?>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><?php echo $action; ?>  Menu Category</h5>
                                <div class="card-body">
                                    <form action="userAction.php" method="post"> 
                                        <input type="hidden" name="id" value="<?php echo !empty($_GET['id'])?$_GET['id']:''; ?>">
                                        <input type="hidden" name="type" value="menu">


                                        <label for="validationCustom01">Name</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" value="<?php echo !empty($rows['name'])?$rows['name']:''; ?>"  required>
                                        <br>


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