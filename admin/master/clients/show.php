<?php 

session_start();
require_once '../../config/header.php';


checkAuth('users','../index.php');

if (isset($_GET['id'])) {
	$sql = "SELECT * FROM clients WHERE unID = '".$_GET['id']."'";
	$get = mysqli_query($connect,$sql);
	$clients = mysqli_fetch_assoc($get);

}else{
	header('location:index.php');
}
?>

<?php require_once '../../config/headerIn.php'; ?>
					<!-- ============================================================== -->
					<!-- Code -->
					<!-- ============================================================== -->
					<div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <!-- ============================================================== -->
                                    <!-- list styled  -->
                                    <!-- ============================================================== -->
                                    <div class="card" id="styled-list">
                                        <h5 class="card-header"><?php echo $clients['name']; ?></h5>
                                        <div class="card-body">
                                            <ul class="list-unstyled arrow">
                                                <li>Gender: <?php echo $clients['gender']; ?></li>

                                                <li>Age: <?php echo $clients['age']; ?></li>
                                                <li>Favorite Food: <?php echo $clients['food']; ?></li>
                                                <li>Activity Level: <?php echo $clients['activity_level']; ?></li>
                                                <li>Routine: <?php echo $clients['routine']; ?></li>
                                                <li>Routine Issues: <?php echo $clients['routine_issues']; ?></li>
                                                <li>Goal: <?php echo $clients['goal']; ?></li>
                                                <li>Height: <?php echo $clients['height']; ?></li>
                                                <li>Weight: <?php echo $clients['weight']; ?></li>
                                                <li>Calories: <?php echo $clients['result']; ?></li>
                                                <li>Doctor: <?php echo !empty($clients['doctor'])?$client['doctor']:'Not yet'; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
					<!-- ============================================================== -->
					<!-- End Code -->
					<!-- ============================================================== --> 

<?php require_once '../../config/footerIn.php'; ?>
