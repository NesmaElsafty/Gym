<?php
// Start session
// error_reporting(0);
session_start();

require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';


checkAuth('doctors','index.php');

$sql = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);
$title = 'Settings';


?>
<?php require_once 'config/headerOut.php'; ?>
                                <!-- CODE HERE -->
                                <form method="post" action="userAction.php" enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="type" value="auth"> -->
                                    <input type="hidden" name="unID" value="<?php echo $row['unID']; ?>"> 
                                    
                                    <input type="hidden" name="oldID" value="<?php echo $_GET['id']; ?>">
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9 p-0">
                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control input-full" id="inlineinput" placeholder="Enter Input">
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-9 p-0">
                                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control input-full" id="inlineinput" >
                                        </div>
                                    </div>
                                        
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Address</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control input-full" id="inlineinput" placeholder="Enter Input">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Age</label>
                                            <div class="col-md-9 p-0">
                                                <input type="number" name="age" class="form-control input-full" id="inlineinput" value="<?php echo $row['age'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Cappacity</label>
                                            <div class="col-md-9 p-0">
                                                <input type="number" name="cappacity" class="form-control input-full" id="inlineinput" value="<?php echo $row['cappacity'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="exampleFormControlFile1" class="col-md-3">Change Image</label>
                                            <input type="file" name="image" class="col-md-9 form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="comment" class="col-md-3">Summary</label>
                                            <textarea class="form-control col-md-9" name="summary" id="comment" rows="5">
                                                <?php echo $row['description']; ?>
                                            </textarea>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                        <div class="card-action">
                                            <button class="btn btn-info" style="float: right;" type="submit" name="userSubmit">Submit</button>
                                        </div>
                                    </form>
                                    <br>
                                    <br>
                                    <br>

                                    <!-- PASSWORD -->
                                <h4 class="page-title">Password</h4>

                                <form method="post" action="password.php">
                                    <input type="hidden" name="unID" value="<?php echo $row['unID']; ?>"> 
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                                    <div class="form-group form-inline">
                                            <label for="password" class="col-md-3 col-form-label">Current Password</label>
                                            <div class="col-md-9 p-0">
                                                <input type="password" name="OldPass" class="form-control input-full" id="inlineinput" placeholder="****" required>
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="password" class="col-md-3 col-form-label">New Password</label>
                                            <div class="col-md-9 p-0">
                                                <input type="password" name="password" class="form-control input-full" id="inlineinput" placeholder="****">
                                            </div>
                                        </div>
                                    <div class="card-action">
                                            <button class="btn btn-info" style="float: right;" type="submit" name="passSubmit">Submit</button>
                                        </div>
                                    </form>

                                    <!-- END CODE -->
                                <?php require_once 'config/footerOut.php'; ?>