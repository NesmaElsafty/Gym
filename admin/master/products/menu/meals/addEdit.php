
<?php 
session_start();
error_reporting(0);
require_once '../../../../config/header.php';


checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

$action = '';
if (isset($_GET['id'])) {
    $action = 'edit'; 
    $sql = "SELECT * FROM packages where id = '".$_GET['id']."'";
    $get = mysqli_query($connect,$sql);
    $rows=mysqli_fetch_assoc($get);
}else{
    $action = 'add';
}


?>  

<?php require_once '../../../../config/inProheader.php'; ?>

                <a href="addEdit.php?name=<?php echo $_GET['name']; ?>">
                    <button class="btn btn-secondary">ADD Meal</button>
                </a>
                <!-- <h5><?php echo $_SESSION['pack_name']; ?></h5> -->
                <!-- ============================================================== -->
                <!-- Code -->
                <!-- ============================================================== -->
                <form class="needs-validation" action="userAction.php" method="post" novalidate>
                    <input type="hidden" name="id" value="<?php echo !empty($_GET['id'])?$_GET['id']:''; ?>">
                    <input type="hidden" name="type" value="menu_meal">
                    <input type="hidden" name="name" value="<?php echo $_GET['name'];?>">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom02">Meal Name</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="meal_name" value="<?php echo !empty($rows['meal_name'])?$rows['meal_name']:''; ?>" required>

                    </div>
                    <div class="form-group">
                        <label class="col-12 col-sm-3 col-form-label text-sm-left">Meal Description</label>
                        <div class="col-12 col-sm-8 col-lg-12">
                            <textarea required="" class="form-control" name="meal_description">
                                <?php echo !empty($rows['meal_description'])?$rows['meal_description']:''; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">Fats</label>
                            <input type="number" name="fats" value="<?php echo !empty($rows['fats'])?$rows['fats']:''; ?>" class="form-control" id="validationCustom03" placeholder="Fats" required>
                            
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="validationCustom04">Calories</label>
                            <input type="number" name="calories" value="<?php echo !empty($rows['calories'])?$rows['calories']:''; ?>" class="form-control" id="validationCustom04" placeholder="Calories" required>
                            
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="validationCustom04">Protein</label>
                            <input type="number" name="protein" value="<?php echo !empty($rows['protein'])?$rows['protein']:''; ?>" class="form-control" id="validationCustom04" placeholder="Protein" required>
                            
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="validationCustom05">Carbs</label>
                            <input type="number" name="carbs" value="<?php echo !empty($rows['carbs'])?$rows['carbs']:''; ?>" class="form-control" id="validationCustom05" placeholder="Carbs" required>

                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="validationCustom05">Price</label>
                            <input type="number" name="price" value="<?php echo !empty($rows['price'])?$rows['price']:''; ?>" class="form-control" id="validationCustom05" placeholder="Price" required>

                        </div>

                        <div class="col-sm-6 pl-0">
                            <p class="text-right">
                                <button type="submit" name="<?php echo $action; ?>" class="btn btn-space btn-primary">Submit</button>
                                <a href="../../index.php">
                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                </a>
                            </p>
                        </div>

                    </form>
                </div>
                <!-- ============================================================== -->
                <!-- End Code -->
                <!-- ============================================================== --> 
 <?php require_once '../../../../config/inProfooter.php'; ?>