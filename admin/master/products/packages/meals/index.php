
<?php 
session_start();
require_once '../../../../config/header.php';

    
checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

$sql = "SELECT * FROM packages WHERE type = 'package_meal' AND name='".$_GET['name']."'";
// die($sql);
$get = mysqli_query($connect,$sql);

if (isset($_GET['name'])) {
    $_SESSION['pack_name'] = $_GET['name'];
}
?>  

 <?php require_once '../../../../config/inProheader.php'; ?>
                    <?php if (!empty($_GET['name'])) { ?>
                        <a href="addEdit.php?name=<?php echo $_GET['name']; ?>">
                        <button class="btn btn-secondary">ADD Meal</button>
                    </a>
                    <?php } ?>
                    
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                    <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <?php if (empty($_GET['name'])) { 
                                $_SESSION['msg'] = "Please Choose Meal First";
                            ?>

                               <div class="alert alert-danger" style="text-align: center;"><?php echo $_SESSION['msg']; ?></div>
                            
                            <?php }else{ ?>
                            <h5 class="card-header"><?php echo $_GET['name']; ?></h5>
                        <?php } ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Fats</th>
                                                <th>Carbs</th>
                                                <th>Calories</th>
                                                <th>Protein</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row=mysqli_fetch_assoc($get)){?>
                                            <tr>
                                                <td><?php echo $row['meal_name'] ?></td>
                                                <td><?php echo $row['meal_description'] ?></td>
                                                <td><?php echo $row['fats'] ?></td>
                                                <td><?php echo $row['carbs'] ?></td>
                                                <td><?php echo $row['calories'] ?></td>
                                                <td><?php echo $row['protein'] ?></td>
                                                <td>
                                                    <a href="addEdit.php?id=<?php echo $row['id']; ?>">Edit</a>||
                                                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
                    <!-- ============================================================== -->
                    <!-- End Code -->
                    <!-- ============================================================== --> 

                <?php require_once '../../../../config/inProfooter.php'; ?>